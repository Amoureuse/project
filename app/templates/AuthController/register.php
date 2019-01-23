  <div class="container">
		<div class="account">
			<h2 class="account-in">Регистрация</h2>
                        <form action="/register" method="post">	
                                <div> 	
					<span class="mail">Имя пользователя:</span>
                                        <input type="text" name="username" value="<?= isset($_SESSION['form_data']['username'])? $_SESSION['form_data']['username']:'';?>"> 
				</div>
				<div> 	
					<span class="name-in"style="padding-right: 160px;">Email:</span>
                                        <input type="email" name="email" value="<?= isset($_SESSION['form_data']['email'])? $_SESSION['form_data']['email']:'';?>"> 
				</div>
				<div> 
					<span class="name" style="padding-right: 142px;">Пароль:</span>
					<input type="password" name="pass">
				</div>
                                <div> 
					<span class="word" style="padding-right: 54px;">Повторите пароль:</span>
					<input type="password" name="pass_2">
				</div>	
                                <div>	<button class="btn btn-outline my-2 my-sm-0" type="submit"
                                                name="submit_reg">Регистрация</button>
                                </div>
                            <p class="wel"><a href="/login">Уже зарегистрированы? Авторизуйтесь </a></p>
				</form>
                        <?php if(isset($_SESSION['form_data'])) unset ($_SESSION['form_data']); ?>
                        
		</div>
</div>