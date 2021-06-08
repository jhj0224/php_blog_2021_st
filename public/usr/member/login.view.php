<?php
$pageTitle = "로그인";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$pageTitle?></title>
  
</head>
<body>
  <h1><?=$pageTitle?></h1>
  <hr>

<form action="doLogin.php">
  <div>
    <span>로그인아이디</span>
    <input required placeholder="로그인아이디를 입력해주세요." type="text" name="loginId"> 
  </div>
  <div>
    <span>로그인비밀번호</span>
    <input required placeholder="로그인비밀번호를 입력해주세요." type="password" name="loginPw"> 
  </div>
  <div>
    <input type="submit" value="로그인">
  </div>
</form>

<?php require_once __DIR__ . "/../foot.php"; ?>