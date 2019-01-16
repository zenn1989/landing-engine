<?php
/** @var \Ffcms\Templex\Template\Template $this */

echo $this->bootstrap()->navbar(['class' => 'navbar navbar-expand-lg navbar-light fixed-top', 'id' => 'mainNav'], true)
    ->brand(['text' => 'Моя компания', 'link' => ['/']])
    ->menu('right', ['text' => 'О компании', 'link' => ['#about'], 'linkProperties' => ['class' => 'js-scroll-trigger']])
    ->menu('right', ['text' => 'Услуги', 'link' => ['#prices'], 'linkProperties' => ['class' => 'js-scroll-trigger']])
    ->menu('right', ['text' => 'Контакты', 'link' => ['#contact'], 'linkProperties' => ['class' => 'js-scroll-trigger']])
    ->menu('right', ['text' => 'Еще', 'dropdown' => [
        ['text' => 'Vk.com', 'link' => ['#']],
        ['text' => 'Twitter', 'link' => ['#']]
    ]])
    ->display();
?>