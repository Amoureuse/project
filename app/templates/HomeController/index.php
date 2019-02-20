<div class="product">
  <div class="container">
    <div class="product-top">
      <div class="product-one">
    <?php
        foreach ($items as $item) {
            include ROOT . '/app/templates/components/cards.php';
        }
    ?>
      </div>
    </div>
  </div>
</div>

<div style="
    margin-left: auto;
    margin-right: auto;
    width: 300px">
    <?= $pagination ?>
</div>
    <?php if (!empty($lastViewItems)) :?>
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
    <?php endif;?>
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