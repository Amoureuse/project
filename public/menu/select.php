<?php $parent_id = project\App::$app->getProperty('parent_id');?>
<option value="<?=$id;?>"
    <?php if ($id == $parent_id) echo 'selected'?>
    <?php if (isset($_GET['id']) && $_GET['id'] == $id) echo 'disabled'?>>
    <?= $tab . $category['name'];?>
</option>
<?php if(isset($category['childs'])) :?>
    <?= $this->getMenuHtml($category['childs'], $tab . '--'); ?>
<?php endif; ?>
