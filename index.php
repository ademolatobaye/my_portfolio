<?php
include("db_conn.php");
ini_set('display_errors', '1');
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="THEADEMOLADEV is the personal portfolio of Ademola Omomeji, a software engineer who builds modern, responsive, and business-ready web applications using HTML, CSS, JavaScript, PHP, MySQL, and Bootstrap.">
    <meta name="keywords" content="THEADEMOLADEV, Ademola Omomeji, Ademola portfolio, personal portfolio, software engineer nigeria, software developer nigeria, web developer nigeria, full-stack developer, full-stack engineer, frontend developer, backend developer, PHP developer, JavaScript developer, MySQL developer, Bootstrap developer, responsive web design, web application development, database driven applications, portfolio website, tech, developer, website development, software development, portfolio development, portfolio, personal portfolio development, admin dashboards, admin dashboard applications, website redesign.">
    <meta name="author" content="Ademola Omomeji, THEADEMOLADEV, THEADEMOLA">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#111111">
    <meta name="application-name" content="THEADEMOLADEV">
    <title>THEADEMOLADEV | Personal Portfolio</title>

    <link rel="icon" type="image/png" href="assets/img/blacknobg.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/blacknobg.png">
    <link rel="canonical" href="https://ademolathedev.name.ng/">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="THEADEMOLADEV">
    <meta property="og:url" content="https://ademolathedev.name.ng/">
    <meta property="og:title" content="THEADEMOLADEV | Personal Portfolio">
    <meta property="og:description" content="THEADEMOLADEV is the personal portfolio of Ademola Omomeji, a software engineer who builds modern, responsive, and business-ready web applications using HTML, CSS, JavaScript, PHP, MySQL, and Bootstrap.">
    <meta property="og:image" content="https://ademolathedev.name.ng/assets/img/white2bg.png">
    <meta property="og:image:alt" content="Ademola Omomeji portfolio preview">
    <meta property="og:locale" content="en_US">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://ademolathedev.name.ng/">
    <meta name="twitter:title" content="THEADEMOLADEV | Personal Portfolio">
    <meta name="twitter:description" content="THEADEMOLADEV is the personal portfolio of Ademola Omomeji, a software engineer who builds modern, responsive, and business-ready web applications using HTML, CSS, JavaScript, PHP, MySQL, and Bootstrap.">
    <meta name="twitter:image" content="https://ademolathedev.name.ng/assets/img/white2bg.png">
    <meta name="twitter:image:alt" content="Ademola Omomeji portfolio preview">

    <link rel="stylesheet" type="text/css" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendor/remixicon.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body id="Top">

    <!-- Loader -->
    <div class="bl-loader">
        <span>ADEMOLA OMOMEJI</span>
    </div>

    <!-- Header -->
    <div class="header sticky-nav">
        <div class="container">
            <div class="header-bar">
                <a href="#hero" class="brand-mark" data-cursor="hide">
                     <img src="assets/img/white2.png" alt="">
                    <span class="brand-copy">
                        <strong>ADEMOLA OMOMEJI</strong>
                        <small>Software Engineer</small>
                    </span>
                </a>

                <nav class="desktop-nav" aria-label="Primary navigation">
                    <a href="#hero">Home</a>
                    <a href="#about">About</a>
                    <a href="#project">Projects</a>
                    <a href="#service">Services</a>
                    <a href="#contact">Contact</a>
                </nav>

                <a href="#contact" class="header-cta">Let's Talk</a>

                <div class="toggle-btn mobile-toggle" data-cursor="hide" id="sp-main-menu-desk" aria-label="Open menu" role="button" tabindex="0">
                    <div class="hamburger">
                        <span class="line line-1"></span>
                        <span class="line line-2"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu">
            <div class="container">
                <div class="mobile-menu-panel">
                    <div class="menu-container bl-menu">
                        <div class="menu-item">
                            <a href="#hero"><span>01</span>Home</a>
                        </div>
                        <div class="menu-item">
                            <a href="#about"><span>02</span>About</a>
                        </div>
                        <div class="menu-item">
                            <a href="#project"><span>03</span>Projects</a>
                        </div>
                        <div class="menu-item">
                            <a href="#service"><span>04</span>Services</a>
                        </div>
                        <div class="menu-item">
                            <a href="#contact"><span>05</span>Contact</a>
                        </div>
                    </div>

                    <div class="bl-menu-detail">
                        <ul>
                            <li><b>Email</b> :&nbsp;&nbsp;<span>ademolaomomeji@gmail.com</span></li>
                            <li><b>Phone</b> :&nbsp;&nbsp;<span>+234 816 016 1379</span></li>
                            <li><b>Stack</b> :&nbsp;&nbsp;<span>HTML, CSS, PHP, JavaScript, Bootstrap, MySQL</span></li>
                            <li class="social">
                                <a href="javascript:void(0)"><i class="ri-linkedin-box-line"></i></a>
                                <a href="javascript:void(0)"><i class="ri-github-line"></i></a>
                                <a href="javascript:void(0)"><i class="ri-mail-line"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="wrapper">
        <div id="content">

            <!-- Hero -->
            <section class="bl-hero" id="hero">
                <span class="shape shape-1">
                    <img src="assets/img/shape/shape-1.png" alt="shape">
                </span>
                <span class="shape shape-2 bl-parallax">
                    <img src="assets/img/shape/shape-2.png" alt="shape">
                </span>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 p-0">
                            <div class="bl-hero-img" data-cursor-text="Ademola Omomeji">
                                <div class="hero-img constrain desktop">
                                    <div class="hero-image-cont">
                                        <img src="assets/img/profile.jpeg" alt="profile">
                                        <div class="anim-swipe"></div>
                                    </div>
                                    <div class="hero-image-cont">
                                        <img src="assets/img/profile.jpeg" alt="profile">
                                        <div class="anim-swipe"></div>
                                    </div>
                                    <div class="hero-image-cont">
                                        <img src="assets/img/profile.jpeg" alt="profile">
                                        <div class="anim-swipe"></div>
                                    </div>
                                    <div class="hero-image-cont">
                                        <img src="assets/img/profile.jpeg" alt="profile">
                                        <div class="anim-swipe"></div>
                                    </div>
                                    <div class="hero-image-cont">
                                        <img src="assets/img/profile.jpeg" alt="profile">
                                        <div class="anim-swipe"></div>
                                    </div>
                                    <div class="hero-image-cont">
                                        <img src="assets/img/profile.jpeg" alt="profile">
                                        <div class="anim-swipe"></div>
                                    </div>
                                </div>
                                <div class="hero-img constrain mobile"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="hero-details">
                                <div class="block">
                                    <h2 data-cursor="hide">Hi, I build polished web applications</h2>
                                    <h1 class="name" data-cursor="big">My name is  <br> Ademola <br>Omomeji</h1>
                                    <div class="designation">
                                        <h2 class="d-none">Designation</h2>
                                        <h3>Software Engineer</h3>
                                        <div class="split-text">
                                            <ul class="bl-slides">
                                                <li class="bl-slide">Full-Stack Engineer</li>
                                                <li class="bl-slide">Product-Focused Developer</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="hero-buttons">
                                        <a href="#project" class="bl-btn-1 bl-btn">
                                            <span class="bl-btn-spotlight"></span>
                                            <span class="bl-btn-wrapper">
                                                <span class="bl-btn-text">View Projects</span>
                                            </span>
                                        </a>
                                        <a href="#contact" class="bl-btn-2 bl-btn">
                                            <span class="bl-text">Hire Me <i class="ri-arrow-right-up-line"></i></span>
                                        </a>
                                    </div>
                                    <div class="hero-highlights">
                                        <span>Responsive UI</span>
                                        <span>Clean Backend Logic</span>
                                        <span>Database Driven Apps</span>
                                    </div>
                                </div>
                                <div>

                                    <div class="block">
                                        <div class="bl-here-txt">
                                            <p class="svg_bg"><span>I design and build modern, business-ready web applications that balance performance, clarity, and user experience. </span> <br>
                                                <span> With hands-on experience in PHP, JavaScript, MySQL, and Bootstrap, I create reliable systems and responsive interfaces that help teams ship confidently.</span>
                                            </p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Labels -->
            <section class="bl-label mb-80" data-cursor="hide">
                <h2 class="d-none">Services Label</h2>
                <ul class="label-auto">
                    <li>Website Development</li>
                    <li>Web Application Development</li>
                    <li>Database Architecture</li>
                </ul>
            </section>

            <!-- About -->
            <section class="bl-about ptb-80" id="about">
                <span class="shape shape-3 bl-parallax-2">
                    <img src="assets/img/shape/shape-3.png" alt="shape">
                </span>
                <span class="shape shape-4 bl-parallax-2">
                    <img src="assets/img/shape/shape-4.png" alt="shape">
                </span>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="about-detail">
                                <div class="title" data-cursor="big">
                                    <h2>About <span>Me</span></h2>
                                </div>
                                <div class="about-title" data-cursor="big">Software Engineer building practical digital products.</div>
                                <p class="info">I focus on building production-ready websites and applications that look sharp, load fast, and solve real business problems. My work spans frontend interfaces, backend workflows, and data management, with a strong emphasis on maintainable code and smooth user experiences.</p>                              
                            </div>
                        </div>
                      
                    </div>
                </div>
            </section>

            <!-- Skills -->
            <section class="bl-skills ptb-80">
                <span class="shape shape-5 bl-parallax-2">
                    <img src="assets/img/shape/shape-5.png" alt="shape">
                </span>
                <div class="container">
                    <div class="row mb--24">
                        <div class="col-lg-4 col-md-6">
                            <div class="skill-box">
                                <div class="skill-icon">
                                    <img src="assets/img/skill/html.svg" alt="HTML">
                                </div>
                                <div class="skill-detail">
                                    <h3>HTML5</h3>
                                    <span class="percent">90%</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="skill-box">
                                <div class="skill-icon">
                                    <img src="assets/img/skill/css-3.svg" alt="CSS">
                                </div>
                                <div class="skill-detail">
                                    <h3>CSS3</h3>
                                    <span class="percent">90%</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="skill-box">
                                <div class="skill-icon">
                                    <img src="assets/img/skill/php.svg" alt="PHP">
                                </div>
                                <div class="skill-detail">
                                    <h3>PHP</h3>
                                    <span class="percent">90%</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="skill-box">
                                <div class="skill-icon">
                                    <img src="assets/img/skill/javascript.svg" alt="JavaScript" class="skill-logo skill-logo-js">
                                </div>
                                <div class="skill-detail">
                                    <h3>JavaScript</h3>
                                    <span class="percent">80%</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="skill-box">
                                <div class="skill-icon">
                                    <img src="assets/img/skill/bootstrap.svg" alt="Bootstrap" class="skill-logo skill-logo-bootstrap">
                                </div>
                                <div class="skill-detail">
                                    <h3>Bootstrap</h3>
                                    <span class="percent">87%</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

                        <!-- Elfsight WhatsApp Chat | Untitled WhatsApp Chat -->
<script src="https://elfsightcdn.com/platform.js" async></script>
<div class="elfsight-app-1a6b1ae9-f44b-4cf9-bf26-e9ec21321d32" data-elfsight-app-lazy></div>
          
            <!-- Project -->
            <section class="bl-project mt-80 pt-80" id="project">
                <span class="shape shape-8 bl-parallax-2">
                    <img src="assets/img/shape/shape-8.png" alt="shape">
                </span>
                <span class="shape shape-9 bl-parallax-2">
                    <img src="assets/img/shape/shape-9.png" alt="shape">
                </span>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title centerd" data-cursor="big">
                                <h2>My <span>Projects</span></h2>
                                <p class="sub-title">Selected projects that show how I turn requirements into reliable products.</p>
                            </div>
                        </div>
                        <div class="col-lg-12 projects-content">
                            <div class="controls bl-projects-tabs">
                                <ul id="filters" class="clearfix">
                                    <li class="filter" data-filter="all">All</li>
                                </ul>
                            </div>
                            <div class="item-grid" id="MixItUp0ED680">
                                <div class="row mb--80 justify-content-center align-items-center">
                                    <div class="col-8 mb-80 item project-item-full web graphics applications"
                                        data-bound="" style="display: inline-block;">
                                        <div class="bl-project-card">
                                            <div class="project-image">
                                                <a href="assets/img/project/deemart.png" >
                                                    <div class="overlay-project-card"></div>
                                                    <img src="assets/img/project/deemart.png" alt="project-1">
                                                </a>
                                            </div>
                                            <div class="project-info">
                                                <span>Multipurpose e-Commerce Web Application</span>
                                                <h3><a href="https://pocketvest.com.ng/e-commerce/" data-cursor-text="View Live" target="_blank">Live Site</a></h3>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    
                                    <div class="col-8 mb-80 item project-item-full applications templates"
                                        data-bound="">
                                        <div class="bl-project-card">
                                            <div class="project-image">
                                                <a href="assets/img/project/celia.jpg">
                                                    <div class="overlay-project-card"></div>
                                                    <img src="assets/img/project/celia.jpg" alt="project-5">
                                                </a>
                                            </div>
                                            <div class="project-info">
                                                <span>Hotel Management Platform</span>
                                                <h3><a href="https://celiassuites.com" data-cursor-text="View Live" target="_blank">Live Site</a></h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-8 mb-80 item project-item-full applications templates"
                                        data-bound="">
                                        <div class="bl-project-card">
                                            <div class="project-image">
                                                <a href="assets/img/project/dalex.PNG">
                                                    <div class="overlay-project-card"></div>
                                                    <img src="assets/img/project/dalex.PNG" alt="project-5">
                                                </a>
                                            </div>
                                            <div class="project-info">
                                                <span>Corporate Website for Dalex Company Ltd</span>
                                                <h3><a href="https://dalexcompany.com" data-cursor-text="View Live" target="_blank">Live Site</a></h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-8 mb-80 item project-item-full applications templates"
                                        data-bound="">
                                        <div class="bl-project-card">
                                            <div class="project-image">
                                                <a href="assets/img/project/shoptianah.PNG">
                                                    <div class="overlay-project-card"></div>
                                                    <img src="assets/img/project/shoptianah.PNG" alt="project-5">
                                                </a>
                                            </div>
                                            <div class="project-info">
                                                <span>Business Website for ShopTianah</span>
                                                <h3><a href="https://wetindey.com.ng/ademola/shoptianah" data-cursor-text="View Live" target="_blank">Live Site</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Service -->
            <section class="bl-services mt-80 ptb-80" id="service">
                <div class="container">
                    <h4 class="d-none">Service</h4>
                    <div class="row mb--24">
                        <div class="col-lg-3 col-md-6 col-12 mb-24">
                            <div class="bl-service">
                                <div class="services-image">
                                    <div class="inner-image">
                                        <img src="assets/img/services/1.png" alt="services">
                                    </div>
                                </div>
                                <div class="services-info">
                                    <h5>Website Development</h5>
                                    <p>I design responsive, user-focused websites with a clear visual hierarchy, clean interaction patterns, and dependable performance.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-24">
                            <div class="bl-service">
                                <div class="services-image">
                                    <div class="inner-image">
                                        <img src="assets/img/services/2.png" alt="services">
                                    </div>
                                </div>
                                <div class="services-info">
                                    <h5>Web Application Development</h5>
                                    <p>I build landing pages, admin dashboards, and business applications that are structured for growth and easy to maintain.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-24">
                            <div class="bl-service">
                                <div class="services-image">
                                    <div class="inner-image">
                                        <img src="assets/img/services/3.png" alt="services">
                                    </div>
                                </div>
                                <div class="services-info">
                                    <h5>Database Management</h5>
                                    <p>I manage data with MySQL, including schema design, query optimization, migrations, and access control.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- Hire -->
            <section class="bl-hire mtb-80" id="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="bl-hire-banner sticky-box-3">
                                <div class="bl-hire-info">
                                    <h2 class="hire-title" data-cursor="big">Hire Me <span>Today</span></h2>
                                    <p>Whether it is a custom e-commerce platform, a financial web application, or a client-facing business site, I am open to collaborations that need thoughtful engineering and a polished finish.</p>
                                    <div class="inner-circle-items">
                                        <div class="bl-rounded-circle">
                                            <a href="#contact">
                                                <svg viewBox="0 0 100 100" width="100" height="100">
                                                    <defs>
                                                        <path id="circle"
                                                            d=" M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0">
                                                        </path>
                                                    </defs>
                                                    <text>
                                                        <textPath xlink:href="#circle">
                                                            Hire Me - Hire Me - Hire Me - Hire -
                                                        </textPath>
                                                    </text>
                                                </svg>
                                                <div class="inner-info">
                                                    <i class="ri-arrow-right-up-line"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="bl-contact-form">
                                <ul class="nav nav-tabs" role="tablist">
                                
                                   
                                    <li class="nav-item" role="presentation" data-cursor="hide">
                                        <button type="button" class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#contact_tab" role="tab" aria-controls="contact_tab"
                                            aria-selected="false">Contact</button>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="freelancer" role="tabpanel"
                                        aria-labelledby="freelancer-tab">
                                        <div class="col-12">
                                            <form class="row" method="post">

                                            <?php
                        $year = date("Y");
                        error_reporting(E_ALL);
                        if(isset($_REQUEST["submit"])){
                            $fullname =trim(addslashes($_REQUEST["fullname"]));
                            $email = trim(addslashes($_REQUEST["email"]));
                            $phone = trim(addslashes($_REQUEST["phone"]));
                            $message = trim(addslashes($_REQUEST["message"]));

// Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "mail.ademolathedev.name.ng";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "ssl";
//Port to connect smtp
	$mail->Port = "465";
//Set gmail username
	$mail->Username = "info@ademolathedev.name.ng";
//Set gmail password
	$mail->Password = "Omomejih08#";
//Email subject
	$mail->Subject = "New Message Notification";
//Set sender email
	$mail->setFrom('info@ademolathedev.name.ng', $fullname);
//Enable HTML
	$mail->isHTML(true);
//Attachment


//Email body
	$mail->Body = "<style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            font-family: 'Roboto', sans-serif !important;
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 24px;
            color: #8094ae;
            font-weight: 400;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
        }
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }
        a {
            text-decoration: none;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
    </style>

    <center style='width: 100%; background-color: #f5f6fa;'>
        <table width='100%' border='0' cellpadding='0' cellspacing='0' bgcolor='#f5f6fa'>
            <tr>
                <td style='padding: 40px 0;'>
                    <table style='width:100%;max-width:620px;margin:0 auto;'>
                        <tbody>
                            <tr>
                                <td style='text-align: center; padding-bottom:25px'>
                                    <a href='https://ademolathedev.name.ng'><img style='height: 60px' src='https://ademolathedev.name.ng/assets/img/white2bg.png' alt='logo'></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style='width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;'>
                        <tbody>
                            <tr>
                                <td style='padding: 30px 30px 15px 30px; text-align: center;'>
                                    <h2 style='font-size: 18px; color: #000; font-weight: 600; margin: 0;'>New Message Notification</h2>
                                </td>
                            </tr>
                            <tr>
                                <td style='padding: 0 30px 20px; text-align: center;'>
                                    <p style='margin-bottom: 10px;'>$message</p>
                                    <h1 style='font-size: 35px; color: #000; font-weight: 600; margin: 0;'></h1>
                                
                                </td>
                            </tr>
                           
                           
                        </tbody>
                    </table>
                    <table style='width:100%;max-width:620px;margin:0 auto;'>
                        <tbody>
                            <tr>
                                <td style='text-align: center; padding:25px 20px 0;'>
                                    <p style='font-size: 13px;'>Copyright © $year THEADEMOLADEV. All rights reserved. <br> </p>
                                    
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </center>";
//Add recipient
	$mail->addAddress("ademolaomomeji@gmail.com");
//Finally send email
	if ( $mail->send() ) {


                            echo"<script>alert('Dear $fullname, Thank you for contacting us. We will check your message and revert to you as soon as possible.')</script>";

                            }
                         else {
    echo "<script>alert('Mail error: " . $mail->ErrorInfo . "')</script>";
}
                        }

                        

                        ?>


                                                <div class="form-group col-lg-6">
                                                    <input type="text" name="fullname" placeholder="Input your fullname.">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <input type="email" name="email" placeholder="Input your email address.">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="phone" placeholder="Input your phone number.">
                                                </div>

                                                <div class="form-group">
                                                    <textarea name="message" placeholder="Input your message here."></textarea>
                                                </div>
                                                <div class="bl-review-buttons">
                                                    <button type="submit" class="bl-btn-3" data-cursor="hide" name="submit" onclick="return confirm('Are you sure to send message?')">Send message</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Footer -->
            <footer class="bl-footer-1 pt-80">
                <h3 class="d-none">Footer</h3>
                <div class="container">
                    <div class="row g-4 mt--24">
                        <div class="col-md-4">
                            <a href="index.php" class="logo-sec footer-brand-text">
                                 <!-- <img src="assets/img/favicon.png" alt=""> -->
                                <span class="brand-copy">
                                    <strong>ADEMOLA OMOMEJI</strong>
                                </span>
                            </a>
                           
                        </div>
                      
                        <div class="col-md-2">
                            <div class="footer-links">
                                <h4 class="footer-title">Navigate</h4>
                                <ul class="footer-content">
                                    <li><a href="#about">About</a></li>
                                    <li><a href="#project">Projects</a></li>
                                    <li><a href="#service">Services</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="footer-contact">
                                <h4 class="footer-title">Contact</h4>
                                <ul class="footer-content">
                                    <li><a href="tel:+2348160161379">+234 816 016 1379</a></li>
                                    <li><a href="mailto:ademolaomomeji@gmail.com">ademolaomomeji@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="logo-mark">
                        <div>
                            <h2>LET'S TALK</h2>
                        </div>
                        <div class="bl-btn">
                            <a href="#contact" class="btn btn-theme "><span>CONTACT NOW</span></a>
                        </div>
                    </div>
                </div>
                <div class="bl-copy">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="bl-footer-info">
                                    <p>&copy; <script>document.write(new Date().getFullYear())</script> <a href="index.php">THEADEMOLADEV</a>. All
                                        Rights
                                        Reserved.</p>
                                    <div class="logo-links">
                                        <a href="https://github.com/ademolatobaye" target="_blank">
                                            <i class="ri-github-line"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="ri-instagram-line"></i>
                                        </a>
                                        <a href="https://x.com/ademolaignat" target="_blank">
                                            <i class="ri-twitter-line"></i>
                                        </a>
                                        <a href="https://linkedin.com/in/ademola-omomeji-38a7aa230" target="_blank">
                                            <i class="ri-linkedin-line"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Tab to top -->
    <a href="#Top" class="back-to-top result-placeholder">
        <i class="ri-arrow-up-line"></i>
        <div class="back-to-top-wrap active-progress">
            <svg viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
            </svg>
        </div>
    </a>

    <!-- Library File  -->
    <script src="assets/js/vendor/jquery-4.0.0.min.js"></script>
    <script>
        // Patch camelCase
        jQuery.camelCase = function (str) {
            return str.replace(/-([a-z])/g, function (_, letter) {
                return letter.toUpperCase();
            });
        };

        // Patch type (basic version)
        jQuery.type = function (obj) {
            if (obj === null || obj === undefined) return obj + "";
            return typeof obj === "object" || typeof obj === "function"
                ? Object.prototype.toString.call(obj).slice(8, -1).toLowerCase()
                : typeof obj;
        };
    </script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendor/jquery.mixitup.min.js"></script>
    <script src="assets/js/vendor/gsap.min.js"></script>
    <script src="assets/js/vendor/ScrollTrigger.min.js"></script>
    <script src="assets/js/vendor/SplitText.min.js"></script>
    <script src="assets/js/vendor/infiniteslidev2.js"></script>

    <!-- Main JS File  -->
<script src="assets/js/gsap-custom.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/demo-1.js"></script>
</body>

</html>
