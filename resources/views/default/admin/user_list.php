<?php

/** @var \Ffcms\Templex\Template\Template $this */
/** @var \Illuminate\Support\Collection|\App\User[] $records */
/** @var array $pagination */

use Ffcms\Core\Helper\Text;

$this->layout('admin/_layouts/default', [
    'title' => 'Пользователи'
])

?>

<?php $this->start('body') ?>
<h1>Список пользователей</h1>
<div class="row">
    <div class="col">
        <a href="<?= url('/admin/user/update') ?>" class="btn btn-primary">Добавить пользователя</a>
    </div>
</div>

<?php
$table = $this->table(['class' => 'table'])
    ->head([
        ['text' => '#'],
        ['text' => 'Почта'],
        ['text' => 'Имя'],
        ['text' => 'Действия']
    ]);

$records->each(function($row) use ($table) {
    /** @var \App\User $row */
    $actions = $this->bootstrap()->btngroup(['class' => 'btn-group btn-group-sm'])
        ->add('<i class="fas fa-pencil-alt"></i>', [url('admin/user/update/' . $row->id)], ['class' => 'btn btn-primary', 'html' => true])
        ->add('<i class="far fa-trash-alt"></i>', [url('admin/user/delete/' . $row->id)], ['class' => 'btn btn-danger', 'html' => true]);

    $table->row([
        ['text' => $row->id],
        ['text' => $row->email],
        ['text' => $row->name],
        ['text' => $actions->display(), 'html' => true]
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
