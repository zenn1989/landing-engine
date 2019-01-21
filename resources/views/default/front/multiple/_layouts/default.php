<?php
/** @var \Ffcms\Templex\Template\Template $this */
/** @var string|null $seoTitle */
/** @var string|null $seoDescrioption */
/** @var string|null $seoKeywords */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= $seoDescrioption ?? '' ?>">
    <meta name="keywords" content="<?= $seoKeywords ?? '' ?>">
    <title><?= $seoTitle ?? '' ?></title>
    <link href="<?= url('/') ?>/assets/npm/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= url('/') ?>/assets/npm/node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
    <link href="<?= url('/') ?>/assets/css/multiple.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto" rel="stylesheet">
</head>

<body>

<!-- render navbar head menu -->
<?= $this->bootstrap()->navbar(['class' => 'navbar navbar-expand-lg navbar-light fixed-top navbar-shrink', 'id' => 'mainNav'], true)
    ->brand(['text' => 'Моя компания', 'link' => ['/']])
    ->menu('left', ['text' => 'О компании', 'link' => ['#about'], 'linkProperties' => ['class' => 'js-scroll-trigger']])
    ->menu('left', ['text' => 'Услуги', 'link' => ['#prices'], 'linkProperties' => ['class' => 'js-scroll-trigger']])
    ->menu('left', ['text' => 'Контакты', 'link' => ['#contact'], 'linkProperties' => ['class' => 'js-scroll-trigger']])
    ->menu('right', ['text' => 'Еще', 'dropdown' => [
        ['text' => 'Vk.com', 'link' => ['#lol-kek']],
        ['text' => 'Twitter', 'link' => ['#cheburek']]
    ]])
    ->display() ?>


<div class="main-element">
    <div class="container main-body">
        <div class="row">
            <div class="col">
                <?= $this->section('body') ?? 'No content' ?>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript -->
<script src="<?= url('/') ?>/assets/npm/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?= url('/') ?>/assets/npm/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>