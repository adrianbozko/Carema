<!DOCTYPE html>
<html lang="pl">

<head>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
          dataLayer.push(arguments);
      }
      gtag("consent", "default", {
          ad_storage: "denied",
          analytics_storage: "denied",
          functionality_storage: "denied",
          personalization_storage: "denied",
          security_storage: "granted",
          wait_for_update: 2000,
      });
      gtag("set", "ads_data_redaction", true);
      gtag("set", "url_passthrough", true);
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-NXCJ8LCT');</script>
    <!-- End Google Tag Manager -->
    <!-- Start cookieyes banner -->
    <script id="cookieyes" type="text/javascript" src="https://cdn-cookieyes.com/client_data/8e79603592b81e15b63d3d8c/script.js"></script>
    <!-- End cookieyes banner -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dziękujemy! - CAREMA | Szukasz pracy w Niemczech? Już znalazłaś!</title>
    <meta name="description" content="Dołącz do nas i zostań Opiekunką seniorów! Legalna praca, pełne wsparcie, prosta rekrutacja i wysokie zarobki. Sprawdź sama!">
    <meta name="keywords" content="Praca w opiece, Praca w opiece w Niemczach, Praca w opiece Niemcy, Opieka nad seniorami Niemcy, Opiekunka seniorów, Opiekunka seniorów w Niemczech, Praca w Niemczech, Praca jako opiekunka, Opieka nad seniorami, Opiekunka osób starszych, Opiekunka osób starszych praca Niemcy, Opiekunka oferty pracy Niemcy, Praca dla opiekunek w Niemczech"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-touch-icon.png?v=1">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png?v=1">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png?v=1">
    <link rel="manifest" href="favicon/site.webmanifest?v=1">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg?v=1" color="#5bbad5">
    <link rel="shortcut icon" href="favicon/favicon.ico?v=1">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="favicon/browserconfig.xml?v=1">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXCJ8LCT"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php

    use PHPMailer\PHPMailer\PHPMailer;

    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';
    $msg = '';
    if (array_key_exists('phone_popup', $_POST)) {
        date_default_timezone_set("Europe/Warsaw");
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'mx.medipe.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'starttls';
        $mail->Username = 'praca@carema.pl';
        $mail->Password = '';
        $mail->setFrom('praca@carema.pl', 'Carema.pl - Formularz zgłoszeniowy');
        $mail->CharSet = PHPMailer::CHARSET_UTF8;
        $sendToMail = 'praca@carema.pl';
        $sendToMail2 = 'adrian.bozko@outlook.com';
        $name = $_POST['name_popup'];
        $surname = $_POST['surname_popup'];
        $nameSurname = $name . ' ' . $surname;
        $mail->addAddress($sendToMail);
        $mail->addBCC($sendToMail2);
        $mail->addReplyTo('praca@carema.pl', 'Formularz');
        $mail->Subject = 'Formularz zgłoszeniowy Carema.pl - ' . date("d.m.Y, H:i");
        $mail->isHTML(false);
        $mail->Body = <<<EOT
Imię: {$name}
Nazwisko: {$surname}
Numer telefonu: {$_POST['phone_popup']}
Znajomość języka niemieckiego: {$_POST['language_level_popup']}
Doświadczenie w opiece: {$_POST['experienceRange_popup']}


Ta wiadomość została wysłana przez formularz zgłoszeniowy na stronie Carema (https://carema.pl/).
EOT;
        if (!$mail->send()) {
            $msg = 'BŁĄD — Twój formularz nie został do nas wysłany. Wypełnij go ponownie lub zadzwoń bezpośrednio pod numer 735 995 060.';
        } else {
            $msg = "$name, dziękujemy\r\nza zgłoszenie!";
            $msg2 = "Już bierzemy się za szukanie zlecenia w sam raz dla Ciebie.\r\nZadzwonimy do Ciebie w ciągu dwóch dni roboczych. 😊";
            $msg3 = "Miłego dnia i do usłyszenia!";
        }
    } else {
        $msg = 'BŁĄD — Twój numer telefonu nie został poprawnie wprowadzony. Wypełnij formularz ponownie lub zadzwoń bezpośrednio pod numer 735 995 060.';
    }
    ?>

    <div class="container display-only-pc-1">
        <div class="row clearfix align-items-center">
            <div class="col-md-2">
                <div class="logo">
                    <a href="https://carema.pl/"><img src="images/mainlogo.png" alt="CAREMA" class="img-fluid logo-main my-4"></a>
                </div>
            </div>
            <div class="col-md-10 d-flex justify-content-end gap-3">
                <ul class="nav justify-content-around align-content-center">
                    <li class="nav-item">
                        <a class="nav-link hover-underline" href="https://carema.pl/#onas">O nas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-underline" href="https://carema.pl/#gwarantujemy">Co gwarantujemy?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-underline" href="https://carema.pl/#oferty">Oferty pracy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-underline" href="https://carema.pl/#rekrutacja">Proces rekrutacji</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-underline" href="https://carema.pl/#kontakt">Kontakt</a>
                    </li>
                </ul>
                <a href="https://www.facebook.com/profile.php?id=61550507605923" class="btn btn-contact" role="button" target="_blank">Kącik Opiekunki</a>
            </div>
        </div>
    </div>

    <!-- Navbar Mobile -->
    <nav class="navbar bg-body-tertiary display-only-mobile-1 fixed-top">
        <div class="container">
            <div class="logo">
                <a href="https://carema.pl/"><img src="images/mainlogo.png" alt="CAREMA" class="img-fluid logo-main my-2"></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                        <div class="logo">
                            <a href="https://carema.pl/"><img src="images/mainlogo.png" alt="CAREMA" class="img-fluid logo-main my-2"></a>
                        </div>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 mb-3 gap-3">
                        <li class="nav-item">
                            <a class="nav-link hover-underline" href="https://carema.pl/#onas"><button type="button" class="nav-link" data-bs-dismiss="offcanvas" aria-label="Close">O nas</button></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-underline" href="https://carema.pl/#gwarantujemy"><button type="button" class="nav-link" data-bs-dismiss="offcanvas" aria-label="Close">Co gwarantujemy?</button></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-underline" href="https://carema.pl/#oferty"><button type="button" class="nav-link" data-bs-dismiss="offcanvas" aria-label="Close">Oferty pracy</button></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-underline" href="https://carema.pl/#rekrutacja"><button type="button" class="nav-link" data-bs-dismiss="offcanvas" aria-label="Close">Proces rekrutacji</button></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-underline" href="https://carema.pl/#kontakt" id="test"><button type="button" class="nav-link" data-bs-dismiss="offcanvas" aria-label="Close">Kontakt</button></a>
                        </li>
                    </ul>
                    <div class="d-flex ">
                        <a href="https://www.facebook.com/profile.php?id=61550507605923" class="btn btn-contact w-100" role="button" target="_blank">Kącik Opiekunki</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container d-flex flex-column text-center justify-content-center align-items-center">
        <div class="box">
            <img src="images/thank_you.png" alt="Dziękujemy">
            <?php
            echo nl2br("<h1>$msg</h1>");
            echo nl2br("<h2>$msg2</h2>");
            echo nl2br("<h2>$msg3</h2>");
            ?>
            <a href="https://carema.pl/">
                <div class="button-own">Powrót do strony głównej</div>
            </a>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap');

        html {
            scroll-padding-top: 80px;
        }

        body {
            font-family: 'Lato', sans-serif;
            color: #575756;
            font-weight: 400;
            font-size: 18px;
        }

        .wa-chat-bubble {
            display: none!important;
        }

        .wa-chat-box-brand {
            background-color: #ffffff!important;
            border: none!important;
        }

        .cky-revisit-bottom-left {
            bottom: 80px!important;
            left: 8px!important;
        }

        .container-own {
            overflow: hidden;
            justify-content: center;
            text-align: center;
            align-items: center;
            margin: 10% auto;
            display: flex;
            flex-direction: column;
        }

        img {
            max-height: 10rem;
            margin-bottom: 2rem;
            margin-top: 2rem;
        }

        h1 {
            font-size: 40px;
            font-weight: 700;
            color: #034E3F;
            margin-bottom: 2rem;
        }

        h2 {
            font-size: 22px;
            margin-bottom: 2rem;
        }

        .button-own {
            display: inline-block;
            padding: 18px 48px 18px 48px;
            margin: 20px 0px;
            cursor: pointer;
            background: #01A88F;
            color: #fff;
            border-radius: 47px;
            text-align: center;
            font-size: 18px;
            font-weight: 700;
        }

        .button-own:hover {
            background-color: #034E3F;
        }

        /* Nav */

        .nav-item a {
            color: #393939;
        }

        .nav-link,
        .nav-link:hover {
            color: #393939;
            font-weight: 700;
            font-size: 18px;
        }

        .hover-underline {
            display: inline-block;
            position: relative;
            color: #01A88F;
        }

        .hover-underline::after {
            content: '';
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 2px;
            bottom: 6px;
            left: 0;
            background-color: #01A88F;
            transform-origin: bottom right;
            transition: transform 0.5s ease-out;
        }

        .hover-underline:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .btn-contact {
            padding: 18px 48px 18px 48px;
            border-radius: 47px;
            color: #ffffff !important;
            background-color: #01A88F;
            font-weight: 700;
            font-size: 18px;
        }

        .btn-contact:hover {
            background-color: #034E3F;
            color: #ffffff;
        }

        .offcanvas-header .btn-close {
            color: #034E3F;
        }

        .offcanvas-header .btn-close:focus {
            box-shadow: none;
        }

        .modal-header .btn-close:focus {
            box-shadow: none;
        }

        .offcanvas-body .nav-link {
            font-size: 26px;
        }

        .navbar-toggler {
            border: none;
            padding: 0;
        }

        .navbar-toggler-icon {
            border: none;
            background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'><path stroke='rgba%2803, 78, 63, 0.99%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/></svg>");
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .bg-body-tertiary {
            background-color: #ffffff !important;
        }

        @media only screen and (min-width: 1200px) {
            .display-only-mobile-1 {
                display: none;
            }
        }

        @media only screen and (max-width: 1199px) {
            .display-only-pc-1 {
                display: none !important;
            }

            .logo-main {
                max-width: 228px;
            }

            body {
                margin-top: 80px;
            }
        }
    </style>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script>
      var url = 'https://wati-integration-prod-service.clare.ai/v2/watiWidget.js?14708';
      var s = document.createElement('script');
      s.type = 'text/javascript';
      s.async = true;
      s.src = url;
      var options = {
      "enabled":true,
      "chatButtonSetting":{
          "backgroundColor":"#01A88F",
          "ctaText":"Napisz do Nas",
          "borderRadius":"25",
          "marginLeft": "5",
          "marginRight": "20",
          "marginBottom": "20",
          "ctaIconWATI":false,
          "position":"left"
      },
      "brandSetting":{
          "brandName":"Carema",
          "brandSubTitle":"undefined",
          "brandImg":"https://carema.pl/images/sygnet_big.png",
          "welcomeText":"Cześć,\nw czym możemy Ci pomóc?",
          "messageText":"",
          "backgroundColor":"#ffffff",
          "ctaText":"Napisz do Nas",
          "borderRadius":"25",
          "autoShow":false,
          "phoneNumber":"48880660061"
      }
      };
      s.onload = function() {
          CreateWhatsappChatWidget(options);
      };
      var x = document.getElementsByTagName('script')[0];
      x.parentNode.insertBefore(s, x);
    </script>
</html>