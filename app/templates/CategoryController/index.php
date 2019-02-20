<div class="product">
  <div class="container">
    <div class="product-top">
      <div class="col-md-9 prdt-left">
      <div class="product-one">
    <?php foreach ($products as $item) : ?>
          <div class="col-md-4 product-left">
            <div class="product-main-cat simpleCart_shelfItem">
              <a href="/product/<?=$item->alias?>" class="mask"><img class="img-responsive zoom-img" src="/images/goods/<?=$item->image?>" alt="" /></a>
              <div class="product-bottom">
                <h3><a href="/product/<?=$item->alias?>"><?= $item->name ?></a></h3>
                <p><?= limitStr($item->description, 130) ?></p>
                <h4><span class="price-block"><?= ($item->price != null) ? $item->price . ' грн' : 'нет на складе'?></span></h4>
                <a class="add-cart item_add add-to-cart-link" data-id="<?= $item->id?>" href="/cart/add?id=<?= $item->id?>">В корзину</a>
              </div>
              <div class="srch">
              <span><?= $item->disc ?>%</span>
              </div>
            </div>
          </div>
    <?php endforeach; ?>
      </div>
      </div>
        <div class="col-md-3 single-right">
	  <div class="w_sidebar">
              <form method ="post" action="<?php filterUrl($alias)?>">
                <section  class="sky-form">
                    <h4>Сортировать</h4>
                    <div class="filter-sort">
                        <p><a href="<?= filterUrl($alias, 'sort', 'price-desc');?>">От дорогих к дешевым</a></p>
                        <p><a href="<?= filterUrl($alias, 'sort', 'price-asc')?>">От дешевых к дорогим</a></p>
                    </div> 
                </section> 
                <section  class="sky-form">
                    <h4>Brands</h4> 
                    <div class="row1 scroll-pane">
                        <div class="col col-4">
                            <div class="filter-b">
                        <?php foreach ($brands as $brand) :?>
                            <p><a  href="<?= filterUrl($alias, 'brand', $brand['id']);?>"><?=$brand['title']?></a></p>
                        <?php endforeach;?>   
                            </div>
                        </div>
                    </div>      
                </section>
                <section  class="sky-form">
                    <h4>Цена</h4>
                    <div class="filter-price">                    
                        <input type="text" name="price" size="4"><span>-</span>
                        <input type="text" name="price2" size="4"> грн.
                        <button class="btn btn-outline" type="submit">Ок</button>
                    </div>
                </section>
                
            </form>
          </div>
         </div>
        <div class="pag">
    <?= $pagination ?>
        </div>
    </div>
  </div>
</div>
