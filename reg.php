<?php
if(isset($_GET['registration'])){
if (isset($_POST['Email'])) { $Email = $_POST['Email']; if ($Email == '') { unset($Email);} } //заносим введенный пользователем логин в переменную $Email, если он пустой, то уничтожаем переменную
if (isset($_POST['Password'])) { $Password=$_POST['Password']; if ($Password =='') { unset($Password);} }

$Email = stripslashes($Email);
$Email = htmlspecialchars($Email);

$Password = stripslashes($Password);
$Password = htmlspecialchars($Password);

//удаляем лишние пробелы
$Email = trim($Email);
$Password = trim($Password);


// подключаемся к базе
include ("authorization/bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 

// проверка на существование пользователя с таким же логином
$result = mysql_query("SELECT id FROM Users WHERE Email='$Email'",$db);
$myrow = mysql_fetch_array($result);
if (empty($myrow['Id'])) {
// если такого нет, то сохраняем данные
	mysql_query ("INSERT INTO Users (Email, Tariff, Password) VALUES('$Email','20/09/2018','$Password')");
}
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

    <title>Регистрация</title>
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
            <h2><em>Регистрация</em></h2>
            <br>
			<?php
			if (isset($_GET['registration']) and !empty($myrow['Id'])) {
				echo '<h4><em>Извините, введённый вами логин уже зарегистрирован</em></h4>';
			}
			?>
            <div class="col-md-5 col-md-offset-3">
                <form action="reg.php?registration=1" id="contact-form" class="form-horizontal" method="POST">
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
						        <input type="text" placeholder="Введите email" class="form-control" name="Email" id="Email">
						      </div>
						    </div>
						    <div class="form-group">
						      <label class="col-sm-4 control-label" for="subject">Пароль</label>
						      <div class="col-sm-8">
						        <input type="text" placeholder="Пароль" class="form-control" name="Password" id="Password">
						      </div>
						    </div>
	              <div class="col-sm-offset-4 col-sm-8">
			            <button type="submit" class="btn btn-success">Отправить</button>
	    			      <button type="reset" onClick="window.location = 'index.php'" class="btn btn-primary">Отменить</button>
	        			</div>
						</fieldset>
						</form>
            </div>
         </div>
    </div>
    <!-- /Header Area -->
	 	  <div id="nav">
	    <?php include ("menu.php"); ?>
	   </div>	

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
            <form action="reg.php" id="contact-form" class="form-horizontal">
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
	
  </body>

</html>