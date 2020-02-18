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
function multimedialpes_public_display ($atts, $content) {
    $args = array(
        'post_type' => 'candidat',
        'tax_query'  => array(
                array(
                    'taxonomy' => 'concours',
                    'field' => 'ID',
                    'terms' => $atts['id'],
                )
        )
    );
    $candidates_data = new WP_Query(  );
    $candidates_data->query( $args);
//    die(var_dump($candidates_data));
    ob_start();
    if ($candidates_data->have_posts()):
    while ($candidates_data->have_posts()): $candidates_data->the_post();
        ?>
    <ul>
        <li><?= get_the_ID() ?></li>
    </ul>
<?php
    endwhile;
    endif;
    return ob_get_clean();
}

?>

