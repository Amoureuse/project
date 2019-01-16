<?php
  include_once 'header.php';
  include_once 'navibar.php';
  ?>
<div>
    <?php if(isset($_SESSION['logged_user'])){ ?> 
    <h4 class="text-right">Привет <?= $_SESSION['logged_user']['username'];?></h4>  
    <p class="text-right"><a href="http://myproject/auth/logout">Выход</a></p>
    <?php }else{?>
    <li>
        <a href="http://myproject/auth/login">Авторизация</a>
    </li>
    <li>
        <a href="http://myproject/register">Регистрация</a>
    </li>
    <?php } ?>
</div>

<article>
	<div class="container">
  		<div class="row">
 			<?php 
        foreach ($items as $item) {
          include __DIR__ . '/../templates/components/cards.php';
        }
      		?>
  		</div>
	</div>
	<h5> Недавно просмотренные : </h5>
		<div class="container">
  		<div class="row">
 			<?php
 			foreach ($lastViewItems as $item) {
          include __DIR__ .'/../templates/components/little-card.php';
      }
      ?>
  		</div>
	</div>
</article>
<?php 
include_once 'footer.php';
?>