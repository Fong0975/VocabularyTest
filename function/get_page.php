<?php

function getHead($pageTitle){
	
	echo "<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title>$pageTitle</title>
    <link rel='shortcut icon' href='assets/img/logo.ico' type='image/x-icon' />

    <!-- load stylesheets -->
    <!-- <link rel='stylesheet' href='assets/font-awesome-4.7.0/css/font-awesome.min.css'>  Font Awesome -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' >


    <link rel='stylesheet' href='assets/css/bootstrap.min.css'>                         <!-- Bootstrap style -->
    <link rel='stylesheet' type='text/css' href='assets/slick/slick.css'/>
    <link rel='stylesheet' type='text/css' href='assets/slick/slick-theme.css'/>
    <link rel='stylesheet' type='text/css' href='assets/css/datepicker.css'/>
    <link rel='stylesheet' type='text/css' href='assets/css/smallBtn.css'/>
    <link rel='stylesheet' href='assets/css/tooplate-style.css'>               <!-- Templatemo style -->
    ";
}

function getPage_Header_Menu($page){
	echo "<div class='tm-top-bar-bg'></div>
        <div class='tm-top-bar' id='tm-top-bar'>
            <!-- Top Navbar -->
            <div class='container'>
                <div class='row'>
                    
                    <nav class='navbar navbar-expand-lg narbar-light'>
                        <a class='navbar-brand mr-auto' href='index.php'>
                            <img src='assets/img/logo.png' alt='Site logo'>
                            單字記憶小幫手
                        </a>
                        <button type='button' id='nav-toggle' class='navbar-toggler collapsed' data-toggle='collapse' data-target='#mainNav' aria-expanded='false' aria-label='Toggle navigation'>
                            <span class='navbar-toggler-icon'></span>
                        </button>
                        <div id='mainNav' class='collapse navbar-collapse tm-bg-white'>
                            <ul class='navbar-nav ml-auto'>
                              <li class='nav-item'>
                                <a class='nav-link".(($page == "home") ? ( " active" ) : ( "" ))."' href='index.php'>首頁</a>
                              </li>
                              <li class='nav-item'>
                                <a class='nav-link".(($page == "book") ? ( " active" ) : ( "" ))."' href='book.php'>單字書</a>
                              </li>
                              <li class='nav-item'>
                                <a class='nav-link".(($page == "card") ? ( " active" ) : ( "" ))."' href='card.php'>單字卡</a>
                              </li>
                              <li class='nav-item'>
                                <a class='nav-link".(($page == "random") ? ( " active" ) : ( "" ))."' href='random.php'>隨機卡</a>
                              </li>
                            </ul>
                        </div>                            
                    </nav>            
                </div>
            </div>
        </div>
        <div class='tm-section tm-bg-img' id='tm-section-1'>
            <div class='tm-bg-white ie-container-width-fix-2'>
                <div class='container ie-h-align-center-fix'>
                    <div class='row'>
                        <div class='col-xs-12 ml-auto mr-auto ie-container-width-fix'>
                        </div>                        
                    </div>      
                </div>
            </div>                  
        </div>
        ";
}

function getPage_Footer(){
	echo"<div class=' tm-section-pad tm-bg-img tm-position-relative' id='tm-section-6'><!-- tm-section -->
            <div class='container ie-h-align-center-fix'>
                <div class='row'>
                    <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mt-3 mt-md-0'>
                        <!-- <div class='tm-bg-white tm-p-4'>
                        </div> -->                            
                    </div>
                </div>        
            </div>
        </div>
        
        <footer class='tm-bg-dark-blue'>
            <div class='container'>
                <div class='row'>
                    <p class='col-sm-12 text-center tm-font-light tm-color-white p-4 tm-margin-b-0'>
                    Copyright &copy; <span class='tm-current-year'>2018</span> Your Company
                    
                    - Design: <a href='https://www.facebook.com/tooplate' class='tm-color-primary tm-font-normal' target='_parent'>Tooplate</a></p>        
                </div>
            </div>                
        </footer>
        ";
}

function getDateDiff(){
    $date1 = '2019-06-23 09:00:00';
    $date2 = date("Y-m-d").'00:00:00';
    $str = "";
     
    $date=floor((strtotime($date1)-strtotime($date2))/86400);
    $str.= $date."天 ";
     
    $hour=floor((strtotime($date1)-strtotime($date2))%86400/3600);
    $str.= $hour."時 ";
     
    $minute=floor((strtotime($date1)-strtotime($date2))%86400/60);
    $str.= $minute."分 ";
     
    $second=floor((strtotime($date1)-strtotime($date2))%86400%60);
    $str.= $second."秒";

    echo $str;
}

function getJS(){
	echo "
<!-- load JS files -->
        <script src='assets/js/jquery-1.11.3.min.js'></script>             <!-- jQuery (https://jquery.com/download/) -->
        <script src='assets/js/popper.min.js'></script>                    <!-- https://popper.js.org/ -->       
        <script src='assets/js/bootstrap.min.js'></script>                 <!-- https://getbootstrap.com/ -->
        <script src='assets/js/datepicker.min.js'></script>                <!-- https://github.com/qodesmith/datepicker -->
        <script src='assets/js/jquery.singlePageNav.min.js'></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
        <script src='assets/slick/slick.min.js'></script>                  <!-- http://kenwheeler.github.io/slick/ -->
        <script>

            var center;

            

            function setCarousel() {
                
                if ($('.tm-article-carousel').hasClass('slick-initialized')) {
                    $('.tm-article-carousel').slick('destroy');
                } 

                if($(window).width() < 438){
                    // Slick carousel
                    $('.tm-article-carousel').slick({
                        infinite: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    });
                }
                else {
                 $('.tm-article-carousel').slick({
                        infinite: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    });   
                }
            }

            function setPageNav(){
                if($(window).width() > 991) {
                    $('#tm-top-bar').singlePageNav({
                        currentClass:'active',
                        offset: 79
                    });   
                }
                else {
                    $('#tm-top-bar').singlePageNav({
                        currentClass:'active',
                        offset: 65
                    });   
                }
            }

            function togglePlayPause() {
                vid = $('.tmVideo').get(0);

                if(vid.paused) {
                    vid.play();
                    $('.tm-btn-play').hide();
                    $('.tm-btn-pause').show();
                }
                else {
                    vid.pause();
                    $('.tm-btn-play').show();
                    $('.tm-btn-pause').hide();   
                }  
            }
       
            $(document).ready(function(){

                $(window).on('scroll', function() {
                    if($(window).scrollTop() > 100) {
                        $('.tm-top-bar').addClass('active');
                    } else {
                        //remove the background property so it comes transparent again (defined in your css)
                       $('.tm-top-bar').removeClass('active');
                    }
                });      
 

                // Date Picker
                const pickerCheckIn = datepicker('#inputCheckIn');
                const pickerCheckOut = datepicker('#inputCheckOut');
                
                // Slick carousel
                setCarousel();
                setPageNav();

                $(window).resize(function() {
                  setCarousel();
                  setPageNav();
                });

                // Close navbar after clicked
                $('.nav-link').click(function(){
                    $('#mainNav').removeClass('show');
                });

                

                // Update the current year in copyright
                $('.tm-current-year').text(new Date().getFullYear());                           
            });

        </script> 
        ";

}

?>