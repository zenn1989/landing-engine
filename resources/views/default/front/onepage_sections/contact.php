<?php
/** @var \Ffcms\Templex\Template\Template $this */
?>
<section class="contact">
    <div class="cta-content">
        <div class="container">
            <h2>Позвоните мне!</h2>
            <p>Напишите ваш номер телефона и мы перезвоним вам в ближайшее время</p>
            <div class="row">
                <div class="col-md-6">
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
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-phone"></i> Позвоните мне!</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <p>Наш телефон: <a href="tel: +79991112233">+79991112233</a></p>
                    <p>Почта: <a href="mailto: vasya@mail.ru">vasya@mail.ru</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
</section>