<h3 align="center">Добро пожаловать <?= $user['username']?></h3>

<h5>Ваш email:<?= $user['email']?></h5>

<p><img src="images/avatar/<?php echo $user['avatar'];?>" height="200" width="200"></p>
<a href="user/edit" style="font-size:1em;
                           font-style:italic;
                           color:#a7a49c;">Редактировать профиль</a>
 