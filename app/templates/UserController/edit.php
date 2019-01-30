<h5 class="well" style="float:left;
	font-size:1.5em;
	font-style:italic;
        margin-top: 0.5em;" ><a href="/user"style="
                                                color:#a7a49c; ">Профиль</a></h5>
<div class="container">
  <div class="account">
    <h2 class="account-in">Редактировать пользователя:</h2>
      <form action ="/user/edit" method="post" enctype="multipart/form-data">
        <div class="field"> 	
          <span>Имя пользователя:</span>
          <input type="text" name="username" value="<?= isset($_SESSION['form_data']['username'])? $_SESSION['form_data']['username']:$user['username'];?>"> 
        </div>
          <div class="field"> 	
          <span>Новый пароль:</span>
          <input type="password" name="pass" value=""> 
        </div>
        <div class="field"> 	
          <span>Подтвердите новый пароль:</span>
          <input type="password" name="pass_2" value=""> 
        </div>
        <div class="field">
            <span>Загрузить аватар</span>
            <input type="file" name="path">
        </div>
        <div class="container">
          <h4 class="account-in">Подтвердить изменения:</h4>
            <div class="field"> 	
              <span>Введите текущий пароль:</span>
              <input type="password" name="pass_user" value=""> 
            </div>
          <div class="field">
            <button type="submit" name="submit">Обновить данные</button>
          </div>  
        </div>
      </form>
  </div>
</div>