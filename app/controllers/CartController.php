<?php

namespace app\controllers;

use app\models\CartModel;
use \project\Auth;
use app\models\ItemModel;
use app\models\OrderModel;

class CartController extends AppController
{
    public function __construct($route) {
        parent::__construct($route);
        $this->model = new CartModel();
        $this->productModel = new ItemModel();
        $this->orderModel = new OrderModel();
    }

    public function index()
    {
        if (!Auth::userID()) {
            redirect(); //если не зарегистрирован то и корзина ни к чему.
        }
        $res = $this->model->readPdo(Auth::userID());
        $this->set(['res' =>$res]);
        $this->setMeta('Корзина');
    }

    public function add()
    {
        if (!Auth::userID()) {
            redirect(); //разобратся как редиректнуть на логин;
        } else {
            $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
            $qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : null;
            if ($id) {
                $product = $this->productModel->readID($id);
                $product = new Item($product);
                if (!$product) {
                    return false;
                }
            }
            $data = [Auth::userID(), $product->id, $qty, $product->price];
            $this->model->createCart($data);
        }
//        if ($this->isAjax()) {
//            $data = [
//            'product' => $product,
//            'quantity' => $qty,
//        ];
//            $this->loadView('cart_modal', $data);
//        }  
    }
    
    public function delete()
    {
        $id = (int)$_GET['item'];
        $this->model->delete($id);
        redirect();
    }
    
    public function order()
    {
        if (!empty($_POST)) {
            $data = [Auth::userID(), $_POST['phone'], $_POST['adress'], $_POST['name']];
            $user = Auth::getUser();
            $user_email = $user['email'];
            $products = $this->model->readPdo(Auth::userID());
            $order_id = $this->orderModel->createOrder($data, $products);
            $this->mailOrder($order_id, $user_email, $products);
            $this->model->deleteCart(Auth::userID()); 
            splashMessage('Спасибо за заказ! Мы свяжемся с вами, когда заказ будет готов. Подтверждение заказа отправлено вам на почту.', 'alert-success');
            redirect('/cart');
        }
        $this->setMeta('Оформление заказа');
    }
    
    public function mailOrder($order_id, $user_email, $products)
    {
        $smtp = require_once ROOT . '/config/smtp.php';
        
        // Create the transport
        
        $transport = (new \Swift_SmtpTransport($smtp['host'], $smtp['port'], $smtp['protocol']))
                ->setUsername($smtp['login'])
                ->setPassword($smtp['password'])
                ;
        // Create the Mailer using your created Transport
        
        $mailer = new \Swift_Mailer($transport);
        
        // Create a message
        
        ob_start();
        require ROOT . '/app/templates/mail/mail_order.php';
        $body = ob_get_clean();
        
        $message_user = (new \Swift_Message("Заказ №{$order_id}"))
            ->setFrom([$smtp['login'] => 'MyShop'])
            ->setTo($user_email)
            ->setBody($body, 'text/html')
        ;
        $message_admin = (new \Swift_Message("Новый заказ №{$order_id}"))
            ->setFrom([$smtp['login'] => 'MyShop'])
            ->setTo($smtp['admin'])
        ;
        
        // Send the message
        
        $res = $mailer->send($message_user);
        $res = $mailer->send($message_admin);
    }
}
