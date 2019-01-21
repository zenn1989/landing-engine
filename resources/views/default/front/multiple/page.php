<?php

/** @var \Ffcms\Templex\Template\Template $this */
/** @var \App\Page $page */

$this->layout('front/multiple/_layouts/default', [
    'seoTitle' => $page->seo_title,
    'seoDescription' => $page->seo_description,
    'seoKeywords' => $page->seo_keywords
])

?>
<?php $this->start('body') ?>

<p><?= $page->text ?></p>

<?php $this->stop() ?>