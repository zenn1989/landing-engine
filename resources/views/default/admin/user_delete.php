<?php

/** @var \Ffcms\Templex\Template\Template $this */
/** @var \App\User $record */

use Ffcms\Core\Helper\Text;

$this->layout('admin/_layouts/default', [
    'title' => 'Удалить пользователя'
]);
?>

<?php $this->start('body') ?>
<h1>Удаление пользователя</h1>
<p>Вы уверены что хотите удалить этого пользователя? Email: <span class="badge badge-info"><?= $record->email ?></span>, id = <?= $record->id ?></p>
<form method="post">
    <input type="submit" name="submit" value="Удалить" class="btn btn-danger" />
</form>

<?php $this->stop() ?>
