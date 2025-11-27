<section>
    <div class="container">
        <div class="row">
            <?php $this->load->view('pages/template/sidebar') ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->

                    <h2 class="title text-center">
                        <?php echo $name ?>
                    </h2>
                    <?php
                    foreach ($allproductbycategory_pagination as $key => $prod) {
                        ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <form action="<?php echo base_url('add-to-cart') ?>" method="post">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <input type="hidden" value="<?php echo $prod->id ?>" name="product_id">
                                            <input type="hidden" value="1" name="quantity">
                                            <img src="<?php echo base_url('uploads/products/' . $prod->productImage1) ?>"
                                                alt="" />
                                            <h2>
                                                <?php echo number_format($prod->productPrice, 2, ',', '.') ?>$
                                            </h2>
                                            <p>
                                                <?php echo $prod->productName ?>
                                            </p>
                                            <a href="<?php echo base_url('pro/' . $prod->id) ?>"
                                                class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Details</a>
                                            <button type="submit" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
                                            </button>
                                        </div>
                                    </div>
                                    <form action="<?php echo base_url('add-to-cart') ?>" method="post">
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <!--features_items-->
                <?php echo $links; ?>
            </div>
        </div>
    </div>
</section>