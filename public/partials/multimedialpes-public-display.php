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
    global $wpdb;
    $raw_types = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}multimedialpes_contest_types");
    //    die(var_dump($candidates_data));
    $types = [];
    foreach ($raw_types as $raw_type) {
      $types[$raw_type->id] = $raw_type;
    }
    ob_start();
    ?>
    
  <div class="multimedialpes-candidatures" data-rest-url="<?= get_rest_url() ?>">
      <div class="multimedialpes-candidatures-filters">
          <a href="#" class="multimedialpes_btn multimedialpes-filter-btn" data-filter="*">Tout</a>
        <?php
          foreach ($types as $type): ?>
              <a href="#" class="multimedialpes_btn multimedialpes_btn-<?= $type->id ?> multimedialpes-filter-btn" data-filter='[data-type="<?= $type->id ?>"]'><?= $type->title ?></a>
          
          <?php endforeach; ?>
      </div>
      <div class="grid">
    
    <?php
    if ($candidates_data->have_posts()):
      while ($candidates_data->have_posts()): $candidates_data->the_post();
        $type = $types[get_post_meta( get_the_ID(), 'candidat_type', true )];
        ?>
          <figure class="multimedialpes_card" data-type="<?= $type->id ?>">
              <div class="multimedialpes_card__hero">
                  <img src="<?= get_post_meta( get_the_ID(), 'candidat_thumbnail', true ) ?>" alt="multimedialpes_card" class="multimedialpes_card__img">
              </div>
              <div class="multimedialpes_card__content">
                  <div class="multimedialpes_card__title">
                      <h1 class="multimedialpes_card__heading"><?= the_title(); ?></h1>
                  </div>
                  <div class="multimedialpes_card__tags">
                      <div class="multimedialpes_card__tag multimedialpes_card__tag--<?= $type->id; ?>"><?= $type->title ?></div>
                  </div>
                  <p class="multimedialpes_card__description"><?= wp_trim_words(get_post_meta( get_the_ID(), 'candidat_description', true )) ?></p>
                  <div class="multimedialpes_card__footer">
                      <div class="multimedialpes_card__details">
                        <?php
                          foreach (get_post_meta( get_the_ID(), 'candidat_contributors', true ) as $contributor):
                            ?>
                              <div class="multimedialpes_card__detail"><span class="emoji"><i class="fas fa-user"></i></span> <?= $contributor ?></div>
                          <?php endforeach; ?>
                      </div>
                      <div class="multimedialpes_card_action">
                          <a href="<?= the_permalink() ?>" class="multimedialpes_btn multimedialpes_btn-outline-<?= $type->id ?> js-multimedialpes-view"><i class="fas fa-eye"></i> Voir</a>
                      </div>

                  </div>
              </div>
          </figure>
      <?php
      endwhile;
      ?>
        <div id="candidate-modal-wrapper">
            <div id="candidate-modal" class="multimedialpes_card single">

            </div>
        </div>
        </div>
        </div>
    
    <?php
    endif;
    return $content . ob_get_clean();
  }

?>

