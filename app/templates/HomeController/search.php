<!--start-breadcrumbs-->
<div class="breadcrumbs">
  <div class="container">
    <div class="breadcrumbs-main">
      <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li class="active">Поиск</li>
      </ol>
    </div>
  </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt"> 
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-9 prdt-left">
                <?php if (!empty($products)) : ?>
		<div class="product-one">
                    <?php foreach ($products as $product) : ?>
                    <div class="col-md-4 product-left p-left">
			<div class="product-main-cat simpleCart_shelfItem">
                            <a href="product/<?= $product->alias?>" class="mask"><img class="img-responsive zoom-img" src="images/goods/<?=$product->image?>" alt="" /></a>
				<div class="product-bottom">
				<h3><?=$product->name?></h3>
				<p><?=limitStr($product->description, 75)?></p>
				<h4><span class="price-block"><?= ($product->price != null) ? $product->price . ' грн' : 'нет на складе'?></span></h4>
                                <a data-id="<?= $product->id?>"href="cart/add?id=<?= $product->id?>" class="add-cart item_add add-to-cart-link">В корзину</a>
				</div>
				<div class="srch srch1">
				<span><?= $product->disc?>%</span>
				</div>
			</div>
                    </div>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
		</div>
                <?php else :?>
                <div>
                    <h3>По запросу <b>"<?= $query ?>"</b> ничего не найдено</h3>
                </div>
                <?php endif; ?>
            </div>	
        </div>
        <div class="col-md-3 single-right">
	  <div class="w_sidebar">
              <form method ="post" action="<?php filterUrl($alias=null)?>">
                <section  class="sky-form">
                    <h4>Сортировать</h4>
                    <div class="filter-sort">
                        <p><a href="<?= filterUrl($alias=null, 'sort', 'price-desc');?>">От дорогих к дешевым</a></p>
                        <p><a href="<?= filterUrl($alias=null, 'sort', 'price-asc')?>">От дешевых к дорогим</a></p>
                    </div> 
                </section> 
                <section  class="sky-form">
                    <h4>Brands</h4> 
                    <div class="row1 scroll-pane">
                        <div class="col col-4">
                            <div class="filter-b">
                        <?php foreach ($brands as $brand) :?>
                            <p><a  href="<?= filterUrl($alias=null, 'brand', $brand['id']);?>"><?=$brand['title']?></a></p>
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
