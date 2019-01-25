<h5 class="well" style="float:left;
	font-size:1.5em;
	font-style:italic;
        margin-top: 0.5em;" ><a href="/user"style="
                                                color:#a7a49c; ">Профиль</a></h5>
<div class="container">
    <div class="account">
	<h2 class="account-in">Редактировать пользователя:</h2>
            <form action ="/user/edit" method="post" enctype="multipart/form-data">
                <div> 	
                    <span class="maill" style="padding-right: 60px;">Изменить имя:</span>
                    <input type="text" name="username" value="<?= isset($_SESSION['form_data']['username'])? $_SESSION['form_data']['username']:$user['username'];?>"> 
                </div>
                <div> 	
                    <span class="text">Изменить пароль:</span>
                    <input type="password" name="pass" value=""> 
                </div>
                <div>
                    <input type="file" name="path">
                </div>
                <div>
                    <button type="submit" name="submit">Загрузить</button>
                </div>
            </form>
    </div>
</div>