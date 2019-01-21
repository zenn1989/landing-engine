<?php
/** @var \Ffcms\Templex\Template\Template $this */

$this->layout('admin/_layouts/default', [
    'title' => 'Админ панель - главная'
]);
?>

<?php $this->start('body') ?>
<h1>Добро пожаловать!</h1>
<hr />

<?php $this->stop() ?>
