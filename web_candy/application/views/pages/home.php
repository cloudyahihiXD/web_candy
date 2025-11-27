<section>
    <div class="container">
        <div class="row">
            <?php $this->load->view('pages/template/sidebar') ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    <form action="<?php echo base_url('add-to-cart') ?>" method="post">
                        <?php
                        foreach ($allproduct_pagination as $key => $prod) {
                            ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
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
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </form>

                </div>
                <!--features_items-->
                <?php echo $links; ?>
            </div>

            <?php
            foreach ($items_categories as $key => $items) {
                // foreach($items as $item_pro){}
                ?>
                <div class="col-sm-3"></div>
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <h2 class="title text-center">
                            <?php echo $key ?>
                        </h2>
                        <form action="<?php echo base_url('add-to-cart') ?>" method="post">
                            <?php
                            foreach ($items as $prod_cat) {
                                ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <input type="hidden" value="<?php echo $prod_cat['id'] ?>" name="product_id">
                                                <input type="hidden" value="1" name="quantity">
                                                <img src="<?php echo base_url('uploads/products/' . $prod_cat['productImage1']) ?>"
                                                    alt="" />
                                                <h2>
                                                    <?php echo number_format($prod_cat['productPrice'], 2, ',', '.') ?>$
                                                </h2>
                                                <p>
                                                    <?php echo $prod_cat['productName'] ?>
                                                </p>
                                                <a href="<?php echo base_url('pro/' . $prod->id) ?>"
                                                    class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Details</a>
                                                <button type="submit" class="btn btn-fefault cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </form>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>