<div class="col-md-4 product-left">
  <div class="product-main simpleCart_shelfItem">
    <a href="/product/<?=$item->alias?>" class="mask"><img class="img-responsive zoom-img" 
        src="/images/goods/<?=$item->image?>" alt="" /></a>
    <div class="product-bottom">
      <h3><a href="/product/<?=$item->alias?>"><?= $item->name ?></a></h3>
      <p><?= limitStr($item->description, 250) ?></p>
      <h4><span class="price-block"><?= $item->price?> грн</span></h4>
      <a class="add-cart item_add add-to-cart-link" data-id="<?= $item->id?>" href="/cart/add?id=<?= $item->id?>">В корзину</a>
    </div>
    <div class="srch">
      <span><?= $item->disc ?>%</span>
    </div>
  </div>
</div>

