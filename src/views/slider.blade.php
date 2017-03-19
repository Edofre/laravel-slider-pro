<?php
/* @var $id string */
/* @var $slides \Edofre\SliderPro\Models\Slide[] */
/* @var $thumbnails \Edofre\SliderPro\Models\Thumbnail[] */
?>

<div class="slider-pro" id="<?= $id; ?>">
    <div class="sp-slides">
        <?php foreach ($slides as $slide): ?>
            <div class="sp-slide">
                <?= $slide->render(); ?>
            </div>
        <?php endforeach; ?>
        <?php if (!empty($thumbnails)): ?>
            <div class="sp-thumbnails">
                <?php foreach ($thumbnails as $thumbnail): ?>
                    <?= $thumbnail->render(); ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>