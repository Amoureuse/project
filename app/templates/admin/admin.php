<?php 
  include_once __DIR__ . '/../templates/header.php';
  include_once 'navibar.php';?>
<table class="table table-bordered">
    <thead>
      <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Stock</th>
          <th scope="col">Discount(%)</th>
      </tr>
    </thead>
    <tbody>
<?php
foreach ($items as $item):?>
        <tr>
          <td> <?=$item->id?></td>
          <td> <?=$item->name?></td>
          <td> <?=$item->price?></td>
          <td> <?=$item->count?></td>
          <td> <?=$item->disc?></td>
        </tr>
    <?php endforeach; ?>