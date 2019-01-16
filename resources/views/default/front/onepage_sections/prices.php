<?php
/** @var \Ffcms\Templex\Template\Template $this */
?>

<section class="features" id="prices">
    <div class="container">
        <div class="section-heading text-center">
            <h2>Каталог услуг</h2>
            <p class="text-muted">Ниже приведен список наших услуг и их стоимость, актуальный на <?= date('d.m.Y') ?>!</p>
            <hr>
        </div>

        <div class="table-responsive">
            <?= $this->table(['class' => 'table table-striped table-hover'])
                ->head([
                    ['text' => 'Услуга'],
                    ['text' => 'Стоимость']
                ])->row([
                    ['text' => 'Накачка одной резиновой утки малого размера'],
                    ['text' => '<span class="badge badge-info">50руб</span>', 'html' => true]
                ])->row([
                    ['text' => 'Накачка одной резиновой утки среднего размера'],
                    ['text' => '<span class="badge badge-success">100руб</span>', 'html' => true]
                ])->row([
                    ['text' => 'Накачка одной резиновой утки большого размера'],
                    ['text' => '150руб']
                ])->row([
                    ['text' => 'Ремонт поврежденных участков резиновой утки'],
                    ['text' => 'от 50руб']
                ])->row([
                    ['text' => 'Выезд к клиенту домой для оказания услуг по накачке уток'],
                    ['text' => '200руб']
                ])->row([
                    ['text' => 'Выпить с клиентом чая'],
                    ['text' => 'бесплатно']
                ])->display() ?>
        </div>
        <p class="text-muted">* Цены в каталоге услуг не являются публичным договором-офертой а лишь указывают на предварительную оценку стоимости услуг.</p>
    </div>
</section>
