    <?php
        include('partials/header.php');
    ?>

    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6">
                    <h3 class="widget-title">Contact Us</h3>
                    <div class="contact-form">
                        <form name="contactform" id="contactform" action="thankyou.php" method="POST">
                            <p>
                                <input name="name" type="text" id="name" name="name" placeholder="Your Name">
                            </p>
                            <p>
                                <input name="email" type="text" id="email" name="email" placeholder="Your Email"> 
                            </p>
                            <p>
                                <input name="subject" type="text" id="subject" name="subject" placeholder="Subject"> 
                            </p>
                            <p>
                                <textarea name="message" id="message" name="message" placeholder="Message"></textarea>    
                            </p>
                            <input type="submit" class="mainBtn" id="submit" name="submit" value="Send Message">
                        </form>
                    </div> <!-- /.contact-form -->
                </div>
                <div class="col-md-7 col-sm-6 map-wrapper">
                    <h3 class="widget-title">Our Location</h3>
                    <div class="map-holder" style="height: 360px"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1589.7061644651753!2d17.112410023786463!3d48.129838880956555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c89360aca6197%3A0x631f9b82fd884368!2sBratislava!5e0!3m2!1ssk!2ssk!4v1741629750609!5m2!1ssk!2ssk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                </div>
            </div>
        </div>
    </div> <!-- /.content-section -->

    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title">
                    <h2>Vote For Future Products</h2>
                </div> <!-- /.section -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="product-item-vote">
                        <div class="product-thumb">
                            <img src="images/products/1.jpg" alt="">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5><a href="#">Name of Shirt</a></h5>
                            <span class="tagline">By: LUXGOLD</span>
                            <ul class="progess-bars">
                                <li>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                                        <span>3<i class="fa fa-heart"></i></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="progress">
                                        <div class="progress-bar comments" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        <span class="comments">3<i class="fa fa-heart"></i></span>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item-vote -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="product-item-vote">
                        <div class="product-thumb">
                            <img src="images/products/2.jpg" alt="">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5><a href="#">Name of Shirt</a></h5>
                            <span class="tagline">By: JohnDoe</span>
                            <ul class="progess-bars">
                                <li>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                                        <span>3<i class="fa fa-heart"></i></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="progress">
                                        <div class="progress-bar comments" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        <span class="comments">3<i class="fa fa-heart"></i></span>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item-vote -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="product-item-vote">
                        <div class="product-thumb">
                            <img src="images/products/3.jpg" alt="">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5><a href="#">Name of Shirt</a></h5>
                            <span class="tagline">By: JohnDoe</span>
                            <ul class="progess-bars">
                                <li>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                                        <span>3<i class="fa fa-heart"></i></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="progress">
                                        <div class="progress-bar comments" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        <span class="comments">3<i class="fa fa-heart"></i></span>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item-vote -->
                </div> <!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="product-item-vote">
                        <div class="product-thumb">
                            <img src="images/products/4.jpg" alt="">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5><a href="#">Name of Shirt</a></h5>
                            <span class="tagline">By: JohnDoe</span>
                            <ul class="progess-bars">
                                <li>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                                        <span>3<i class="fa fa-heart"></i></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="progress">
                                        <div class="progress-bar comments" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        <span class="comments">3<i class="fa fa-heart"></i></span>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item-vote -->
                </div> <!-- /.col-md-3 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.content-section -->



        
    <!-- Google Map
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="js/vendor/jquery.gmap3.min.js"></script>
    
    <script type="text/javascript">
        jQuery(function($){
            $('.first-map, .map-holder').gmap3({
                marker:{
                    address: '40.7828839,-73.9652425'
                },
                    map:{
                    options:{
                    zoom: 15,
                    scrollwheel: false,
                    streetViewControl : true
                    }
                }
            });
        });
    </script> -->
       


    <?php
   include('partials/footer.php')
   ?>