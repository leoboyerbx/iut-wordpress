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
    
    global $wpdb;
    $raw_types = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}multimedialpes_contest_types");
    //    die(var_dump($candidates_data));
    $types = [];
    foreach ($raw_types as $raw_type) {
      $types[$raw_type->id] = $raw_type;
    }
    ob_start();
    ?>
    <?php
    $type = $types[get_post_meta( get_the_ID(), 'candidat_type', true )];
    ?>
    <figure class="multimedialpes_card single" data-api="card-content">
      <div class="multimedialpes_card__hero">
        <?php if($type->media_type === 'video'):
          echo wp_oembed_get(esc_url( get_post_meta( get_the_ID(), "candidat_details_{$type->id}_av_url", 1 ) ));
        else: ?>
          <img src="<?= get_post_meta( get_the_ID(), 'candidat_thumbnail', true ) ?>" alt="multimedialpes_card" class="multimedialpes_card__img">
        <?php endif; ?>
      </div>
      <div class="multimedialpes_card__content">
        <div class="multimedialpes_card__title">
          <h1 class="multimedialpes_card__heading"><?= the_title(); ?></h1>
        </div>
        <div class="multimedialpes_card__tags">
          <div class="multimedialpes_card__tag multimedialpes_card__tag--<?= $type->id; ?>"><?= $type->title ?></div>
        </div>
        <div class="multimedialpes_card__data-content">
          <p class="multimedialpes_card__description"><?= get_post_meta( get_the_ID(), 'candidat_description', true ) ?></p>
          <p>
            <strong>Date de réalisation: </strong><?= get_post_meta( get_the_ID(), 'candidat_date', true ) ?>
          </p>
          <?php if($type->media_type === 'video'): ?>
            <p>
              <strong>Catégorie: </strong><?= get_post_meta( get_the_ID(), "candidat_details_{$type->id}_av_categorie", true ) ?>
            </p>
          <?php endif; ?>
          <?php if($type->media_type === 'graphics'): ?>
            <h2>Images composant le projet</h2>
            <p class="multimedialpes-project-imgs">
              <?php
                $images = get_post_meta(get_the_ID(), "candidat_details_{$type->id}_graphisme_images", true);
                foreach ($images as $image):   ?>
                  <a href="<?= $image ?>"><img src="<?= $image ?>" alt="Image du projet" class="multimedialpes-project-img"></a>
                <?php endforeach; ?>
            <p>
              <strong>Type de création: </strong><?= get_post_meta( get_the_ID(), "candidat_details_{$type->id}_graphisme_type", true ) ?>
            </p>
          <?php endif; ?>
          <?php if($type->media_type === 'web'): ?>
            <p>
              <strong>Type de site: </strong><?= get_post_meta( get_the_ID(), "candidat_details_{$type->id}_web_type", true ) ?>
            </p>
            <p>
              <a href="<?= get_post_meta( get_the_ID(), "candidat_details_{$type->id}_web_url", true ) ?>" class="multimedialpes_btn  multimedialpes_btn-<?= $type->id ?>">Visiter le site</a>
            </p>
          <?php endif; ?>
        </div>
        <div class="multimedialpes_card__footer">
          <div class="multimedialpes_card__details">
            <?php
              foreach (get_post_meta( get_the_ID(), 'candidat_contributors', true ) as $contributor):
                ?>
                <div class="multimedialpes_card__detail"><span class="emoji"><i class="fas fa-user"></i></span> <?= $contributor ?></div>
              <?php endforeach; ?>
          </div>
        
        </div>
      </div>
    </figure>
    
    <?php
    return ob_get_clean();
  }

?>

