<?php

/** @var \Ffcms\Templex\Template\Template $this */
/** @var \App\Page $record */

use Ffcms\Core\Helper\Text;

$this->layout('admin/_layouts/default', [
    'title' => 'Удалить страницу'
]);
?>

<?php $this->start('body') ?>
<h1>Удаление страницы</h1>
<p>Вы уверены что хотите удалить эту страницу? Маршрут: <span class="badge badge-info"><?= $record->route ?></span>, id = <?= $record->id ?></p>
<form method="post">
    <input type="submit" name="submit" value="Удалить" class="btn btn-danger" />
</form>

<?php $this->stop() ?>
