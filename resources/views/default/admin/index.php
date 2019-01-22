<?php
/** @var \Ffcms\Templex\Template\Template $this */

$this->layout('admin/_layouts/default', [
    'title' => 'Админ панель - главная'
]);
?>

<?php $this->start('body') ?>
<h1>Добро пожаловать!</h1>
<hr />
<p>В административной панели вы можете управлять большинством возможностей сайта.</p>
<h2>Список запросов "перезвоните мне"</h2>
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <td>#</td>
            <td>Телефон клиента</td>
            <td>Имя клиента</td>
            <td>Состояние</td>
            <td>Дата обращения</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>+79997772211</td>
            <td>Михаил</td>
            <td><a href="#" class="badge badge-danger">Не обработан</a></td>
            <td>25.11.2019</td>
        </tr>
        <tr>
            <td>1</td>
            <td>+79997772211</td>
            <td>Михаил</td>
            <td><a href="#" class="badge badge-danger">Не обработан</a></td>
            <td>24.11.2019</td>
        </tr>
        <tr>
            <td>1</td>
            <td>+79997772211</td>
            <td>Михаил</td>
            <td><a href="#" class="badge badge-success">Выполнен</a></td>
            <td>23.11.2019</td>
        </tr>
        </tbody>
    </table>
</div>
<?php $this->stop() ?>
