<?php
/** @var \Ffcms\Templex\Template\Template $this */
?>
<section class="contact" id="contact">
    <div class="cta-content">
        <div class="container">
            <h2>Контакты для связи</h2>
            <div class="row">
                <div class="col-md-6">
                    <p>Напишите ваш номер телефона и мы перезвоним вам в ближайшее время</p>
                    <form>
                        <div class="form-group row">
                            <label for="inputName" class="col-md-3 col-form-label">Ваше имя?</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="inputName" placeholder="Иван">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPhone" class="col-md-3 col-form-label">Телефон</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="inputPhone" placeholder="89181112233">
                            </div>
                        </div>
                        <button id="callme" class="btn btn-primary"><i class="fa fa-phone"></i> Позвоните мне!</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <p>
                        <a href="tel:89991112233" class="btn btn-success"><i class="fa fa-phone"></i> +79991112233</a>
                        <a href="mailto:vasya@mail.ru" class="btn btn-info"><i class="fa fa-envelope"></i> vasya@mail.ru</a>
                    </p>
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Af8c6979a6322dca79367a58ea672170781341cb31d15d579a35190a5a307d60d&amp;width=100%25&amp;height=300&amp;lang=ru_RU&amp;scroll=true"></script>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
</section>