<div class="container">
    <div class="card">
        <div class="card-header">
            User Management
        </div>
        <div class="card-body">
            <p>Admin list</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td>
                                <?php echo $user->id; ?>
                            </td>
                            <td>
                                <?php echo $user->username; ?>
                            </td>
                            <td>
                                <?php echo $user->email; ?>
                            </td>
                            <td>
                                <?php echo $user->contact; ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('user/delete/' . $user->id) ?>"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p>Customer list</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Shipping address</th>
                        <!-- <th>Role</th>
                        <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customer as $customer): ?>
                        <tr>
                            <td>
                                <?php echo $customer->id; ?>
                            </td>
                            <td>
                                <?php echo $customer->username; ?>
                            </td>
                            <td>
                                <?php echo $customer->email; ?>
                            </td>
                            <td>
                                <?php echo $customer->contact; ?>
                            </td>
                            <td>
                                <?php echo $customer->shipping_address; ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('customer/delete/' . $customer->id) ?>"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>