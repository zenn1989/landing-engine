<?php

/** @var \Ffcms\Templex\Template\Template $this */
/** \App\Page $record */
/** @var \App\Model\FormPageUpdate $model */
/** @var bool $updated */

use Ffcms\Core\Helper\Date;

$this->layout('admin/_layouts/default', [
    'title' => 'Редактирование страницы'
]);
?>

<?php $this->start('body') ?>
<h1>Редактирование страницы</h1>

<?php if ($updated): ?>
    <?= $this->bootstrap()->alert('success', 'Страница обновлена') ?>
<?php endif ?>

<?php $form = $this->form($model) ?>
<?= $form->start(false) ?>

<?= $form->fieldset()->text('route', null, 'Адрес корневого URI, который будет занимать страница на сайте') ?>
<?= $form->fieldset()->select('tpl', ['options' => ['front/multiple/page'], 'optionsKey' => false], 'Шаблон для страницы') ?>


<strong>Код страницы</strong>
<div id="ace-edit" style="min-height: 400px;width: 100%;"><?= htmlentities($model->text) ?></div>
<?php $model->text = 'none'; ?>
<?= $form->field()->hidden('text', ['id' => 'text-result']) ?>

<?= $form->fieldset()->text('seoTitle') ?>
<?= $form->fieldset()->text('seoDesc') ?>
<?= $form->fieldset()->text('seoKeywords') ?>

<?= $form->button()->submit('Сохранить', ['class' => 'btn btn-primary']) ?>

<?= $form->stop() ?>

<script src="<?= url('/') ?>/assets/npm/node_modules/ace-builds/src-min-noconflict/ace.js" charset="utf-8"></script>
<script src="<?= url('/') ?>/assets/npm/node_modules/ace-builds/src-min-noconflict/ext-language_tools.js"></script>
<script>
    var editor = ace.edit("ace-edit");
    editor.setTheme("ace/theme/chrome");
    editor.session.setMode("ace/mode/html");

    // enable autocomplete
    editor.setOptions({
        enableBasicAutocompletion: true,
        enableSnippets: true,
        enableLiveAutocompletion: true,
        showPrintMargin: false
    });

</script>

<?php $this->stop() ?>


<?php $this->push('javascript') ?>
<script>
$(document).ready(function(){
    $('#FormPageUpdate').submit(function(){
        var code = editor.getValue();
        $('#text-result').val(code);

        return true;
    });
});
</script>
<?php $this->stop() ?>
