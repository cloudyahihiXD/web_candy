<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Login to your account</h2>
                    <?php
                    if ($this->session->flashdata('success')) {
                        ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success') ?>
                        </div>
                        <?php
                    } else if ($this->session->flashdata('error')) {
                        ?>
                            <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('error') ?>
                            </div>
                        <?php
                    }
                    ?>
                    <form action="<?php echo base_url('login-customer') ?>" method="post">
                        <input type="email" name="email" placeholder="Email Address" />
                        <?php echo form_error('email'); ?>
                        <input type="password" name="password" placeholder="Password" />
                        <?php echo form_error('password'); ?>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="<?php echo base_url('register') ?>" method="post">
                        <input type="text" name="username" placeholder="Username" />
                        <?php echo form_error('username'); ?>
                        <input type="password" name="password" placeholder="Password" />
                        <?php echo form_error('password'); ?>
                        <input type="email" name="email" placeholder="Email Address" />
                        <?php echo form_error('email'); ?>
                        <input type="text" name="contact" placeholder="Contact" />
                        <?php echo form_error('contact'); ?>
                        <input type="text" name="shipping_address" placeholder="Shipping address" />
                        <?php echo form_error('shipping_address'); ?>
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->