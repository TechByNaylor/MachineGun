<?php

/**
 * @file
 * Custom theme implementation to display a single Drupal page without
 * sidebars. The sidebars are hidden by regions_hidden for this theme, so
 * the default page.tpl.php will not work without throwing exceptions.
 */
drupal_set_message('modify page--node-webkit-app.tpl.php to work in node-webkit', 'error');

?>
<head>
    <?php print $scripts; ?>
</head>

<?= $node->title ?>

