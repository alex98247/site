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
            <h2><em>InstaProject</em></h2>
            <br>
            <!--<a href="#about" class="btn btn-top">Скачать</a>-->
            <div class="col-md-5 col-md-offset-3">
                <form action="save_user.php" id="contact-form" class="form-horizontal">
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
						      <label class="col-sm-4 control-label" for="subject">Пароль</label>
						      <div class="col-sm-8">
						        <input type="text" placeholder="Пароль" class="form-control" name="password" id="password">
						      </div>
						    </div>
	              <div class="col-sm-offset-4 col-sm-8">
			            <button type="submit" class="btn btn-success">Отправить</button>
	    			      <button type="reset" class="btn btn-primary">Отменить</button>
	        			</div>
						</fieldset>
						</form>
            </div>
         </div>
    </div>
    <!-- /Header Area -->
	  <div id="nav">
    <!-- Navigation -->
    <nav class="navbar navbar-new" role="navigation">
   <div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mobilemenu">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
	<a href="#" class="navbar-brand">Регистрация</a>
  </div>
  <div class="collapse navbar-collapse" id="mobilemenu">

	  <ul class="nav navbar-nav navbar-right text-center">
	    <li><a href="#top"><i class="service-icon fa fa-home"></i>&nbsp;Главная</a></li>
        <li><a href="#about"><i class="service-icon fa fa-info"></i>&nbsp;О проекте</a></li>
        <li><a href="#services"><i class="service-icon fa fa-laptop"></i>&nbsp;Сервис</a></li>
        <li><a href="#portfolio"><i class="service-icon fa fa-camera"></i>&nbsp;Наши принципы</a></li>
        <li><a href="#contact"><i class="service-icon fa fa-envelope"></i>&nbsp;Контакты</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
  </div>
</nav>
    <!-- /Navigation -->
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