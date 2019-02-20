<!--start-breadcrumbs-->
<div class="breadcrumbs">
  <div class="container">
    <div class="breadcrumbs-main">
      <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li class="active"><?=$product->name?></li>
      </ol>
    </div>
  </div>
</div>
<!--end-breadcrumbs-->
<!--start-single-->
<div class="single contact">
  <div class="container">
    <div class="single-main">
      <div class="col-md-9 single-main-left">
        <div class="sngl-top">
          <div class="col-md-5 single-top-left">
            <div class="flexslider">
              <ul class="slides">
                <li data-thumb="images/goods/<?=$product->image?>">
                  <div class="thumb-image"> <img src="images/goods/<?=$product->image?>?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                </li>
                <?php foreach ($images as $image) : ?>
                <li data-thumb="images/galery/<?=$image['image']?>">
                  <div class="thumb-image"> <img src="images/galery/<?=$image['image']?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                </li>
                <?php endforeach;?>		
              </ul>
            </div>
<!-- FlexSlider -->
          </div>	
          <div class="col-md-7 single-top-right">
            <div class="single-para simpleCart_shelfItem">
              <h2><?=$product->name?></h2>
              <h5 class="item_price"><?=$product->price?></h5>
              <p><?= $product->description?></p>
              <div class="quantity">
                  <input type="number" size="4" value="1" min="1" name="quantity">
              </div>
              <a data-id="<?= $product->id?>"href="cart/add?id=<?= $product->id?>" class="add-cart item_add add-to-cart-link">В корзину</a>
            </div>
          </div>
          <div class="clearfix"> </div>
        </div>
        <div class="tabs">
          <ul class="menu_drop">
            <li class="item1"><a href="#"><img src="images/arrow.png" alt="">Описание</a>
              <ul>
                  <li class="subitem1"><a href="#"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
              </ul>
            </li>
            <li class="item2"><a href="#"><img src="images/arrow.png" alt="">Технические характеристики</a>
              <ul>
                <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>

              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
	<!--end-single-->
      