<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       contact@leoboyer.fr
 * @since      1.0.0
 *
 * @package    Multimedialpes
 * @subpackage Multimedialpes/public/partials
 */
function multimedialpes_public_display ($data) {
    extract($data);
    ob_start();
        ?>
    <ul>
        <li></li>
    </ul>
<?php
    return ob_get_clean();
}

?>

