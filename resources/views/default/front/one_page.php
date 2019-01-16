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

<!-- navbar insertion from sections -->
<?= $this->insert('front/onepage_sections/navbar-menu') ?>
<!-- /navbar insertion from sections -->

<!-- render main header -->
<?= $this->insert('front/onepage_sections/mainhead') ?>
<!-- /render main header -->

<!-- render about section -->
<?= $this->insert('front/onepage_sections/about') ?>
<!-- /render about section -->

<!-- render prices section -->
<?= $this->insert('front/onepage_sections/prices') ?>
<!-- /render prices section -->

<!-- render contact section -->
<?= $this->insert('front/onepage_sections/contact') ?>
<!-- /render contact section -->


<footer>
    <div class="container">
        <p>&copy; Наша компания, 2019. Разработано в студии "NoName" xD</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="assets/npm/node_modules/jquery/dist/jquery.min.js"></script>
<script src="assets/npm/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>

<!-- Custom scripts for this template -->
<script src="assets/js/theme.js"></script>

</body>
</html>