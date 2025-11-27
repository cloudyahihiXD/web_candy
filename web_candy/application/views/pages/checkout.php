<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Checkout</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php
            if ($this->cart->contents()) {
                ?>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="description">image</td>
                            <td class="image">Item</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $subtotal = 0;
                        foreach ($this->cart->contents() as $items) {
                            // Ensure quantity and price data is fetched correctly
                            $quantity = $items['qty'];
                            $price = $items['price'];

                            // Calculate subtotal for each item
                            $subtotal = $quantity * $price;
                            $total += $subtotal;
                            ?>
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img
                                            src="<?php echo base_url('uploads/products/' . $items['options']['image']) ?>"
                                            width="150" height="150" alt="<?php echo $items['name'] ?>"></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">
                                            <?php echo $items['name'] ?>
                                        </a></h4>
                                </td>
                                <td class="cart_price">
                                    <p>
                                        <?php echo number_format($price, 2, ',', '.') ?>$
                                    </p>
                                </td>
                                <td class="cart_quantity">
                                    <form action="<?php echo base_url('update-cart-item') ?>" method="post">
                                        <div class="cart_quantity_button">
                                            <input type="hidden" value="<?php echo $items['rowid'] ?>" name="rowid">
                                            <input class="cart_quantity_input" type="text" min="1" name="quantity"
                                                value="<?php echo $quantity ?>" autocomplete="off" size="2">
                                            <input type="submit" name="update" class="btn btn-warning" value="Update"></input>
                                        </div>
                                    </form>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">
                                        <?php echo number_format($subtotal, 2, ',', '.') ?>$
                                    </p>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td colspan="5" align="right">GRAND TOTAL<p class="cart_total_price">
                                    <?php echo number_format($total, 2, ',', '.') ?>$
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php
            } else {
                echo '<span class="text text-danger">Your shopping cart is empty</span>';
            }
            ?>
        </div>
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
                            <h2 align="center">Enter checkout information</h2>
                            <form onsubmit="return confirm('confirm checkout')" method="post"
                                action="<?php echo base_url('online-checkout') ?>">
                                <label>Name:</label>
                                <input type="text" name="username" placeholder="Name"
                                    value="<?php echo $user_info['username']; ?>" />
                                <?php echo form_error('username'); ?>
                                <label>Address:</label>
                                <input type="text" name="address" placeholder="Address"
                                    value="<?php echo $user_info['shipping_address']; ?>" />
                                <?php echo form_error('address'); ?>
                                <label>Contact:</label>
                                <input type="text" name="contact" placeholder="Contact"
                                    value="<?php echo $user_info['contact']; ?>" />
                                <?php echo form_error('contact'); ?>
                                <label>Email:</label>
                                <input type="text" name="email" placeholder="Email"
                                    value="<?php echo $user_info['email']; ?>" />
                                <?php echo form_error('email'); ?>
                                <label>Payment method:</label>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <button type="submit" name="payUrl" value="Momo" class="btn btn-primary">Pay
                                            with
                                            Momo</button>
                                    </div>
                                    <!-- <div class="col-sm-4">
                                        <button type="submit" name="redirect" value="VNPay" class="btn btn-primary">Pay
                                            with
                                            VNPay</button>
                                    </div> -->
                                    <div class="col-sm-4">
                                        <button type="submit" name="COD" value="COD"
                                            class="btn btn-primary">COD</button>
                                    </div>
                                </div>
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