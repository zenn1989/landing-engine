<?php
/** @var \Ffcms\Templex\Template\Template $this */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= env('SEO_OP_DESC') ?? '' ?>">
    <meta name="keywords" content="<?= env('SEO_OP_KEYWORDS') ?? '' ?>">
    <title><?= env('SEO_OP_TITLE') ?? 'Empty page' ?></title>
    <link href="assets/npm/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/npm/node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
    <link href="assets/css/theme.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto" rel="stylesheet">
</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Моя компания &copy;</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Меню
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#about">О компании</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#prices">Услуги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">Контакты</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-8 my-auto">
                <div class="header-content mx-auto">
                    <h1 class="mb-5">Моя компания &copy; - современная компания предоставляющая услуги накачки резиновых уток! Закажите резиновую утку уже сейчас! Резиновые утки любых размеров для вас!</h1>
                    <a href="#prices" class="btn btn-outline btn-xl js-scroll-trigger">Каталог услуг</a>
                    <a href="#callback" class="btn btn-outline-light btn-xl js-scroll-trigger"><i class="fa fa-phone"></i> Позвоните мне</a>
                </div>
            </div>
            <div class="col-lg-4 my-auto">
                <div class="device-container">
                    <div class="device-mockup iphone6_plus portrait white">
                        <div class="device">
                            <div class="screen">
                                <img src="assets/img/main-logo.png" class="img-fluid" alt="Логотип компании уток">
                            </div>
                            <div class="button">
                                <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="about bg-primary text-center" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="section-heading">Моя компания - накачка резиновых уточек</h2>
                <p>Наша компания уже более 10 лет занимается накачкой резиновых уток на мировом рынке. За время нашей работы более тысячи клиентов остались довольны нашей работой!</p>
                <div class="badges">
                    <a class="badge-link" href="#"><img src="assets/img/company-process-image1.jpg" alt=""></a>
                    <a class="badge-link" href="#"><img src="assets/img/company-process-image2.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="features" id="prices">
    <div class="container">
        <div class="section-heading text-center">
            <h2>Каталог услуг</h2>
            <p class="text-muted">Ниже приведен список наших услуг и их стоимость, актуальный на <?= date('d.m.Y') ?>!</p>
            <hr>
        </div>
        <div class="table-responsive">
            <?= $this->table(['class' => 'table table-striped table-hover'])
                ->head([
                    ['text' => 'Услуга'],
                    ['text' => 'Стоимость']
                ])->row([
                    ['text' => 'Накачка одной резиновой утки малого размера'],
                    ['text' => '<span class="badge badge-info">50руб</span>', 'html' => true]
                ])->row([
                    ['text' => 'Накачка одной резиновой утки среднего размера'],
                    ['text' => '<span class="badge badge-success">100руб</span>', 'html' => true]
                ])->row([
                    ['text' => 'Накачка одной резиновой утки большого размера'],
                    ['text' => '150руб']
                ])->row([
                    ['text' => 'Ремонт поврежденных участков резиновой утки'],
                    ['text' => 'от 50руб']
                ])->row([
                    ['text' => 'Выезд к клиенту домой для оказания услуг по накачке уток'],
                    ['text' => '200руб']
                ])->row([
                    ['text' => 'Выпить с клиентом чая'],
                    ['text' => 'бесплатно']
                ])->display() ?>
        </div>
        <p class="text-muted">* Цены в каталоге услуг не являются публичным договором-офертой а лишь указывают на предварительную оценку стоимости услуг.</p>
    </div>
</section>

<section class="cta">
    <div class="cta-content">
        <div class="container">
            <h2>Stop waiting.<br>Start building.</h2>
            <a href="#contact" class="btn btn-outline btn-xl js-scroll-trigger">Let's Get Started!</a>
        </div>
    </div>
    <div class="overlay"></div>
</section>

<section class="contact bg-primary" id="contact">
    <div class="container">
        <h2>We
            <i class="fas fa-heart"></i>
            new friends!</h2>
        <ul class="list-inline list-social">
            <li class="list-inline-item social-twitter">
                <a href="#">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
            <li class="list-inline-item social-facebook">
                <a href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
            <li class="list-inline-item social-google-plus">
                <a href="#">
                    <i class="fab fa-google-plus-g"></i>
                </a>
            </li>
        </ul>
    </div>
</section>

<footer>
    <div class="container">
        <p>&copy; Your Website 2018. All Rights Reserved.</p>
        <ul class="list-inline">
            <li class="list-inline-item">
                <a href="#">Privacy</a>
            </li>
            <li class="list-inline-item">
                <a href="#">Terms</a>
            </li>
            <li class="list-inline-item">
                <a href="#">FAQ</a>
            </li>
        </ul>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="assets/npm/node_modules/jquery/dist/jquery.min.js"></script>
<script src="assets/npm/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>


<!-- Custom scripts for this template -->
<script src="assets/js/theme.js"></script>

</body>

</html>
