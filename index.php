<?php
session_start();// вся процедура работает на сессиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!!!

if (isset($_POST['Email']) and isset($_POST['Password'])) 
{ 
	$email = $_POST['Email']; 
	if ($email == '') 
	{ 
		unset($email);
	} 
 
	$password=$_POST['Password']; 
	if ($password =='') 
	{ 
		unset($password);
	} 

if (empty($email) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
exit ("Вы ввели не всю информацию, венитесь назад и заполните все поля!");
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$email = stripslashes($email);
$email = htmlspecialchars($email);

$password = stripslashes($password);
$password = htmlspecialchars($password);

//удаляем лишние пробелы
$email = trim($email);
$password = trim($password);


// подключаемся к базе
include ("authorization/bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 



$result = mysql_query("SELECT * FROM Users WHERE Email='$email'",$db); //извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysql_fetch_array($result);
if (!empty($myrow['Password']) and $myrow['Password']==$password)
{
          //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
          $_SESSION['Email']=$myrow['Email']; 
          $_SESSION['Id']=$myrow['Id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
}
}

require_once ( 'index.php' );

if (isset($_POST['login'])) {
  include ("authorization/bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
  mysql_query ("INSERT INTO Accaunts (Tariff,UserId,Password,User) VALUES('2018-09-20', ".$_SESSION['Id'].",'".$_POST['login']."', '".$_POST['accauntPassword']."')");
  
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.gif" type="image/x-icon" />

    <title>InstaProject</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="css/slidefolio.css" rel="stylesheet">
	<!-- Font Awesome -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body>
    <!-- Header Area -->
    <div id="top" class="header">
        <div class="vert-text">
            <img class="img-rounded" alt="Company Logo" src="favicon.gif" width="70" height="70" />
            <h2><em>InstaProject</em></h2>
			<br>
			<?php
			if (isset($_POST['Email']) and isset($_POST['Password'])) 
			{
				if (empty($myrow['Password']))
				{
					echo '<h4  style="color:red"><em>Неверный логин или пароль</em></h4>';
				}
				else {
						if ($myrow['Password']==$password) {
							$_SESSION['Email']=$myrow['Email']; 
							$_SESSION['Id']=$myrow['Id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
						}
						else {
								echo '<h4  style="color:red"><em>Неверный логин или пароль</em></h4>';
							}
					}
			}
			?>
			<?php
			// Проверяем, пусты ли пересменные логина и Id пользователя
			if (empty($_SESSION['Email']) or empty($_SESSION['Id']))
			{
			// Если пусты, то мы не выводим ссылку
			echo '
            <div class="col-md-5 col-md-offset-3">
                <form action="index.php" id="singin-form" class="form-horizontal" method="POST">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="name">Логин</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Логин" class="form-control" name="Email" id="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="email">Пароль</label>
                            <div class="col-sm-8">
                                <input type="Password" placeholder="Пароль" class="form-control" name="Password" id="Password">
                            </div>
                        </div>
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-success">Войти</button>
                            <a href="reg.php" class="btn btn-primary">Регистрация</a>
                        </div>
                    </fieldset>
                </form>
            </div>';
			}
			else
			{
			// Если не пусты, то мы выводим ссылку
				echo "Привет, <h2><em>".$_SESSION['Email']."</em></h2>
				<br>";
				echo '<div class="col-md-5 col-md-offset-3">
                <form action="session_exit.php" id="singin-form" class="form-horizontal" method="POST">
                    <fieldset>
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-primary">Выйти</button>
                        </div>
                    </fieldset>
                </form>
            </div>';
			}
			?>
         </div>
    </div>
	
    <!-- /Header Area -->
	  <div id="nav">
	    <?php include ("menu.php"); ?>
	   </div>

<?php
			// Проверяем, пусты ли пересменные логина и id пользователя
			if (empty($_SESSION['Email']) or empty($_SESSION['Id']))
			{
			// Если пусты, то мы не выводим ссылку
			echo '	   
    <!-- About -->
    <div id="about" class="about_us">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center">
            <h2>О проекте</h2>
            <p class="lead">Лучшее приложение для продвижения аккаунтов в инстаграме. Пока вы общаетесь с друзьями, занимаетесь делами, оно работает, раскручивая ваш аккаунт.</p>
          </div>
        </div>
	  </div>
    </div>
    <!-- /About -->
    <!-- Services -->
    <div id="services" class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4 text-center">
            <h2>Сервис</h2>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 text-center">
            <div class="service-item">
              <i class="service-icon fa fa-camera-retro fa-3x"></i>
              <h3>Приложение</h3>
              <ul style="text-align: left;">
                <li>Быстрая раскрутка аккаунта.</li>
                <li>Тестовый период 3 дня.</li>
                <li>+500 подпичиков в день.</li>
                <li>Подписка, отписка, лайки и тд.</li>
              </ul>
              <a href="#about" class="btn btn-top">Скачать</a>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div class="service-item">
			<i class="service-icon fa fa-camera fa-3x"></i>
              <h3>Получить лицензию</h3>
              <p>Все очень просто: переходите по ссылке ниже, вводите email, оплачиваете, мы присылаем вам лицензию на почту.</p>
              <br>
              <a href="#about" class="btn btn-top">Получить</a>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div class="service-item">
              <i class="service-icon fa fa-globe fa-3x"></i>
              <h3>Online Сервис</h3>
              <p>В настоящий момент мы разрабатываем для вас онлайн сервис. </p>
              <br><br><br>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Services -->

    <!-- Portfolio -->
    <div id="portfolio" class="portfolio">
    <div class="container">
    <div class="row push50">
          <div class="col-md-8 col-md-offset-2 text-center">
            <h2>Наши принципы</h2>
            <ul class="lead" style="text-align: left;">
              <li>Мы НЕ рассылаем спам. Только лицензии.</li>
              <li>Мы всегда помогаем нашим клиентам.</li>
              <li>Мы всегда рады помочь вам и вашему бизнесу.</li>
              <li>Мы любим когда нам пишут через форму обратной связи.</li>
              <li>Мы любим когда вы приглашаете друзей.</li>
            </ul>
          </div>
        </div>
		
		</div>	
      </div>
		</div>
      </div>
    <!-- /Portfolio -->';
	}
?>

    <!-- Accaunts -->
    <div id="accaunts" class="about_us">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center">
		  <form action="" id="contact-form" class="form-horizontal" method="POST">
			<fieldset>
						    <div class="form-group">
						      <label class="col-sm-4 control-label" for="name">Login</label>
						      <div class="col-sm-8">
						        <input type="text"  placeholder="Login" class="form-control" name="login" id="login">
						      </div>
						    </div>
						    <div class="form-group">
						      <label class="col-sm-4 control-label" for="accauntPassword">Password</label>
						      <div class="col-sm-8">
						        <input type="text" placeholder="Введите Пароль" class="form-control" name="accauntPassword" id="accauntPassword">
						      </div>
						    </div>
	              <div class="col-sm-offset-4 col-sm-8">
			            <button type="submit" class="btn btn-top">Добавить</button>
	        			</div>
						</fieldset>
		</form>
            <h2>Ваши аккаунты:</h2>
			<ol>
			<?php 
				include ("authorization/bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
				$result = mysql_query("SELECT * FROM Accaunts WHERE UserId='".$_SESSION['Id']."'",$db); //извлекаем из базы все данные о пользователе с введенным логином
				$accaunts = array();
				while ($accaunt = mysql_fetch_array($result))
				{
					$accaunts[] = $accaunt['User'];
				}
				foreach($accaunts as $accaunt)
				{
					echo '    <li>'.$accaunt.'</li>';
				}
			?>
			</ol>
          </div>
        </div>
	  </div>
    </div>
    <!-- /Accaunts -->

    <!-- Strategy -->
    <div id="srategy" class="about_us">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center">
            <h2>Выберите инструмент:</h2>
            <a href="" >Unlike</a>
			<a href="follow_users.php" >Follow users</a>
          </div>
        </div>
	  </div>
    </div>
    <!-- /Strategy -->
	
	    <!-- Accaunt -->
    <div id="accaunt" class="about_us">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center">
		  
          </div>
        </div>
	  </div>
    </div>
    <!-- /Accaunt -->

			
    <!-- Contact -->
    <div id="contact">
      <div class="container">
        <div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
            <h2>Связь с нами</h2>
			<hr>
          </div>
          <div class="col-md-5 col-md-offset-3">
		  <!-- contact form starts -->
            <form action="contact" id="contact-form" class="form-horizontal">
			<fieldset>
						    <div class="form-group">
						      <label class="col-sm-4 control-label" for="name">Имя</label>
						      <div class="col-sm-8">
						        <input type="text"  placeholder="Вася" class="form-control" name="name" id="name">
						      </div>
						    </div>
						    <div class="form-group">
						      <label class="col-sm-4 control-label" for="email">Email</label>
						      <div class="col-sm-8">
						        <input type="text" placeholder="Введите email" class="form-control" name="email" id="email">
						      </div>
						    </div>
						    <div class="form-group">
						      <label class="col-sm-4 control-label" for="subject">Тема</label>
						      <div class="col-sm-8">
						        <input type="text" placeholder="Сотрудничество" class="form-control" name="subject" id="subject">
						      </div>
						    </div>
						    <div class="form-group">
						      <label class="col-sm-4 control-label" for="message">Сообщение</label>
						      <div class="col-sm-8">
						        <textarea placeholder="Введите сообщение" class="form-control" name="message" id="message" rows="3"></textarea>
						      </div>
						    </div>
	              <div class="col-sm-offset-4 col-sm-8">
			            <button type="submit" class="btn btn-success">Отправить</button>
	    			      <button type="reset" class="btn btn-primary">Отменить</button>
	        			</div>
						</fieldset>
						</form>
				
				<!-- contact form ends -->		
          </div>
        </div>
      </div>
    </div>
    <!-- /Contact -->
    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center">
           <h2>Спасибо, что посетили наш сайт</h2>
           <em>Copyright &copy; InstaProject 2018</em>
          </div>
        </div>
      </div>
    </footer>
    <!-- /Footer -->
    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
	<script src="js/jquery-scrolltofixed-min.js"></script>
	<script src="js/jquery.vegas.js"></script>
	<script src="js/jquery.mixitup.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/script.js"></script>
	<script src="js/bootstrap.js"></script>
	
<!-- Slideshow Background  -->
	<script>
$.vegas('slideshow', {
  delay:5000,
  backgrounds:[
     { src:'./img/nature1.jpg', fade:2000 },
	 { src:'./img/busness2.jpg', fade:2000 },
    { src:'./img/busness6.png', fade:2000 },
	 { src:'./img/busness3.jpg', fade:2000 },
    { src:'./img/busness7.jpg', fade:2000 },
    { src:'./img/busness5.jpg', fade:2000 },
	 { src:'./img/busness1.jpg', fade:2000 },
	   { src:'./img/busness4.jpg', fade:2000 }
	   
  ]
})('overlay', {
src:'./img/overlay.png'
});

	</script>
<!-- /Slideshow Background -->

<!-- Mixitup : Grid -->
    <script>
		$(function(){
    $('#Grid').mixitup();
      });
    </script>
<!-- /Mixitup : Grid -->	

    <!-- Custom JavaScript for Smooth Scrolling - Put in a custom JavaScript file to clean this up -->
    <script>
      $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
            || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });
      });
    </script>
<!-- Navbar -->
<script type="text/javascript">
$(document).ready(function() {
        $('#nav').scrollToFixed();
  });
    </script>
<!-- /Navbar-->
	<script>
    function disp(form) {
        if (form.style.display == "none") {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    }
    </script>
  </body>

</html>