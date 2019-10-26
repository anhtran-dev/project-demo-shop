<html>
    <head>
        <title>LOGIN</title>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/import/login.css" rel="stylesheet" type="text/css"/>
   
    </head>
    <body>
        <div id ="site" class="">
            <div id="wrapper">
                <div id="form_login">
                <h1>Đăng nhập vào quản trị</h1>
                <form action="" method="POST">
                    
                    <input type="text" name="username" id="username" placeholder="username"/>
                    <?php echo form_error('username'); ?>
                    <input type="password" name="password" id="password" placeholder="password">
                    <?php echo form_error('password'); ?>
                    <input type="checkbox" name="remember_me" id="remember_me">
                    <label for="remember_me">Ghi nhớ mật khẩu</label>
                    <input type="submit" name="btn_login" id="bnt_login" value="Đăng nhập">
                    <?php echo form_error('account'); ?>

                    <a href="?mod=users&action=reset" class="forgot_pass">Forgot password?</a>

                </form>
            </div>
            </div>
            
        </div>



    </body>
</html>







