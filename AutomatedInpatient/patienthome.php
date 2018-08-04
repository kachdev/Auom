<?php

    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Automated</title>
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/patientstyle.css">
</head>
<body>
    <div class="backdrop"></div>
    <header id="big-header">
        <div class="logo">
                Automy
        </div>
        <div class="header-top">
            <li><a href="/Automated/index.html">Home</a></li>
            <!-- <li><a href="#register">Register</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#contact">Contact Us</a></li> -->
            <!-- <li><a href = "register.html">Register</a></li> -->
        </div>
        <div class="headerbtn">
            <a href="patientregister.php">Register</a>
            <a href="patientlogin.php">Login</a>
        </div>
    </header>
    <div class="main-header">
        <h1>The Patient</h1><br>
            <p>...An Automated System for Patient Record Management</p><br>
        <a href="#register">Get Started</a>    
    </div>

    <section class="services" id="services">
        <div class="serviceheader">
                <h2>Our Services</h2>
        </div>
        <div class="serviceflex">
            <div class="service-list">
                <div class="list" style="position:relative; height:374.688px" >
                    <div class="listrow" style="position:absolute; left:0%; top:0px;">
                        <div class="listimg" data-wow-duration=".3" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
                            <img class="img-responsive"src="image/12.jpg" width="273px" height="375px" alt="">
                        </div>
                    </div>
                    <div class="listrow2" style="position: absolute; left: 70.9115%; top: 0px;">
                        <div class="listimg" data-wow-duration=".3" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInRight;">
                            <img class="img-responsive"  src="image/10.jpg" width="273" height="182" alt="">
                        </div>
                    </div>
                    <div class="listrow3" style="position: absolute; left: 70.9115%; top: 191px;">
                        <div class="listimg" data-wow-duration=".3" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight;">
                            <img class="img-responsive" src="image/11.jpg" width="273" height="182" alt="">
                        </div>
                    </div>   
                </div>
            </div>
                
            <div class="service-list2">
                
                <h1>We Specialize In</h1>
                <p>With more than 40 years of experience in healthcare consulting, we <br>
                    deliver results to help grow your practice. Our comprehensive medical <br>
                    billing services allow you to do what you do best—run your practice.
                </p>
                <div class="servicelist2innercontent">
                    <div class="serviceflexbox">
                        <div class="serviceflexrow1">
                            <div class="serviceflexrow1-inner">
                                <i class="fa fa-check"></i>
                                <li>Surgery</li>
                            </div>
                            <div class="serviceflexrow1-inner">
                                <i class="fa fa-check"></i>
                                <li>Cardiology</li>
                            </div>   
                            <div class="serviceflexrow1-inner">
                                <i class="fa fa-check"></i>
                                <li>Ophthalmology</li>
                            </div>    
                            <div class="serviceflexrow1-inner">
                                <i class="fa fa-check"></i>
                                <li>Gynaecological</li>
                            </div>    
                        </div>
                            <div class="serviceflexrow2">
                                <div class="serviceflexrow2-inner">
                                    <i class="fa fa-check"></i>
                                    <li>Outpatient</li>
                                </div>
                                <div class="serviceflexrow2-inner">
                                    <i class="fa fa-check"></i>
                                    <li>Rehabilitation</li>
                                </div>
                                <div class="serviceflexrow2-inner">
                                    <i class="fa fa-check"></i>
                                    <li>Laryngological</li>
                                </div>
                                <div class="serviceflexrow2-inner">
                                    <i class="fa fa-check"></i>
                                    <li>Pediatric</li>
                                </div>
                                
                            </div>
                            <div class="serviceflexrow3">
                                <div class="serviceflexrow3-inner">
                                    <i class="fa fa-check"></i>
                                    <li>Pediatric</li>
                                </div>
                                <div class="serviceflexrow3-inner">
                                    <i class="fa fa-check"></i>
                                    <li>Rehabilitation</li>
                                </div>
                                <div class="serviceflexrow3-inner">
                                    <i class="fa fa-check"></i>
                                    <li>Surgery</li>
                                </div>
                                <div class="serviceflexrow3-inner">
                                    <i class="fa fa-check"></i>
                                    <li>Ophthalmology</li>
                                </div>
                                
                            </div>
                    </div>  
                </div>
            </div>
        </div>
    </section>
    <div class="processdrop"></div>
    <section class="process">
        <div class="processheader">
            <h3>Process</h3>
            <h1>How It Works</h1>
        </div>
        <div class="processwrapper">
            <!-- FIRST PROCESS LIST -->
            <li class="processlist">
                
                <div class="processimg">
                    <span>01</span>
                </div>
                <div class="processnote">
                    <h3>Make An Appointment</h3>
                    <p>Clinics can be privately operated or <br> publicly managed.</p>
                </div>
            </li>
            <!-- SECOND PROCESS LIST -->
            <li class="processlist">
                
                <div class="processimg">
                    <span>02</span>
                </div>
                <div class="processnote">
                    <h3>Primary Diagnostics</h3>
                    <p>Clinics can be privately operated or <br> publicly managed.</p>
                </div>
            </li>
            <!-- THIRD PROCESS LIST -->
            <li class="processlist">
                <div class="processimg">
                    <span>03</span>
                </div>
                <div class="processnote">
                    <h3>Daily Course</h3>
                    <p>Clinics can be privately operated or <br> publicly managed.</p>
                </div>
            </li>  
            
            <!-- FOURTH PROCESS LIST -->
            <li class="processlist">
                <div class="processimg">
                    <span>04</span>
                </div>
                <div class="processnote">
                    <h3>Be Healthy</h3>
                    <p>Clinics can be privately operated or <br> publicly managed.</p>
                </div>
            </div>
        </li>

        <div class="processbtn">
            <a href="">MAKE AN APPOINTMENT</a>
        </div>
    </section>
    
    <section class="about" id="about">
        <h1>Professional Specialists</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit necessitatibus, quaerat repellendus culpa deleniti possimus 
                fuga,<br> libero quis hic quia iure voluptatem deserunt natus odio sunt eligendi, nobis voluptatibus wrwqiuroqiuhh  iinknx<br>kxjieoi oiweriweonvr bppoj despacito officiwoqiis!</p>

        <div class="about-list">
            <div class="people">
                <div class="peopleImg">
                    <img src="image/03.jpg" >
                </div>
                <div class="peopleImgdetails">
                        <h4>Dr. Chibuike</h4>
                        <p>Doctor</p>
                    </div>
                
            </div>

            <div class="people">
                <div class="peopleImg">
                    <img src="image/04.jpg" >
                </div>
                <div class="peopleImgdetails">
                    <h4>Mrs Ngozi</h4>
                    <p>Asst. Doctor</p>
                </div>
                
            </div>
            
            <div class="people">
                <div class="peopleImg">
                    <img src="image/05.jpg" >
                </div>
                <div class="peopleImgdetails">
                    <h4>Mr Nnamdi</h4>
                    <p>Nurse</p>
                </div>
                
            </div>

            <div class="people">
                <div class="peopleImg">
                    <img src="image/06.jpg" >
                </div>
                <div class="peopleImgdetails">
                    <h4>Mrs Chioma</h4>
                    <p>Pharmacist</p>
                </div>
                
            </div>
        </div>        
    </section>
    
    <section class="recover">
        <div class="recoverheader">
            <h2>The Fastest Way To Recover</h2>
        </div>
        <div class="recoverbtn">
            <a href="">Learn More</a>
        </div>
    </section>

    <section class="contact" id="contact"> <br> <br>
        <h1>Contact Us</h1>
                <br><br>
            <div class="contact-content">
                <form class="formcontent" method="" action="">
                    <h2>Make An Appointment</h2>
                    <div class="contactformrow1">
                        <input type="text" name="name" placeholder="FULL NAME">
                        <input type="text" name="phoneno" placeholder="PHONE NUMBER">
                    </div>
                    <div class="contactformrow2">   
                        <input type="text" name="" placeholder="DEPARTMENT">
                        <input type="text" name="" placeholder="DOCTOR">
                        <input type="text" name="" placeholder="DD/MM/YY">
                    </div>
                    
                    <textarea name="message" rows="3" cols="42" placeholder="WHAT AILS YOU?" style="margin-right: 31%;"></textarea>
                    <div class="contact-submitbtn">
                        <input type="submit" value="SUBMIT">
                    </div>
                    
                </form>
                <div class="contact-list">
                        <h2>You can reach us</h2>
                    <div class="contact-list-inner">
                        <p><i class="fa fa-map-marker"></i> 123 Thamine Street, Digital Estate, Yangon 10620, Myanmar </p>
                        <p><i class="fa fa-mobile-phone"></i>   07010178416</p>
                        <p><i class="fa fa-globe"></i>  www.automy.com</p>
                        <p><i class="fa fa-envelope"></i>   automy@gmail.com</p>
                        <a href=""><i class="fa fa-facebook-f" id="facebook"></i></a>
                        <a href=""><i class="fa fa-twitter" id="twitter"></i></a>
                        <a href=""><i class="fa fa-google-plus-circle" id="google"></i></a>
                        <a href=""><i class="fa fa-instagram" id="instagram"></i></a>
                        <a href=""><i class="fa fa-whatsapp" id="whatsapp"></i></a>
                        <a href=""><i class="fa fa-youtube-play" id="youtube"></i></a>
                    </div>
                </div>
            </div>    
    </section>
    
    

    <footer class="bottom">
        <div class="bottominfos">
            <div class="bottomnavbar1">
                <li><a href="index.html">Home</a></li>
                <li><a href="#register">Register</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#contact">Contact Us</a></li>
            </div>
                
            <div class="bottomnavbar2">
                <li><a href="">Twitter</a></li>
                <li><a href="">Facebook</a></li>
                <li><a href="">Instagram</a></li>
                <li><a href="">Youtube</a></li>
            </div>
        
            <div class="bottomnavbar3">
                <li><a href="">Subscribe to Our Newslater</a></li>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="">Terms & Conditions</a></li>
            </div>
        
            <div class="bottomnavbar4">
                <h3>Automy</h3>
                <p>We are a creative studio focusing on culture, luxury, <br> editorial & art. Somewhere between sophistication and <br> simplicity.</p>
            </div>
        </div>
        <div class="lastbottom">
            <div class="footerlogo">
                Automy
            </div>
            <p>Copyright &copy; 2017 Automy</p>
        </div>
        
        <!-- <div class="directionbtn">
            <a href="#big-header"><i class="fa fa-arrow-circle-o-up"></i></a>
        </div> -->
    </footer>
</body>
</html>