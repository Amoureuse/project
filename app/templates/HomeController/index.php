<div class="header-bottom-in">
  <div class="header-bottom-on">
    <?php if(isset($_SESSION['logged'])){?>
  <h4>Привет <?= $user['username']?></h4>
    <?php if($user['role'] == 'admin'):?>
  <p><a href="/admin">Панель управления</a></p>
    <?php endif;?>
  <p class="wel"><a href="/user">Личный кабинет</a><br><a href="/logout">Выйти</a></p>
    <?php }else{?>
  <p class="wel">Здесь вы можете <a href="/login">авторизоваться</a> или <a href="/register">зарегистрировать</a> аккаунт</p>
    <?php }?>
  </div>
</div>
<article>
  <div class="container">
    <div class="row">
    <?php
        foreach ($items as $item) {
            include ROOT . '/app/templates/components/cards.php';
        }
    ?>
    </div>
  </div>
  <h5> Недавно просмотренные : </h5>
  <div class="container">
    <div class="row">
    <?php
    foreach ($lastViewItems as $item) {
        include ROOT . '/app/templates/components/little-card.php';
    }
    ?>
    </div>
  </div>
</article>
    <?php 
        if (!$cookieOk) { ?>
  <div>
    <p>Оставаясь на Веб-сайте, Вы соглашаетесь с размещением файлов cookie на вашем компьютере, с целью анализа использования Веб-сайта. Если вы не хотите принимать файлы cookie, вы должны прекратить использование Веб-сайта</p>
    <form method="post">
      <p>Использовать куки:</p>
        <input name="on" type="checkbox"/>
        <input name="check" type="submit">
    </form>
  </div>
    <?php } ?>