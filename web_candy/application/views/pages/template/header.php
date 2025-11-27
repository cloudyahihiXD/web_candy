<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        <?= $this->config->config["pageTittle"] ?>
    </title>
    <link href="<?php echo base_url('frontend/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('frontend/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('frontend/css/prettyPhoto.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('frontend/css/price-range.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('frontend/css/animate.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('frontend/css/main.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('frontend/css/responsive.css') ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top text-center">
            <!--header_top-->
            <!-- <div class="container">
                <div>Free Ground shipping with purchase of $150+! Use code FREESHIP150 at checkout.</div>
            </div> -->
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="logo pull-left">
                            <a href="<?php echo base_url('') ?>"><img src="<?php echo base_url('frontend/images/logo.png') ?>" alt="" style="height: 45px; width: 100px;"/></a>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="search_box pull-right">
                            <form action="<?php echo base_url('search') ?>" method="get">
                                <input type="text" name="keyword" placeholder="Search..."  style="width: 650px;"/>
                                <input type="submit" style="margin: 0; color: #fff;" value="Search"
                                    class="btn btn-primary" />
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="<?php echo base_url('') ?>" class="active">Home</a></li>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">Category <i
                                            class="fa fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <?php
                                        foreach ($category as $key => $cate) {
                                            ?>
                                            <li><a href="<?php echo base_url('cat/'.$cate->id) ?>">
                                                    <?php echo $cate->categoryName ?>
                                                </a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">Subcategory <i
                                            class="fa fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <?php
                                        foreach ($subcategory as $key => $subcate) {
                                            ?>
                                            <li><a href="<?php echo base_url('subcat/'.$subcate->id) ?>">
                                                    <?php echo $subcate->subcategory ?>
                                                </a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <?php
                                if ($this->session->userdata('LoggedInCustomer')) {
                                    // $userId =$this->session->userdata('LoggedInCustomer')['id'];
                                    ?>
                                    <li><a href="<?php echo base_url('user') ?>"><i class="fa fa-user"></i>
                                        <?php echo $this->session->userdata('LoggedInCustomer')['username'] ?></a>
                                    </li>
                                    <li><a href="<?php echo base_url('cart') ?>"><i class="fa fa-crosshairs"></i>
                                            Checkout</a></li>
                                    <li><a href="<?php echo base_url('logout-customer') ?>"><i class="fa fa-lock"></i>
                                            Logout</a></li>
                                    <?php
                                } else {
                                    ?>
                                    <li><a href="<?php echo base_url('user-login') ?>"><i class="fa fa-lock"></i> Login</a>
                                    </li>
                                    <?php
                                }
                                ?>
                                <li><a href="<?php echo base_url('cart') ?>"><i class="fa fa-shopping-cart"></i>
                                        Cart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->