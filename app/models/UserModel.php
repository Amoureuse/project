<?php

namespace app\models;



class UserModel extends Model{
    protected $table = 'users';


    public function read($email){
        $stmt = $this->connect->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        return $data;
    }
    public function create($username,$email,$password){
        $stmt = $this->connect->prepare("INSERT INTO users (username,email, pass) VALUES (? ,? ,?)");
        $stmt->bind_param('sss',$username, $email, $password);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }
    public function update($id, $username, $password, $avatar){
        $stmt = $this->connect->prepare("UPDATE users SET username=?, pass =?, avatar =? WHERE id=$id");
        $stmt->bind_param('sss',$username,$password,$avatar);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result;
    }
      
}
