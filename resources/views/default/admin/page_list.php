<?php

/** @var \Ffcms\Templex\Template\Template $this */
/** @var \Illuminate\Support\Collection|\App\Page[] $records */
/** @var array $pagination */

use Ffcms\Core\Helper\Date;

$this->layout('admin/_layouts/default', [
    'title' => 'Страницы'
])

?>

<?php $this->start('body') ?>
<h1>Список страниц сайта</h1>
<div class="row">
    <div class="col">
        <a href="#" class="btn btn-primary">Добавить страницу</a>
    </div>
</div>

<?php
$table = $this->table(['class' => 'table'])
    ->head([
        ['text' => '#'],
        ['text' => 'Маршрут'],
        ['text' => 'Сниппет'],
        ['text' => 'Сео заголовок'],
        ['text' => 'Создана'],
        ['text' => 'Действия']
    ]);

$records->each(function($row) use ($table) {
    /** @var \App\Page $row */
    $actions = $this->bootstrap()->btngroup(['class' => 'btn-group btn-group-sm'])
        ->add('<i class="fas fa-pencil-alt"></i>', [url('admin/page/update/' . $row->id)], ['class' => 'btn btn-primary', 'html' => true])
        ->add('<i class="far fa-trash-alt"></i>', [url('admin/page/delete/' . $row->id)], ['class' => 'btn btn-danger', 'html' => true]);

    $table->row([
        ['text' => $row->id],
        ['text' => '<span class="badge badge-success">' . $row->route . '</span>', 'html' => true],
        ['text' => \Ffcms\Core\Helper\Text::snippet(strip_tags($row->text), 50)],
        //['text' => ''],
        //['text' => Date::convertToDatetime($row->created_at, Date::FORMAT_TO_DAY)],
        //['text' => $actions->display(), 'html' => true]
    ]);
});

?>
<div class="table-responsive">
    <?= $table->display() ?>
</div>

<?= $this->bootstrap()->pagination([url('/admin')], ['class' => 'pagination justify-content-center'])
    ->size($pagination['total'], $pagination['page'], $pagination['step'])
    ->display() ?>

<?php $this->stop() ?>
