<section style="background: url(http://via.placeholder.com/1920x1080));background-size: cover">
    <div class="height-100-vh bg-primary-trans">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <img src="../assets/images/wbdashboard.png" style="margin-top: 70px; max-width: 200px; display: block; text-align: center; margin-left: auto; margin-right: auto;">
                    
                    <div class="login-div" style="padding-top: 20px;margin: 30px auto 30px; margin-bottom: 15px">
                       <?php 
                        if ($valid) {
                        ?>
                       <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="login" id="needs-validation" novalidate>  
                        <h1>Reset password</h1>
                            <div class="form-group">
                                <label>New Password</label>
                                <input class="form-control input-lg" placeholder="Password" name="password" type="password" required>
                                <div class="invalid-feedback">This field is required.</div>
                            </div>
                            <div class="form-group">
                                <label>ConfirmPassword</label>
                                <input class="form-control input-lg" placeholder="Confirm Password" name="password1" type="password" required>
                                <div class="invalid-feedback">This field is required.</div>
                            </div>

                            <button class="btn btn-primary mt-2" type="submit" style="width: 100%">Reset</button>

                            <?php if( !empty($errors)): ?>

							<div class="alert alert-danger animated fadeIn" role="alert" style="margin-top: 20px; margin-bottom: 0; text-transform: uppercase; font-size: 11px; text-align: center;">
    
    						<?php echo $errors; ?>
    
							</div>
							
							<?php endif; ?>

                        </form>
                        <?php 
                        } else {
                        ?>
                        <p style="text-align: center;">Invalid Token!</p>
                        <?php 
                        }
                        ?>
                    </div>

                    <div style="text-align: center; color: #fff; text-transform: uppercase; font-size: 10px;">
                    Copyrights SnapPost!
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>