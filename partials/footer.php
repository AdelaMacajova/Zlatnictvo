<footer id="about-us" class="site-footer">
        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3 class="widget-title">About Us</h3>
                            LUXGOLD creates timeless jewelry with elegance and precision. We offer high-quality gold and diamond pieces, combining expert craftsmanship with unique designs. Discover your perfect sparkle with us!
                            <ul class="follow-us">
                                <li><a href="https://www.facebook.com"><i class="fa fa-facebook"></i>Facebook</a></li>
                                <li><a href="https://x.com"><i class="fa fa-twitter"></i>Twitter</a></li>
                            </ul> <!-- /.follow-us -->
                        </div> <!-- /.footer-widget -->
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3 class="widget-title">Why Choose Us?</h3>
                            LUXGOLD - timeless elegance in every piece of gold and diamond jewelry.
                            <br><br>Where beauty and craftsmanship shine together. Designed to make your moments unforgettable.
                        </div> <!-- /.footer-widget -->
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-2">
                        <div class="footer-widget">
                            <h3 class="widget-title">Useful Links</h3>
                            <ul>
                                <li><a href="index.php">Our Shop</a></li>
                                <li><a href="#">Partners</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </div> <!-- /.footer-widget -->
                    </div> <!-- /.col-md-2 -->
                    <div class="col-md-4">
                        <div class="footer-widget">
                            <h3 class="widget-title">Our Newsletter</h3>
                            <div class="newsletter">
                                <form action="#" method="get">
                                    <p>Sign up for our regular updates to know when new products are released.</p>
                                    <input type="text" title="Email" name="email" placeholder="Your Email Here">
                                    <input type="submit" class="s-button" value="Submit" name="Submit">
                                </form>
                            </div> <!-- /.newsletter -->
                        </div> <!-- /.footer-widget -->
                    </div> <!-- /.col-md-4 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.main-footer -->
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span style="font-style: italic; font-weight:bold;"><?php $date = new Date(); echo $date->getDate(); ?></span>
                        <span>Copyright &copy; 
                            <?php 
                            $year = new Date();
                            echo $year->getCurrentYear(); 
                            ?> LUXGOLD</span>
                        <p>All rights reserved.</p>
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.bottom-footer -->
    </footer> <!-- /.site-footer -->
    <?php
        $assets = new Assets();
        $assets->add_scripts();
    ?>
 </body>
</html>
