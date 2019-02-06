<h3>Ваши товары:</h3>
<table class="table" style="margin-bottom: 50px;">
    <tbody>
        <tr>
            <th >Код</th>
            <th>Наименование</th>
            <th >Цена</th>
            <th >Кол-во</th>
            <th >Сумма</th>
             <th>&nbsp;</th>
        </tr>
  
    <?php
foreach ($res as $item):?>
        <?php $totalPrice[] = $item['price']*$item['quantity'];?>
        <tr>
          <td> <?=$item['id']?></td>
          <td> <?=$item['name']?></td>
          <td> <?=$item['price']?></td>
          <td> <?=$item['quantity']?></td>
          <td> <?=$item['quantity']*$item['price']?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
      <td colspan="4" class="b">Итого</td>
      <td>
          <span id="total_cost"><?= isset($totalPrice) ? array_sum($totalPrice):'';?> </span>
      </td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>