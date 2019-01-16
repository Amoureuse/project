<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
		
	<title>Product cards</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Easy-it</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="http://myproject/">Главная<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Каталог товаров</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Техника</a>
          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?id=2">Компьютеры</a>
            <a class="dropdown-item" href="index.php?id=3">Ноутбуки</a>
            <a class="dropdown-item" href="index.php?id=4">Принтеры</a>
            <a class="dropdown-item" href="#">Комплектующие</a>
          <div class="dropdown-divider"></div>
           <a class="dropdown-item" href="">Мебель</a>
          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?id=5">Столы/Стулья</a>
            <a class="dropdown-item" href="index.php?id=8">Диваны/Кресла</a>
            <a class="dropdown-item" href="index.php?id=7">Шкафы</a>
          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Другое</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
</header>
<body>
    <h4 align = "center">Авторизация</h4>
    <form class="form-inline my-2 my-lg-0" action="http://myproject/auth/login" method="post" >
    <table align = "center">
        <tr>
            <td><label class="navbar-brand"for="auth">Логин :</label></td>
            <td><input class="form-control mr-sm-2" type="email" name="email" placeholder= "email" id="auth"></td>
        </tr>
        <tr>
            <td><label class="navbar-brand" for="reg">Пароль :</label></td>
            <td><input class="form-control mr-sm-2" type="password" name="pass" id="auth"></td>
        </tr>
        <tr>
            <td><button class="btn btn-outline my-2 my-sm-0" align="right" type="submit"
                        name="submit_log">Войти</button></td>
            <td><a href="http://myproject/register" align = "right"> Зарегистироваться </a></td>
        </tr>
    </table>
    </form>
</body>
<footer>
</footer>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>