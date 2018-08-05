<?php
if (isset($_POST['Email'])) { $Email = $_POST['Email']; if ($Email == '') { unset($Email);} } //заносим введенный пользователем логин в переменную $Email, если он пустой, то уничтожаем переменную
if (isset($_POST['Password'])) { $Password=$_POST['Password']; if ($Password =='') { unset($Password);} }
//заносим введенный пользователем пароль в переменную $Password, если он пустой, то уничтожаем переменную

if (empty($Email) or empty($Password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
exit ("Вы ввели не всю информацию, венитесь назад и заполните все поля!");
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$Email = stripslashes($Email);
$Email = htmlspecialchars($Email);

$Password = stripslashes($Password);
$Password = htmlspecialchars($Password);

//удаляем лишние пробелы
$Email = trim($Email);
$Password = trim($Password);


// подключаемся к базе
include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 

// проверка на существование пользователя с таким же логином
$result = mysql_query("SELECT Id FROM Users WHERE Email='$Email'",$db);
$myrow = mysql_fetch_array($result);
if (!empty($myrow['Id'])) {
exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}

// если такого нет, то сохраняем данные
$result2 = mysql_query ("INSERT INTO Users (Email,Tariff,Password) VALUES('$Email',09/20/2018,'$Password')");
// Проверяем, есть ли ошибки
if ($result2=='TRUE')
{
echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
}

else {
echo "Ошибка! Вы не зарегистрированы.";
     }
?>