<?php
session_start();// вся процедура работает на сессиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!!!
if (empty($_SESSION['Email']) or empty($_SESSION['Id'])) 
{
	header("Location: reg.php");
}

if(isset($_POST['accaunt']) and isset($_POST['accaunts']))
{
//удаляем лишние пробелы
$accaunt = $_POST['accaunt'];
$accaunts = $_POST['accaunts'];

$accaunt = trim($accaunt);
$accaunts = trim($accaunts);

include ("authorization/bd.php");
$result = mysql_query ("INSERT INTO FollowUsers (TimeLine,UserId,IsStarted,UsersToFollow) VALUES('2018-09-20', ".$_SESSION['Id'].", false,'$accaunts')", $db);
if ($result=='TRUE')
{
	//TODO
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
			?>
         </div>
    </div>
    <!-- /Header Area -->
	  <div id="nav">
	    <?php include ("menu.php"); ?>
	   </div>   
	<div id="about" class="about_us">
      <div class="container">
        <div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
            <h2>Настройки</h2>
			<hr>
          </div>
          <div class="col-md-5 col-md-offset-3">
		  <!-- contact form starts -->
            <form action="follow_users.php" id="contact-form" class="form-horizontal" method="POST">
			<fieldset>
						    <div class="form-group">
								<label class="col-sm-4 control-label" for="accaunt">Аккаунт</label>
								<div class="col-sm-8">
									<select class="form-control" name="accaunt" id="accaunt">
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
												echo '<option>'.$accaunt.'</option>';
											}
			?>
									</select>
								</div>
						    </div>
						    <div class="form-group">
						      <label class="col-sm-4 control-label" for="accaunts">Аккаунты на кого подписываться</label>
						      <div class="col-sm-8">
						        <textarea placeholder="Аккаунты" class="form-control" name="accaunts" id="accaunts" rows="3"></textarea>
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
	
  </body>

</html>