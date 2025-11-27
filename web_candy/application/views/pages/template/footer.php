<footer id="footer">
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>About Us</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum, ante eget
                        sagittis mattis, velit ligula dignissim orci, sit amet lacinia lorem magna sit amet lorem.</p>
                </div>
                <div class="col-md-3">
                    <h3>Contact Us</h3>
                    <ul class="list-unstyled contact-list">
                        <li><i class="fa fa-map-marker"></i>123 Candy Lane, Sweetville, CA</li>
                        <li><i class="fa fa-phone"></i>(+84) 983 746 253</li>
                        <li><i class="fa fa-envelope"></i>candyhouse@gmail.com</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <h3>Sign Up For Special Offers & Delicious Candy!</h3>
                    <form action="#" class="subscribe-form">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Your email address">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i
                                        class="fa fa-arrow-circle-o-right"></i></button>
                            </span>
                        </div>
                        <p class="subscribe-text">Get the most recent updates from our site and be updated yourself...
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Footer Top -->

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>&copy; 2024 Candy Warehouse. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /Footer Bottom -->
</footer>




<script src="<?php echo base_url('frontend/js/jquery.js') ?>"></script>
<script src="<?php echo base_url('frontend/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('frontend/js/jquery.scrollUp.min.js') ?>"></script>
<script src="<?php echo base_url('frontend/js/price-range.js') ?>"></script>
<script src="<?php echo base_url('frontend/js/jquery.prettyPhoto.js') ?>"></script>
<script src="<?php echo base_url('frontend/js/main.js') ?>"></script>

<script>
    $(document).ready(function () {
        var active = location.search;
        $('#select-filter-option[value="' + active + '"]').atlr('selected', 'selected');
    })

    $('.select-filter').change(function () {
        var value = $(this).find(':selected').val();
        // alert(value);
        if (value != 0) {
            var url = value;
            window.location.replace(url);
        } else {
            alert("please sort");
        }
    })
</script>
<script>
    $('.write-review').click(function () {
        // alert('ok');
        var name_review = $('.name_review').val();
        var email_review = $('.email_review').val();
        var review = $('.review').val();

        // alert(name_review);
        // alert(email_review);
        // alert(review);

        if (name_review == '' || email_review == '' || review == '') {
            alert('please enter all the Information');
        } else {
            $.ajax({
                method: 'POST',
                url: '/review/send',
                data: (name_review: name_review, email_review: email_review, review: review),
                success: function () {
                    alert('thanks for the review');
                }
            })
        }

    })
</script>
</body>

</html>