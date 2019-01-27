<?php

/** @var \Ffcms\Templex\Template\Template $this */
/** @var \App\Model\FormUserUpdate $model */
/** @var bool $updated */

use Ffcms\Core\Helper\Date;

$this->layout('admin/_layouts/default', [
    'title' => 'Редактирование пользователя'
]);
?>

<?php $this->start('body') ?>
<h1>Редактирование пользователя</h1>

<?php if ($updated): ?>
    <?= $this->bootstrap()->alert('success', 'Пользователь обновлен') ?>
<?php endif ?>

<?php $form = $this->form($model) ?>
<?= $form->start(false) ?>

<?= $form->fieldset()->text('email', null, 'Почта пользователя') ?>
<?= $form->fieldset()->text('name', null, 'Имя пользователя') ?>
<?= $form->fieldset()->password('password', null, 'Укажите новый пароль для пользователя. Если оставить пустым - не изменится') ?>

<?= $form->button()->submit('Сохранить', ['class' => 'btn btn-primary']) ?>

<?= $form->stop() ?>

<?php $this->stop() ?>