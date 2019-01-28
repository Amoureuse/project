<div class="container">
    <div class="account">
        <h2 class="account-in">Авторизация</h2>
            <form action="/login" method="post">
                <?php isset($_SESSION['form_data']) ? $oldData = oldData() : '';?>
		<div> 	
		    <span class="mail">Логин:</span>
                    <input type="email" name="email" value="<?= !empty($oldData) ? $oldData['email'] : '' ?>"> 
		</div>
		<div> 
                    <span class="word">Пароль:</span>
		    <input type="password" name="pass">
		</div>				
                <div>
                    <button class="btn btn-outline my-2 my-sm-0" type="submit" name="submit_log">Войти</button>
                </div>
                <p class="wel"><a href="/register"> Нет аккаунта? Зарегистрируйтесь </a></p>
	    </form>
    </div>
</div>
