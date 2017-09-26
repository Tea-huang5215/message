<?php

// 1 判断POST数据
if(empty($_POST['user_name']) || empty($_POST['password']) || empty($_POST['check_password'])) {
    header('location: register.php?errmsg=用户名或密码不能为空');
    return;
}

$user_name = $_POST['user_name'];
$password = $_POST['password'];
$check_password = $_POST['check_password'];

// 2 判断密码是否相等
if($password != $check_password) {
    header('location: register.php?errmsg=两次密码不一样');
    return;
}

// 3 判断用户名是否存在
$con = mysqli_connect('localhost', 'root', '', 'kingphp', '3306');
if(!$con) {
    header('location: register.php?errmsg=服务器抽风了，攻城狮正在抢修中...');
    return;
}

mysqli_query($con, 'set names utf8');

$user_name = mysqli_real_escape_string($con, $user_name);

$sqlStr = "select uid from user where user_name='${user_name}'";

$rest = mysqli_query($con, $sqlStr);
if(!$rest) {
    header('location: register.php?errmsg=服务器抽风了，攻城狮正在抢修中...');
    return;
}
$row = mysqli_fetch_assoc($rest);
if(empty($row['uid'])) {
    // 系统中没有该用户，则允许注册，将信息插入数据库中
    $password = md5($password);
    $sqlStr = "insert into user(user_name, password) VALUES('${user_name}', '${password}')";
    mysqli_query($con, $sqlStr);

    mysqli_close($con);
}
else {
    // 系统中已经有该用户名，则不允许注册
    mysqli_free_result($rest);
    header('location: register.php?errmsg=用户名已经存在');
    return;
}
