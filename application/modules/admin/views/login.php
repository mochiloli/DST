<!--<div class="login-box">
    <div class="login-logo"><b><?php echo $site_name; ?></b></div>
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
<?php echo $form->open(); ?>
<?php echo $form->messages(); ?>

<?php echo $form->bs3_text('Username', 'username', ENVIRONMENT === 'development' ? 'admin' : ''); ?>
<?php echo $form->bs3_password('Password', 'password', ENVIRONMENT === 'development' ? 'admin' : ''); ?>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Remember Me</label>
                </div>
            </div>
            <div class="col-xs-4">
<?php echo $form->bs3_submit('Sign In', 'btn btn-primary btn-block btn-flat'); ?>
            </div>
        </div>
<?php echo $form->close(); ?>
    </div>
</div>-->

<div class="container login-box">    
    <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div  class="panel panel-primary" >
            <div class="panel-heading" style="background-color: #33cca6;">
                <div class="panel-title"><h4 class="text-center">ดวงเศรษฐี</h4></div>
            </div>     
            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <?php echo $form->open(); ?>
                <?php echo $form->messages(); ?>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login-username" type="text" class="form-control" name="username" value="webmaster" placeholder="username">                                        
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="login-password" type="password" class="form-control" name="password" value="webmaster" placeholder="password">
                </div>
                <div class="form-group" >
                    <input style="background-color: #33cca6;" type="submit" class="btn btn-primary" value="Login">
                </div>    
                <?php echo $form->close(); ?>  
            </div>                     
        </div>  
    </div>
</div> 