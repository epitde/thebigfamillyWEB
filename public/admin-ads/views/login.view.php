<section style="background: url(http://via.placeholder.com/1920x1080));background-size: cover">
    <div class="height-100-vh bg-primary-trans">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <!-- <img src="../assets/images/wbdashboard.png" style="margin-top: 70px; max-width: 200px; display: block; text-align: center; margin-left: auto; margin-right: auto;"> -->
                    <h1 style="margin-top: 70px; max-width: 200px; display: block; text-align: center; margin-left: auto; margin-right: auto; color: #fff">The Big Family</h1>
                    <div class="login-div" style="padding-top: 20px;margin: 30px auto 30px; margin-bottom: 15px">
                       <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="login" id="needs-validation" novalidate>  
                            <div class="form-group">
                                <label>Login</label>
                                <input class="form-control input-lg" placeholder="Username" name="username" type="text" required>
                                <div class="invalid-feedback">This field is required.</div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control input-lg" placeholder="Password" name="password" type="password" required>
                                <div class="invalid-feedback">This field is required.</div>
                            </div>
                            <div class="form-group">
                                <div class="forgot">Forgot password?</div>
                            </div>

                            <button class="btn btn-primary mt-2" type="submit" style="width: 100%">Sign In</button>

                            <?php if( !empty($errors)): ?>

							<div class="alert alert-danger animated fadeIn" role="alert" style="margin-top: 20px; margin-bottom: 0; text-transform: uppercase; font-size: 11px; text-align: center;">
    
    						<?php echo $errors; ?>
    
							</div>
							
							<?php endif; ?>

                        </form>
                    </div>

                    <div id="sendLink" class="login-div" style="padding-top: 40px;margin: 30px auto 30px; margin-bottom: 15px">
                        <p>Sent a link your email address to reset password.</p>
                        <br/>
                        <button class="btn btn-primary mt-2" type="button" id="bt_back" style="width: 100%">Back</button>
                    </div>

                    <div style="text-align: center; color: #fff; text-transform: uppercase; font-size: 10px;">
                    Copyrights SnapPost!
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    var loginLink = "<?php echo SITE_URL; ?>/controller/login.php";
    var link = loginLink + "?reset=true";
    $(function() {
        $('.forgot').click(function() {
            console.log(link);
            location.href = link;
        })
    })
</script>
<style type="text/css">
    .forgot {
        text-align: right;
        padding: 0px 0px;
        cursor: pointer;
    }
    #sendLink {
        display: none;
    }
</style>
<?php 
if (isset($_GET['reset'])) {

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

// ***********************************************************
$sql = "SELECT * FROM managers";
$result = mysqli_query($connection, $sql);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

$token = md5(time()*524);
$sql = "UPDATE managers SET token='".$token."'";
mysqli_query($connection, $sql);

$link = SITE_URL . '/controller/reset.php?token=' . $token;

$message = "
<html>
<head>
<title>SnapPost Admin - Reset Password</title>
</head>
<body>
<p>Here is reset link</p>
<p><a href='".$link."'>".$link."</a>
</html>
";

$email = $row['username'];
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$from = "admin@bigzero.co.in";
$from = "no-reply@bigzero.co.in";
$headers .= 'From: <'.$from.'>' . "\r\n";

mail($email, "SnapPost Admin - Reset Password", $message,$headers);

?>
<script type="text/javascript">
    $(function() {
        $('.login-div').hide();
        $('#sendLink').show();
        $('#bt_back').click(function() {
            location.href = loginLink;
        })
    })
</script>
<?php
}
?>