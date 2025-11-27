<section id="cart_items">
        <section>
            <!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
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
                        <div class="login-form">
                            <!--login form-->
                            <h2 align="center">Account information</h2>
                            <form onsubmit="return confirm('confirm checkout')" method="post"
                                action="<?php echo base_url('online-checkout') ?>">
                                <label>Name:</label>
                                <input type="text" name="username" placeholder="Name"
                                    value="<?php echo $user_info['username']; ?>" />
                                <?php echo form_error('username'); ?>
                                <label>Email:</label>
                                <input type="text" name="email" placeholder="Email"
                                    value="<?php echo $user_info['email']; ?>" />
                                <?php echo form_error('email'); ?>     
                                <label>Password:</label>
                                <input type="text" name="password" placeholder="Password"
                                    value="<?php echo $user_info['password']; ?>" />
                                <?php echo form_error('password'); ?>
                                <label>Address:</label>
                                <input type="text" name="address" placeholder="Address"
                                    value="<?php echo $user_info['shipping_address']; ?>" />
                                <?php echo form_error('address'); ?>
                                <label>Contact:</label>
                                <input type="text" name="contact" placeholder="Contact"
                                    value="<?php echo $user_info['contact']; ?>" />
                                <?php echo form_error('contact'); ?>                           
                                <button type="submit" name="Update" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                        <!--/login form-->
                    </div>
                </div>
            </div>
        </section>
        <!--/form-->
    </div>
</section>
<!--/#cart_items-->