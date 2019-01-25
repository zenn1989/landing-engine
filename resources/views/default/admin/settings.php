<?php

/** @var \Ffcms\Templex\Template\Template $this */
/** @var \App\Model\FormAdminSettings $model */

$this->layout('admin/_layouts/default', [
    'title' => 'Админ панель - главная'
]);
?>

<?php $this->start('body') ?>
<h1>Настройки</h1>
<hr />
<?php $form = $this->form($model) ?>

<?= $form->start(false) ?>
<h2>Основные настройки</h2>
<?= $form->fieldset()->select('appEnv', ['options' => ['local', 'staging', 'production'], 'optionsKey' => false]) ?>
<?= $form->fieldset()->boolean('appDebug', null, 'Нужно ли выводить отладочную информацию на сайте?') ?>
<?= $form->fieldset()->text('appUrl', null, 'Основная ссылка на ваш сайт') ?>
<?= $form->fieldset()->select('appTemplate', ['options' => $model->getTemplates(), 'optionsKey' => false], 'Шаблон для сайта, используемый по-умолчанию') ?>
<?= $form->fieldset()->boolean('appOnepage', null, 'Включить режим одностраничного лендинга?') ?>

<h2>Капча</h2>
<?= $form->fieldset()->text('appCatchaPublic', null, 'Публичный ключ сервиса recaptcha (из секции script)') ?>
<?= $form->fieldset()->text('appCatchaPrivate', null, 'Приватный ключ сервиса recaptcha (он же secret)') ?>

<div id="onepage-active" class="d-none">
    <h2>SEO для одностраничника</h2>
    <?= $form->fieldset()->text('seoOpTitle', null, 'Заголовок страницы (title)') ?>
    <?= $form->fieldset()->text('seoOpDesc', null, 'Описание сайта (мета тег description)') ?>
    <?= $form->fieldset()->text('seoOpKeywords', null, 'Ключевые слова (мета тег keywords)') ?>
</div>

<?= $form->button()->submit('Сохранить', ['class' => 'btn btn-primary']) ?>

<?= $form->stop() ?>

<?php $this->stop() ?>

<?php $this->push('javascript') ?>
<script>
    $(document).ready(function(){
        if($('#FormAdminSettings-appOnepage').is(':checked')) {
            $('#onepage-active').removeClass('d-none');
        }

        $('#FormAdminSettings-appOnepage').change(function(){
            if (this.checked) {
                $('#onepage-active').removeClass('d-none');
            } else {
                $('#onepage-active').addClass('d-none');
            }
        })
    });
</script>
<?php $this->stop() ?>


