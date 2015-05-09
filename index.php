<?php include"./includes/functions.php"; ?>

<!DOCTYPE html>
<html lang="en">
    <?php heading('WDS | Home'); ?>    
    <body style"background-image: url('img/P1080479.jpg')">

        <!-- Header -->
        <header>               
            <div class="container content">
                <div class="row">
                    <div class="header-left-text">
                        <h5><a href="mailto:henrydiazlds123@hotmail.com">Henry Diaz</a></h5>
                    </div>
                    <div class="header-right-text">
                        <h5><a href="assigments.php">Assigments</a></h5>
                    </div>
                </div>
                <h1 id="main-text">My new website is under construction</h1>
                <h3 id="second-text">Web Engineering II - CS 313</h3>   
            </div>
        </header>
        <!-- End Header -->
        <section id="about">
            <h2>Henry J. Diaz Olivero</h2>
            <article class="aboutme">
                <img class="img-rounded" src="img/family_copy.jpg" alt="My Family Picture">
                My name is Henry and am originally from Venezuela. I was baptized in the Church when I was 13 years old. In 1993, I served in the Venezuela Maracaibo Mission. In 2000 I moved to Puerto Rico, where I stayed for about 11 years. In 2011 we moved to Massachusetts pursuing a better education for my eldest son as he presented slurred speech from very early age.
                Being in an activity organized by the ward to which I attend, I met Elder Hopkin who spoke concerning Pathway and BYU-Idaho. With what little I could understand, because my English control was (and still is) quite bad, I decided to return to school.
                My major is in Web Design & Development with emphasis on development, because I do not feel good mixing colors and making things look nice.
                I really enjoyed my time studying at BYU-Idaho. I learned a lot about my field of study and hope to learn many more things; although I confess that it has not been easy, particularly for the language barrier. What someone takes an hour to read and process, takes me three hours, and I'm being very condescending myself.
                I hope to strengthen my previous knowledge in PHP and JAVA and learn everything I need to be a good developer in the not too distant future.
            </article>            
        </section>
        
        <!-- Locate Section -->
        <section id="locate">
            <div class="container content">
                
                <div id="Gmap"></div>
                
                <input id="view-map" type="checkbox" class="view-map-selector">
                
                <div id="view-address-btn">
                    <label for="view-map" class="btn" >VIEW ADDRESS</label>
                </div>                
                
                <div id="locate-overlay">
                    <div class="div-1">
                        <div>
                            <h2>Locate Me</h2>
                            <p>
                                Web Development Standard<br>
                                39 Dartmouth St<br>
                                Waltham, MA-02453<br>
                                (857) 364-1039<br>
                                dia12013@byui.edu 
                            </p>                           
                        </div>
                        <div>
                            <label for="view-map" class="btn">VIEW MAP</label>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        <!-- End Locate Section -->
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
        
        <a href="#" class="scrollup"></a>
        
        <!-- Javascript -->
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="js/scrollup.js"></script>  
        <!-- End Javascripts -->        
    </body>

</html>