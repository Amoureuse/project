<?php
$parent = isset($category['childs']);
if(!$parent){
    $delete = '<a href="/admin/category/delete?id=' . $id . '" class="delete"><i class="fa fa-fw fa-close text-danger"></i></a>';
}else{
    $delete = '<i class="fa fa-fw fa-close"></i>';
};?>
<p class="item-p">
    <a class="list-group-item" href="/admin/category/edit?id=<?=$id;?>"><?=$category['name'];?></a> <span><?=$delete;?></span>
</p>
<?php if($parent): ?>
    <div class="list-group">
        <?= $this->getMenuHtml($category['childs']); ?>
    </div>
<?php endif; ?>
