<section>
    <div class="container">
        <div class="row">

            <?php $this->load->view('pages/template/sidebar') ?>

            <div class="col-sm-9 padding-right">
                <?php
                foreach ($product_detail as $key => $prod) {
                    ?>
                    <div class="product-details">
                        <!--product-details-->
                        <div class="col-sm-5">
                            <div id="similar-product" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <a href=""><img
                                                src="<?php echo base_url('uploads/products/' . $prod->productImage1) ?>"
                                                alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href=""><img
                                                src="<?php echo base_url('uploads/products/' . $prod->productImage2) ?>"
                                                alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href=""><img
                                                src="<?php echo base_url('uploads/products/' . $prod->productImage3) ?>"
                                                alt=""></a>
                                    </div>

                                </div>

                                <!-- Controls -->
                                <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>

                        </div>
                        <form action="<?php echo base_url('add-to-cart') ?>" method="post">
                            <div class="col-sm-7">
                                <div class="product-information">
                                    <!--/product-information-->
                                    <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                    <h2>
                                        <?php echo $prod->productName ?>
                                    </h2>
                                    <input type="hidden" value="<?php echo $prod->id ?>" name="product_id">
                                    <img src="images/product-details/rating.png" alt="" />
                                    <span>
                                        <span>
                                            <?php echo number_format($prod->productPrice, 2, ',', '.') ?>$
                                        </span>
                                        <label>Quantity:</label>
                                        <input type="number" min="1" value="1" name="quantity" />
                                        <button type="submit" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </button>
                                    </span>
                                    <p><b>Availability:</b><?php echo $prod->productAvailability ?>
                                    </p>
                                    <p><b>Brand:</b> <?php echo $prod->productCompany ?>
                                    </p>
                                    <p><b>Category:</b> <?php echo $prod->catName ?>
                                    </p>
                                    <p><b>Subcategory:</b> <?php echo $prod->subcatName ?>
                                    </p>
                                    <a href=""><img src="images/product-details/share.png" class="share img-responsive"
                                            alt="" /></a>
                                </div>
                                <!--/product-information-->
                            </div>
                        </form>
                    </div>
                    <!--/product-details-->

                    <div class="category-tab shop-details-tab">
                        <!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li><a href="#details" data-toggle="tab">Details</a></li>
                                <li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="details">
                                <div>
                                    <?php echo $prod->productDescription ?>
                                </div>
                            </div>

                            <div class="tab-pane fade active in" id="reviews">
                                <div class="col-sm-12">
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure
                                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                        pariatur.</p>
                                    <p><b>Write Your Review</b></p>
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure
                                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                        pariatur.</p>
                                    <p><b>Write Your Review</b></p>

                                    <form action="#">
                                        <span>
                                            <input type="text" class="name_review" required placeholder="Your Name" />
                                            <input type="email" class="email_review" required placeholder="Email Address" />
                                        </span>
                                        <textarea name="" class="review" required placeholder="Review"></textarea>
                                        <button type="button" class="btn btn-default pull-right write-review">
                                            Sent
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--/category-tab-->
                    <?php
                }
                ?>

                <div class="recommended_items">
                    <!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            foreach ($product_related as $key => $prod) {
                                ?>
                                <div class="item <?php echo $key == 0 ? 'active' : '' ?>">
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
                                                        class="btn btn-default add-to-cart"><i
                                                            class="fa fa-eye"></i>Details</a>
                                                    <button type="submit" class="btn btn-fefault cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <!--/recommended_items-->

            </div>
        </div>
    </div>
</section>