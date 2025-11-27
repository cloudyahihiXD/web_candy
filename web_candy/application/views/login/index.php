<div class="container" style="height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div class="card" style="width: 400px;">
        <div class="card-header bg-primary text-white">
            Login to Admin Page
        </div>
        <div class="card-body">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success') ?>
                </div>
            <?php elseif ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>
            <form action="<?php echo base_url('login-user') ?>" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address:</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email" required>
                    <?php echo form_error('email'); ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password:</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Password" required>
                    <?php echo form_error('password'); ?>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="text-center">
                    <a href="<?php echo base_url('register-admin') ?>" class="btn btn-success">Admin Register</a>
                </div>
            </form>
        </div>
    </div>
</div>
