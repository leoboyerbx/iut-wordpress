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
function multimedialpes_public_display_single ($content) {
    ob_start();
    ?>
<?php
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
                        <a href="#" data-candidate-id="<?= the_ID() ?>" class="multimedialpes_btn multimedialpes_btn-outline-<?= strtolower($type) ?>"><i class="fas fa-eye"></i> Voir</a>
                    </div>

                </div>
            </div>
        </figure>

<?php
    return ob_get_clean();
}

?>
