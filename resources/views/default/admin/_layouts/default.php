<?php
/** @var \Ffcms\Templex\Template\Template $this */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title><?= ($title ?? 'Admin') ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= url('/') ?>/assets/npm/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= url('/') ?>/assets/npm/node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?= url('/') ?>/assets/css/admin.css" rel="stylesheet">
</head>
<body>
<nav class="site-header sticky-top py-1">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="<?= url('/admin') ?>">
            <i class="fa fa-globe-europe"></i>
        </a>
        <a class="py-2 d-none d-md-inline-block" href="<?= url('/admin/settings') ?>">Настройки</a>
        <a class="py-2 d-none d-md-inline-block" href="<?= url('/admin/users') ?>">Пользователи</a>
        <a class="py-2 d-none d-md-inline-block" href="<?= url('/admin/pages') ?>">Страницы</a>
        <a class="py-2 d-none d-md-inline-block" href="<?= url('/') ?>">Сайт</a>
    </div>
</nav>


<div class="container main-body">
    <div class="row">
        <div class="col">
            <?php
            if ($this->section('body')) {
                echo $this->section('body');
            } else {
                echo $this->bootstrap()->alert('warning', 'Page not found');
            }
            ?>
        </div>
    </div>
</div>


<footer class="container py-5">
    <div class="row">
        <div class="col-12 col-md">
            <small class="d-block mb-3 text-muted">Разработано <a href="mailto:zenn1989@ya.ru">Пятинским М.М.</a> &copy; Copyright 2019</small>
        </div>
    </div>
</footer>
<script src="<?= url('/') ?>/assets/npm/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?= url('/') ?>/assets/npm/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>

<?= $this->section('javascript') ?>

</body>
</html>
