<?php
/**
 * @var $items array
 * @var $depth int
 */
?>
<div class="lwptoc_itemWrap">
    <?php foreach ($items as $item) { ?>
        <div class="lwptoc_item">
            <a href="#<?= $item['id'] ?>" class="lwptoc_item">
                <?php if ($item['number']) { ?>
                    <span class="lwptoc_item_number"><?= $item['number'] . $item['numberSuffix'] ?></span>
                <?php } ?>
                <span class="lwptoc_item_label"><?= $item['label'] ?></span>
            </a>
            <?php lwptoc_items($item['childrens']) ?>
        </div>
    <?php } ?>
</div>