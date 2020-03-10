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
                <p class="multimedialpes_card__description"><?= wp_trim_words(get_post_meta( get_the_ID(), 'candidat_'.strtolower($type).'_description', true )) ?></p>
                <div class="multimedialpes_card__footer">
                    <div class="multimedialpes_card__details">
                        <?php
                        foreach (get_post_meta( get_the_ID(), 'candidat_contributors', true ) as $contributor):
                            ?>
                            <div class="multimedialpes_card__detail"><span class="emoji"><i class="fas fa-user"></i></span> <?= $contributor ?></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="multimedialpes_card_action">
                        <a href="#" class="multimedialpes_btn multimedialpes_btn-outline-<?= strtolower($type) ?>"><i class="fas fa-eye"></i> Voir</a>
                    </div>

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

