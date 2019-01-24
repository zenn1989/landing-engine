<?php

/** @var \Ffcms\Templex\Template\Template $this */
/** @var \App\Backcalls[]|\Illuminate\Support\Collection $records */
/** @var array $pagination */

use Ffcms\Core\Helper\Date;

$this->layout('admin/_layouts/default', [
    'title' => 'Админ панель - главная'
]);

?>

<?php $this->start('body') ?>
<h1>Добро пожаловать!</h1>
<hr />
<p>В административной панели вы можете управлять большинством возможностей сайта.</p>
<h2>Список запросов "перезвоните мне"</h2>
<?php
$table = $this->table(['class' => 'table'])
    ->head([
        ['text' => '#'],
        ['text' => 'Телефон клиента'],
        ['text' => 'Имя клиента'],
        ['text' => 'Состояние'],
        ['text' => 'Дата обращения']
    ]);

$records->each(function ($row) use ($table) {
    /** @var \App\Backcalls $row */
    $table->row([
        ['text' => $row->id],
        ['text' => '<a href="tel:' . $this->e($row->phone) . '">' . $this->e($row->phone) . '</a>', 'html' => true],
        ['text' => $this->e($row->name)],
        ['text' => ($row->status ? '<span class="badge badge-success">Выполнен</span>' : '<a href="' . url("/admin/close/" . $row->id) . '" class="badge badge-danger">Не обработан</a>'), 'html' => true],
        ['text' => Date::convertToDatetime($row->created_at, Date::FORMAT_TO_HOUR)]
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
