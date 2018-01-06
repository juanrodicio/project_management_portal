<html lang="en">
<head>
 <meta charset="utf-8" />
 <title>Login</title>
</head>
<body>
 <h1>Login</h1>
 <?php if (isset($message)): ?>
    <h2><?=$message?> </h2>
 <?php endif;?>
 <!--form-->
 <form name="form_iniciar" method="POST" action="<?=base_url() . 'index.php/user/verify_session'?>">
 <label for="User"> Username</label>
 <input type="text" name="username" /> <br/>
 <label for="password"> Password</label>
 <input type="password" name="password" /> <br/>
 <input type="submit" value="Log in!" name="submit" /> <br/>
 <a href="<?=base_url() . 'user/register'?>" title="Register">Register</a>
 </form>
 <!--end form-->
</body>
</html>
