<?php
    $stylesheet = !empty($stylesheet) ? $stylesheet : 'widget.accordion.css';

?>

<style>
    <?= file_get_contents(path_to_theme().'/css/'.$stylesheet) ?>
</style>

<div class="accordion-wrapper">

    <?php foreach ($items as $item) { ?>

        <div id="accordion_item_<?= $item['id'] ?>" class="accordion-item">
            <div class="accordion-item-label"><?= $item['label'] ?></div>
            <div class="accordion-item-content"><?= $item['content'] ?></div>
        </div>

    <?php } ?>

    <?= $footer ?>

</div>

<script>
    (function ($) {

        var accordion = {};
            accordion.__defineGetter__('height', function () {
                return $('.accordion-wrapper').height();
            });

            accordion.__defineGetter__('width', function () {
                return $('.accordion-wrapper').width();
            });

            accordion.__defineGetter__('items', function () {
                var itemNodes = $('.accordion-item');
                var items     = [];

                for (var i = 0; i < itemNodes.length; i++) {
                    var $itemNode = $(itemNodes[i]);
                    var item = {
                        label: $itemNode.firstChild(),
                        content: $itemNode.firstChild().nextSibling()
                    };

                    items.push(item);
                }

                return items;
            });

        $('.accordion-item-label').click(function  (e) {

            $('.accordion-item-content').hide();

            var $items = $('.accordion-item');
            var totalHeight = $('.accordion-wrapper').height() - ($items.outerHeight(true)*$items.length) - 30;

            $(this).next().height(totalHeight).show();

            $('.workspace-section .workspace-main').hide();

            $('#device_'+$(this.parentNode).attr('id').substring(15)+'_workspace').show();

        }).next().hide();





    }(jQuery));
</script>