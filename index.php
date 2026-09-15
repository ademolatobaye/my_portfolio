<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
ini_set('display_errors', '0');
error_reporting(0);

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mailConfig = file_exists(__DIR__ . '/config/mail.php') ? require __DIR__ . '/config/mail.php' : [];

if (isset($_POST['submit'])) {
    // 1. Honeypot check for spam bots
    if (!empty($_POST['website'])) {
        $_SESSION['sent_status'] = 'success';
        header("Location: index.php#contact");
        exit;
    }

    $fullname = isset($_POST['fullname']) ? trim(strip_tags($_POST['fullname'])) : '';
    $email    = isset($_POST['email']) ? trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) : '';
    $phone    = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : '';
    $message  = isset($_POST['message']) ? trim(strip_tags($_POST['message'])) : '';

    // 2. Input Validation
    if (empty($fullname) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['sent_status'] = 'invalid';
        header("Location: index.php#contact");
        exit;
    }

    // 3. Setup PHPMailer
    $mail = new PHPMailer();
    try {
        $mail->isSMTP();
        $mail->Host       = $mailConfig['host'] ?? 'mail.pocketvest.com.ng';
        $mail->SMTPAuth   = $mailConfig['auth'] ?? true;
        $mail->SMTPSecure = $mailConfig['secure'] ?? 'ssl';
        $mail->Port       = $mailConfig['port'] ?? 465;
        $mail->Username   = $mailConfig['username'] ?? '';
        $mail->Password   = $mailConfig['password'] ?? '';
        $mail->Subject    = "New Message Notification from Portfolio";
        $mail->setFrom($mailConfig['from_email'] ?? 'pocketve@pocketvest.com.ng', $fullname);
        $mail->addReplyTo($email, $fullname);
        $mail->addAddress($mailConfig['recipient'] ?? 'ademolaomomeji@gmail.com');
        $mail->isHTML(true);

        $year = date("Y");
        // Safe HTML body including Full Name, Email, Phone, and Message
        $mail->Body = "
        <div style='font-family: Arial, sans-serif; background-color: #f5f6fa; padding: 30px;'>
            <div style='max-width: 600px; margin: 0 auto; background: #ffffff; padding: 25px; border-radius: 8px;'>
                <h2 style='color: #111; border-bottom: 2px solid #eee; padding-bottom: 10px;'>New Contact Form Submission</h2>
                <p><strong>Name:</strong> " . htmlspecialchars($fullname) . "</p>
                <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
                <p><strong>Phone:</strong> " . htmlspecialchars($phone) . "</p>
                <p><strong>Message:</strong></p>
                <div style='background: #f8f9fa; padding: 15px; border-radius: 6px; color: #333;'>
                    " . nl2br(htmlspecialchars($message)) . "
                </div>
                <hr style='border: none; border-top: 1px solid #eee; margin-top: 20px;'>
                <p style='font-size: 12px; color: #888;'>Sent via Ademola Omomeji Portfolio Contact Form &copy; {$year}</p>
            </div>
        </div>";

        if ($mail->send()) {
            $_SESSION['sent_status'] = 'success';
            header("Location: index.php#contact");
            exit;
        } else {
            error_log("Mail sending failed: " . $mail->ErrorInfo);
            $_SESSION['sent_status'] = 'error';
            header("Location: index.php#contact");
            exit;
        }
    } catch (Exception $e) {
        error_log("Mail exception: " . $e->getMessage());
        $_SESSION['sent_status'] = 'error';
        header("Location: index.php#contact");
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="THEADEMOLADEV is the personal portfolio of Ademola Omomeji, a software developer who builds modern, responsive, and business-ready web applications using HTML, CSS, JavaScript, PHP, Laravel, MySQL, and Bootstrap.">
    <meta name="keywords" content="THEADEMOLADEV, Ademola Omomeji, Ademola portfolio, personal portfolio, software developer nigeria, web developer nigeria, fullstack developer, frontend developer, backend developer, PHP developer, JavaScript developer, MySQL developer, Bootstrap developer, responsive web design, web application development, database driven applications, portfolio website, tech, developer, website development, software development, admin dashboards, admin dashboard applications, website redesign.">
    <meta name="author" content="Ademola Omomeji, THEADEMOLADEV, THEADEMOLA">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#111111">
    <meta name="application-name" content="THEADEMOLADEV">
    <title>Ademola Omomeji | Software Developer</title>

    <link rel="icon" type="image/png" href="assets/img/blacknobg.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/blacknobg.png">
    <link rel="canonical" href="https://ademolathedev.name.ng/">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="THEADEMOLADEV">
    <meta property="og:url" content="https://ademolathedev.name.ng/">
    <meta property="og:title" content="Ademola Omomeji | Software Developer">
    <meta property="og:description" content="THEADEMOLADEV is the personal portfolio of Ademola Omomeji, a software developer who builds modern, responsive, and business-ready web applications using HTML, CSS, JavaScript, PHP, MySQL, and Bootstrap.">
    <meta property="og:image" content="https://ademolathedev.name.ng/assets/img/white2bg.png">
    <meta property="og:image:alt" content="Ademola Omomeji portfolio preview">
    <meta property="og:locale" content="en_US">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://ademolathedev.name.ng/">
    <meta name="twitter:title" content="Ademola Omomeji | Software Developer">
    <meta name="twitter:description" content="THEADEMOLADEV is the personal portfolio of Ademola Omomeji, a software developer who builds modern, responsive, and business-ready web applications using HTML, CSS, JavaScript, PHP, MySQL, and Bootstrap.">
    <meta name="twitter:image" content="https://ademolathedev.name.ng/assets/img/white2bg.png">
    <meta name="twitter:image:alt" content="Ademola Omomeji portfolio preview">

    <link rel="stylesheet" type="text/css" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendor/remixicon.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body id="Top">

    <!-- Loader -->
    <!--<div class="bl-loader">-->
    <!--    <span>ADEMOLA OMOMEJI</span>-->
    <!--</div>-->

    <!-- Header -->
    <div class="header sticky-nav">
        <div class="container">
            <div class="header-bar">
                <a href="#hero" class="brand-mark" data-cursor="hide">
                     <img src="assets/img/white2.png" alt="">
                    <span class="brand-copy">
                        <strong>ADEMOLA OMOMEJI</strong>
                        <small>Software Developer</small>
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
                            <li><b>Stack</b> :&nbsp;&nbsp;<span>HTML, CSS, PHP, Laravel, JavaScript, Bootstrap, MySQL</span></li>
                            <li class="social">
                                <a href="https://linkedin.com/in/ademola-omomeji-38a7aa230" target="_blank"><i class="ri-linkedin-box-line"></i></a>
                                <a href="https://github.com/ademolatobaye" target="_blank"><i class="ri-github-line"></i></a>
                                <a href="mailto:ademolaomomeji@gmail.com"><i class="ri-mail-line"></i></a>
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
                                        <h3>Software Developer</h3>
                                        <div class="split-text">
                                            <ul class="bl-slides">
                                                <li class="bl-slide">FullStack Developer</li>
                                                <li class="bl-slide">Software Developer</li>
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
                                            <p class="svg_bg"><span>I design and build modern, business ready web applications that balance performance, clarity, and user experience. </span> <br>
                                                <span> With experience in PHP, Laravel, JavaScript, MySQL, and Bootstrap, I create reliable systems and responsive interfaces that help teams ship confidently.</span>
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
                                <div class="about-title" data-cursor="big">Software Developer building practical digital products.</div>
                                <p class="info">I'm a Software Developer experienced in building full business systems, including a CRM with three role based dashboards (Admin, Manager, Cashier), a multi vendor ecommerce platform, and a hotel booking system.
                                     I work across the stack with PHP, Laravel, JavaScript, and MySQL, with a focus on clean, maintainable code. I also teach web development at Wetin Dey Code Academy.</p>                              
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
                                    <img src="assets/img/skill/php.svg" alt="PHP">
                                </div>
                                <div class="skill-detail">
                                    <h3>PHP</h3>
                                    <!--<span class="percent">90%</span>-->
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="skill-box">
                                <div class="skill-icon">
                                    <img src="assets/img/skill/Laravel.png" alt="Laravel">
                                </div>
                                <div class="skill-detail">
                                    <h3>Laravel</h3>
                                    <!--<span class="percent">90%</span>-->
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
                                    <!--<span class="percent">80%</span>-->
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
                                    <!--<span class="percent">87%</span>-->
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="skill-box">
                                <div class="skill-icon">
                                    <img src="assets/img/skill/MySQL.svg" alt="MySQL" class="skill-logo skill-logo-bootstrap">
                                </div>
                                <div class="skill-detail">
                                    <h3>MySQL</h3>
                                    <!--<span class="percent">87%</span>-->
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="skill-box">
                                <div class="skill-icon">
                                    <img src="assets/img/skill/html.svg" alt="HTML">
                                </div>
                                <div class="skill-detail">
                                    <h3>HTML5</h3>
                                    <!--<span class="percent">90%</span>-->
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
                                    <!--<span class="percent">90%</span>-->
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

                                    <div class="col-12 col-md-10 col-lg-8 mb-80 item project-item-full web graphics applications"
                                        data-bound="" style="display: inline-block;">
                                        <div class="bl-project-card">
                                            <div class="project-image">
                                                <a href="assets/img/project/samtopdash.PNG" target="_blank">
                                                    <div class="overlay-project-card"></div>
                                                    <img src="assets/img/project/samtopdash.PNG" alt="Business CRM System">
                                                </a>
                                            </div>
                                            <div class="project-info">
                                                <h3 class="project-name">Business CRM System</h3>
                                                <p class="project-stack">PHP · Laravel · MySQL · JavaScript · Bootstrap · HTML5 · CSS3</p>
                                                <div class="project-action">
                                                    <span class="project-btn disabled-btn"><i class="ri-information-line me-1"></i> Demo available on request</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-10 col-lg-8 mb-80 item project-item-full web graphics applications"
                                        data-bound="" style="display: inline-block;">
                                        <div class="bl-project-card">
                                            <div class="project-image">
                                                <a href="https://ademolathedev.name.ng/e-commerce/" target="_blank">
                                                    <div class="overlay-project-card"></div>
                                                    <img src="assets/img/project/ademoladev.PNG" alt="Multipurpose eCommerce Web Application">
                                                </a>
                                            </div>
                                            <div class="project-info">
                                                <h3 class="project-name">Multipurpose eCommerce Web Application</h3>
                                                <p class="project-stack">PHP · MySQL · JavaScript · Bootstrap · HTML5 · CSS3</p>
                                                <div class="project-action">
                                                    <a href="https://ademolathedev.name.ng/e-commerce/" class="project-btn" data-cursor-text="View Live" target="_blank">Live Site <i class="ri-arrow-right-up-line"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-10 col-lg-8 mb-80 item project-item-full applications templates"
                                        data-bound="">
                                        <div class="bl-project-card">
                                            <div class="project-image">
                                                <a href="https://celiassuites.com" target="_blank">
                                                    <div class="overlay-project-card"></div>
                                                    <img src="assets/img/project/celia.jpg" alt="Hotel Management Platform">
                                                </a>
                                            </div>
                                            <div class="project-info">
                                                <h3 class="project-name">Hotel Management Platform</h3>
                                                <p class="project-stack">PHP · HTML5 · CSS3 · MySQL · JavaScript · Bootstrap</p>
                                                <div class="project-action">
                                                    <a href="https://celiassuites.com" class="project-btn" data-cursor-text="View Live" target="_blank">Live Site <i class="ri-arrow-right-up-line"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-10 col-lg-8 mb-80 item project-item-full applications templates"
                                        data-bound="">
                                        <div class="bl-project-card">
                                            <div class="project-image">
                                                <a href="https://dalexcompany.com" target="_blank">
                                                    <div class="overlay-project-card"></div>
                                                    <img src="assets/img/project/dalex.PNG" alt="Corporate Website for Dalex Company Ltd">
                                                </a>
                                            </div>
                                            <div class="project-info">
                                                <h3 class="project-name">Corporate Website for Dalex Company Ltd</h3>
                                                <p class="project-stack">PHP · HTML5 · CSS3 · JavaScript · Bootstrap</p>
                                                <div class="project-action">
                                                    <a href="https://dalexcompany.com" class="project-btn" data-cursor-text="View Live" target="_blank">Live Site <i class="ri-arrow-right-up-line"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-10 col-lg-8 mb-80 item project-item-full applications templates"
                                        data-bound="">
                                        <div class="bl-project-card">
                                            <div class="project-image">
                                                <a href="https://wetindey.com.ng/ademola/shoptianah" target="_blank">
                                                    <div class="overlay-project-card"></div>
                                                    <img src="assets/img/project/shoptianah.PNG" alt="Business Website for ShopTianah">
                                                </a>
                                            </div>
                                            <div class="project-info">
                                                <h3 class="project-name">Business Website for ShopTianah</h3>
                                                <p class="project-stack">HTML5 · CSS3 · JavaScript · Bootstrap</p>
                                                <div class="project-action">
                                                    <a href="https://wetindey.com.ng/ademola/shoptianah" class="project-btn" data-cursor-text="View Live" target="_blank">Live Site <i class="ri-arrow-right-up-line"></i></a>
                                                </div>
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
                                    <p>I design responsive, user focused websites with a clear visual hierarchy, clean interaction patterns, and dependable performance.</p>
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
                                    <p>Whether it is a custom eCommerce platform, a web application, or a business site, I am open to collaborations that need thoughtful development and a polished finish.</p>
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
                                        <button type="button" class="nav-link active" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#contact_tab" role="tab" aria-controls="contact_tab"
                                            aria-selected="true">Contact</button>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="contact_tab" role="tabpanel"
                                        aria-labelledby="contact-tab">
                                        <div class="col-12">
                                            <form class="row" method="post" action="#contact">
                                                <!-- Honeypot field for bot spam prevention -->
                                                <input type="text" name="website" style="display:none !important;" tabindex="-1" autocomplete="off">

                                                <?php 
                                                $sentStatus = $_SESSION['sent_status'] ?? $_GET['sent'] ?? null;
                                                if (isset($_SESSION['sent_status'])) {
                                                    unset($_SESSION['sent_status']);
                                                }
                                                ?>
                                                <?php if ($sentStatus): ?>
                                                    <?php if ($sentStatus === 'success'): ?>
                                                        <div class="col-12 mb-4">
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: rgba(16, 185, 129, 0.15); border: 1px solid #10b981; color: #10b981; border-radius: 12px; padding: 16px 20px; font-size: 15px;">
                                                                <i class="ri-checkbox-circle-fill me-2"></i> <strong>Success!</strong> Your message has been received, thank you for reaching out.
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                        </div>
                                                    <?php elseif ($sentStatus === 'invalid'): ?>
                                                        <div class="col-12 mb-4">
                                                            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="background-color: rgba(245, 158, 11, 0.15); border: 1px solid #f59e0b; color: #f59e0b; border-radius: 12px; padding: 16px 20px; font-size: 15px;">
                                                                <i class="ri-alert-fill me-2"></i> <strong>Validation Error:</strong> Please fill in all required fields with a valid email address.
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                        </div>
                                                    <?php elseif ($sentStatus === 'error'): ?>
                                                        <div class="col-12 mb-4">
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color: rgba(239, 68, 68, 0.15); border: 1px solid #ef4444; color: #ef4444; border-radius: 12px; padding: 16px 20px; font-size: 15px;">
                                                                <i class="ri-error-warning-fill me-2"></i> <strong>Error:</strong> Unable to send message right now. Please try again later or reach out directly via phone/email.
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <script>
                                                        if (window.history.replaceState && window.location.search.includes('sent=')) {
                                                            const cleanUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + window.location.hash;
                                                            window.history.replaceState({ path: cleanUrl }, '', cleanUrl);
                                                        }
                                                    </script>
                                                <?php endif; ?>

                                                <div class="form-group col-lg-6">
                                                    <input type="text" name="fullname" placeholder="Input your fullname." required>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <input type="email" name="email" placeholder="Input your email address." required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="phone" placeholder="Input your phone number.">
                                                </div>

                                                <div class="form-group">
                                                    <textarea name="message" placeholder="Input your message here." required></textarea>
                                                </div>
                                                <div class="bl-review-buttons">
                                                    <button type="submit" class="bl-btn-3" data-cursor="hide" name="submit">Send message</button>
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
                                <span class="brand-copy">
                                    <strong>ADEMOLA OMOMEJI</strong>
                                </span>
                            </a>
                            <p class="mt-3 text-muted" style="font-size: 14px; max-width: 320px; line-height: 1.6; color: #a0a0a0 !important;">Building practical, reliable web applications, business CRMs, and e-commerce systems.</p>
                            <div class="footer-social-bar d-flex align-items-center gap-2 mt-3 mb-3">
                                <a href="https://github.com/ademolatobaye" target="_blank" class="footer-social-btn" title="GitHub" aria-label="GitHub">
                                    <i class="ri-github-line"></i>
                                </a>
                                <a href="https://linkedin.com/in/ademola-omomeji-38a7aa230" target="_blank" class="footer-social-btn" title="LinkedIn" aria-label="LinkedIn">
                                    <i class="ri-linkedin-box-line"></i>
                                </a>
                                <a href="https://x.com/theademoladev" target="_blank" class="footer-social-btn" title="Twitter/X" aria-label="Twitter/X">
                                    <i class="ri-twitter-line"></i>
                                </a>
                                <a href="mailto:ademolaomomeji@gmail.com" class="footer-social-btn" title="Email" aria-label="Email">
                                    <i class="ri-mail-line"></i>
                                </a>
                            </div>
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
                                        <a href="https://github.com/ademolatobaye" target="_blank" title="GitHub" aria-label="GitHub">
                                            <i class="ri-github-line"></i>
                                        </a>
                                        <a href="https://linkedin.com/in/ademola-omomeji-38a7aa230" target="_blank" title="LinkedIn" aria-label="LinkedIn">
                                            <i class="ri-linkedin-line"></i>
                                        </a>
                                        <a href="https://x.com/ademolaignat" target="_blank" title="Twitter/X" aria-label="Twitter/X">
                                            <i class="ri-twitter-line"></i>
                                        </a>
                                        <a href="mailto:ademolaomomeji@gmail.com" title="Email" aria-label="Email">
                                            <i class="ri-mail-line"></i>
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
