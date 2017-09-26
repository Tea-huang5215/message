<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>用户注册</title>
    <style>
        body {
            text-align: center;
        }
        label {
            display: inline-block;
            min-width: 100px;
            text-align: right;
        }
        form {
            width: 300px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<h1>用户注册</h1>
<form action="register_process.php" method="post">
    <label>用户名：</label><input type="text" name="user_name"><br>
    <label>密码：</label><input type="password" name="password"><br>
    <label>确认密码：</label><input type="password" name="check_password"><br>
    <input type="submit" value="注册">
</form>
<p style="color: red; font-size: 10px">
<?php echo empty($_GET['errmsg'])?'': $_GET['errmsg']; ?>
</p>
</body>
</html>
