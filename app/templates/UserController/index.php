<h2 class="profile">Личные данные:</h2>
<p><img src="images/avatar/<?php echo $user['avatar'];?>" class="profile-avatar" height="200" width="200"></p>
<div class="field">
    <p class="profile-user"><span>Имя:</span><?= $user['username']?></p>
</div>
<div class="field">
    <p class="profile-user"><span>Ваш email:</span><?= $user['email']?></p>
</div>
<div class="edit-pro">
    <a href="user/edit" class="edit-pro">Редактировать профиль</a>
</div>

 