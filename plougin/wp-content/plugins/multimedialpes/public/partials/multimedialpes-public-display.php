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
        echo '<div class="multimedialpes-candidatures">';
    while ($candidates_data->have_posts()): $candidates_data->the_post();
        $type = get_post_meta( get_the_ID(), 'candidat_type', true );
        ?>
        <figure class="multimedialpes_card">
            <div class="multimedialpes_card__hero">
                <img src="<?= get_post_meta( get_the_ID(), 'candidat_thumbnail', true ) ?>" alt="multimedialpes_card" class="multimedialpes_card__img">
            </div>
            <div class="multimedialpes_card__content">
                <div class="multimedialpes_card__title">
                    <h1 class="multimedialpes_card__heading"><?= the_title(); ?></h1>
                </div>
                <div class="multimedialpes_card__tags">
                    <div class="multimedialpes_card__tag multimedialpes_card__tag--<?= strtolower($type); ?>"><?= $type ?></div>
                </div>
                <p class="multimedialpes_card__description">Yummy veggie multimedialpes_card with tasty olives, crisp peppers, fresh arugula and original italian tomato sauce.</p>
                <div class="multimedialpes_card__details">
                    <div class="multimedialpes_card__detail"><span class="emoji">🍕</span>850 kcal</div>
                </div>
            </div>
        </figure>
<?php
    endwhile;
        echo '</div>';
    endif;
    return ob_get_clean();
}

?>

