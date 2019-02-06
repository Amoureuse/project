<?php $curr = \project\App::$app->getProperty('currency');?>
<div class="col-sm-4">
<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
    <img class="card-img-top" src="/images/goods/<?= $item->image?>">
    <div class="card-body">

        <h5 class="card-title"><a href="/show?id=<?= $item->id?>"><?= $item->name?></a></h5>
        <p class="card-text"><?= $item->description?>.</p>
    </div>
    <div class="card-footer bg-transparent border-primary">
  <?php if ($item->price == 0) {
            $item->price = "нет на складе";
        } else {
            $item->price = round($item->price * $curr['value'], 2);
        }
  ?>
        <b><?=$curr['symbol']?> <?=$item->price?></b>
            <div class="quantity">
                <input type="number" name="quantity" min="1" step="1" size="2">
            </div>
        <a data-id="<?= $item->id?>" href="cart/add?id=<?= $item->id?>" class="add-to-cart-link">Добавить в корзину</a>


    </div>
</div>
</div>
