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
    </tr>
    </thead>
    <tbody>
    <?php  foreach($products as $item) : ?>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=$item['name']?></td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=$item['quantity']?></td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=$item['price']?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

</body>
</html>