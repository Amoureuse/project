<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<table style="border: 1px solid #ddd; border-collapse: collapse; width: 100%;">
    <thead>
    <tr style="background: #f9f9f9;">
        <th style="padding: 8px; border: 1px solid #ddd;">Наименование</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Кол-во</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Цена</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Сумма</th>
    </tr>
    </thead>
    <tbody>
    <?php   
        $quantity = [];
        $summ = [];
        foreach($products as $item) :  
            $quantity[] .= $item['quantity'];
            $summ[] .= $item['price']*$item['quantity']; ?>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=$item['name']?></td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=$item['quantity']?></td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=$item['price']?></td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=$item['price']*$item['quantity']?></td>
        </tr>
    <?php endforeach;?>
        <tr>
            <td colspan="3" style="padding: 8px; border: 1px solid #ddd;">Итого:</td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=array_sum($quantity)?></td>
        </tr>
        <tr>
            <td colspan="3" style="padding: 8px; border: 1px solid #ddd;">На сумму:</td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=array_sum($summ)?> грн</td>
        </tr>
    </tbody>
</table>

</body>
</html>