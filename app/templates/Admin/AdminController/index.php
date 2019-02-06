<section class="content-header">
    <h1>
        Список товаров
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active">Список товаров</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="list-group list-group-root well">
<?php
foreach ($items as $item):?> 
        <p class="item-p">
            <a class="list-group-item" href="/admin/edit?id=<?=$item->id;?>"><span><?=$item->name;?></a>
            <span><a href="/admin/delete?id=<?=$item->id?>" class="delete"><i class="fa fa-fw fa-close text-danger"></i></a></span></p>
        <p class="item-p"><b>Описание товара: </b> <?=$item->description?></p>
        <p class="item-p"><b>Цена: </b> <?=$item->price?></p>
        <p class="item-p"><b>Количество: </b> <?=$item->count?></p>

<?php endforeach; ?>
<?= $pag?>
                        
                    </div>
                </div>
            </div> 
        </div>
    </div>

</section>
