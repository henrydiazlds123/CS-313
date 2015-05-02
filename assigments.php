<?php
    include"./includes/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
    <?php heading('WDS | Assignments Page'); ?>
    
    <body>

        <!-- Header -->
        <header>               
            <div class="container content">
                <div class="row">
                    <div class="header-left-text">
                        <h5><a href="mailto:henrydiazlds123@hotmail.com">Henry Diaz</a></h5>
                    </div>
                    <div class="header-right-text">
                        <h5><a href="index.php">Home</a></h5>
                    </div>
                </div>
                <h1 id="main-text">Assignments Page is comming soon</h1>
                <h3 id="second-text">Web Engineering II - CS 313</h3>
         
                <!-- Countdown start -->
                <div id="countdown_dashboard">
                    <div class="dash weeks_dash">
                        <span class="dash_title">weeks</span>
                        <div class="digit">0</div>
                        <div class="digit">0</div>
                    </div>
                    <div class="dash days_dash">
                        <span class="dash_title">days</span>
                        <div class="digit">0</div>
                        <div class="digit">0</div>
                    </div>
                    <div class="dash hours_dash">
                        <span class="dash_title">hours</span>
                        <div class="digit">0</div>
                        <div class="digit">0</div>
                    </div>
                    <div class="dash minutes_dash">
                        <span class="dash_title">minutes</span>
                        <div class="digit">0</div>
                        <div class="digit">0</div>
                    </div>
                    <div class="dash seconds_dash">
                        <span class="dash_title">seconds</span>
                        <div class="digit">0</div>
                        <div class="digit">0</div>
                    </div>
                </div>
                <!-- Countdown end -->     
            </div>
        </header>
        <!-- End Header -->
   
        <!-- End About Section -->
        <section id="social">
            <div class="container content">                
                <h2>CONNECT WITH ME</h2>                
                <!-- Social Icons -->
                <ul class="social-icon-container">
                    <li>
                        <a href="http://www.facebook.com/henrydiazlds123" target="_blank">
                            <img src="img/social-icons/facebook.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="http://twitter.com/henrydiazlds123" target="_blank">
                            <img src="img/social-icons/twitter.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/user/henrydiazlds123" target="_blank">
                            <img src="img/social-icons/youtube.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <img src="img/social-icons/google+.png" alt="">
                        </a>
                    </li>
                </ul>
                <!-- End Social Icons -->                
            </div>
        </section>
        
        <!-- Javascript -->
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.lwtCountdown-1.0.js"></script>
        <script type="text/javascript" src="js/countdown_setup.js"></script>
        <script type="text/javascript" src="js/scrollup.js"></script>        
        <!-- End Javascripts -->        
    </body>

</html>