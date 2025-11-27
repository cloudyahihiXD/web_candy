<div class="container">
    <div class="card">
        <div class="card-header">
            Order List
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Shipping address</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Order date</th>
                        <th scope="col">Payment method</th>
                        <th scope="col">Order status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <th scope="row">
                                <?php echo $order->id ?>
                            </th>
                            <td>
                                <?php echo $order->username ?>
                            </td>
                            <td>
                                <?php echo $order->email ?>
                            </td>
                            <td>
                                <?php echo $order->contact ?>
                            </td>
                            <td>
                                <?php echo $order->shipping_address ?>
                            </td>
                            <td>
                                <?php echo $order->productName ?>
                            </td>
                            <td>
                                <?php echo $order->Quantity ?>
                            </td>
                            <td>
                                <?php echo $order->OrderDate ?>
                            </td>
                            <td>
                                <?php echo $order->PaymentMethod ?>
                            </td>
                            <td>
                                <?php echo $order->OrderStatus ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('dashboard/changeStatus/' . $order->id ); ?>"
                                    class="btn btn-primary">Edit status</a>
                                    <a href="<?php echo base_url('dashboard/delete/'.$order->id) ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>