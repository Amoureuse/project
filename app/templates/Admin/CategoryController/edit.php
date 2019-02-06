<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Редактирование категории <?= isset($category['name']) ? $category['name'] : ''?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="/admin/category">Список категорий</a></li>
        <li class="active">Редактирование категории <?= isset($category['name']) ? $category['name'] : ''?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="/admin/category/edit" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label for="name">Наименование категории</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= isset($category['name']) ? $category['name'] : ''?>">
                  </div> 
                  <div class="form-group">
                    <label for="parent_id">Родительская категория</label>
                    <?php new \app\widgets\menu\Menu([
                        'tpl' => ROOT . '/public/menu/select.php',
                        'container' => 'select',
                        'attrs' => [
                            'name' => 'parent_id',
                        ],
                        'class' => 'form-control',
                        'prepend' => '<option value ="0"> Самостоятельная категория </option>',
                        
                    ]) ?>
                  </div>
                    <input  type="hidden" class="form-control" id="name" name="id" value="<?= isset($category['id']) ? $category['id'] : ''?>">
                </div>
                    <div class="box-footer">
                        <button type ="submit" class="btn btn-primary">Сохранить</button>
                    </div>  
                </form>
                
            </div> 
        </div>
    </div>
</section>