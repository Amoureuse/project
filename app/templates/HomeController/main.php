    <?php if(isset($_SESSION['logged'])){?>
  <h4>Привет <?= $user['username']?></h4>
    <?php if($user['role'] == 'admin'):?>
  <p><a href="/admin">Панель управления</a></p>
    <?php endif;?>
  <p class="wel"><a href="/user">Личный кабинет</a><br><a href="/logout">Выйти</a></p>
    <?php }else{?>
  <p class="wel">Здесь вы можете <a href="/login">авторизоваться</a> или <a href="/register">зарегистрировать</a> аккаунт</p>
    <?php }?>
<!--баннер-->
<div class="bnr" id="home">
    <div  id="top" class="callbacks_container">
        <ul class="rslides" id="slider4">
            <li>
                <img src="images/note-2.jpeg" alt=""/>
            </li>
            <li>
                <img src="images/phone.png" alt=""/>
            </li>
            <li>
                <img src="images/tab.jpg" alt=""/>
            </li>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>
<!--Конец банера-->
<?php if ($brands) :?>
<div class="about">
    <div class="container">
        <div class="about-top grid-1">
            <?php foreach ($brands as $brand) :?>
            <div class="col-md-4 about-left">
                <figure class="effect-bubba">
                    <img class="img-responsive" src="images/<?= $brand['img'] ?>" alt=""/>
                    <figcaption>
                        <h2><?= $brand['title'] ?></h2>
                        <p><?= $brand['description']?></p>
                    </figcaption>
                </figure>
            </div>
            <?php endforeach; ?>
            </div>
            <div class="clearfix"></div>
        </div>
</div>
<?php endif; ?>
<?php if ($news) :?>
<?php $curr = project\App::$app->getProperty('currency'); ?>
<div class="product">
    <div class="container">
        <div class="product-top">
            <div class="product-one">
                <?php foreach ($news as $new) : ?>
                <div class="col-md-3 product-left">
                    <div class="product-main simpleCart_shelfItem">
                        <a href="/show?id=<?= $new['id']?>" class="mask"><img class="img-responsive zoom-img" src="/images/goods/<?= $new['image'] ?>" alt="" /></a>
                        <div class="product-bottom">
                            <h3><a href="/show?id=<?= $new['id']?>"><?= $new['name'] ?></a></h3>
                            <p><?= $new['description'] ?></p>
                            <h4><a class="add-to-cart-link" data-id="<?= $new['id']?>" href="/cart/add?id=<?= $new['id']?>"><i></i></a> <span class=" item_price"><?=$curr['symbol']?> <?= $new['price'] * $curr['value']?></span></h4>
                        </div>
                        <div class="srch">
                            <span><?= $new['disc'] ?>%</span>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
