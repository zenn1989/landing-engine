<?php
/** @var \Ffcms\Templex\Template\Template $this */
/** @var \App\Model\FormAdminLogin $model */
/** @var bool $fail */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link href="<?= url('/') ?>/assets/npm/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= url('/') ?>/assets/css/admin-login.css" rel="stylesheet">
    <meta name="robots" content="noindex, nofollow, noarchive" />
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body id="LoginForm">
<div class="container">
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Admin Login</h2>
            </div>
            <?php if ($fail): ?>
                <p class="alert alert-danger">Введены неверные данные авторизации</p>
            <?php endif ?>

            <?php $form = $this->form($model) ?>
            <?= $form->start(false) ?>

            <div class="form-group">
                <?= $form->field()->text('email', ['placeholder' => 'Email', 'class' => 'form-control']) ?>
            </div>

            <div class="form-group">
                <?= $form->field()->password('password', ['placeholder' => 'Password', 'class' => 'form-control']) ?>
            </div>

            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="<?= env('APP_RECATCHA_PUBLIC') ?>"></div>
            </div>

            <?= $form->button()->submit('Login', ['class' => 'btn btn-primary']) ?>

            <?= $form->stop() ?>
        </div>
    </div>
</div>

<script src="<?= url('/') ?>/assets/npm/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?= url('/') ?>/assets/npm/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>