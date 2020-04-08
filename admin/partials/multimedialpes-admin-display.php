<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       contact@leoboyer.fr
 * @since      1.0.0
 *
 * @package    Multimedialpes
 * @subpackage Multimedialpes/admin/partials
 */
?>
<h1><?= get_admin_page_title() ?></h1>
<h2>Types de concours</h2>
<table class="widefat">
  <thead>
  <tr>
    <th class="row-title">Nom</th>
    <th>Catégorie de médias</th>
    <th></th>
  </tr>
  </thead>
  <tbody>
<?php foreach($types as $type): ?>
  <tr>
    <td class="row-title"><label for="tablecell"><?= $type->title ?></label></td>
    <td>
      <form method="post">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?= $type->id ?>">
        <select onchange="this.parentNode.submit()" name="media_type" required>
          <option <?= $type->media_type === "video" ? 'selected' : '' ?> value="video">Vidéo</option>
          <option <?= $type->media_type === "web" ? 'selected' : '' ?> value="web">Web</option>
          <option <?= $type->media_type === "graphics" ? 'selected' : '' ?> value="graphics">Graphique</option>
          <option <?= $type->media_type === "other" ? 'selected' : '' ?> value="other">Autre</option>
        </select>
      </form>
    </td>
    <td>
      <form method="post">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?= $type->id ?>">
        <button type="submit" class="button-primary delete-button"><?= __("Delete") ?></button></td>
        
      </form>
</tr>
<?php endforeach; ?>
  </tbody>
</table>
<h2>Ajouter un type de création</h2>
<p>Vous pouvez ajouter des types de créations disponibles pour chaque candidature. Chaque type de création correspond à un type de média: web, vidéo ou graphisme. Cela définit les informations qui seront demandées aux candidats.</p>
<p>La le type de média "autre" n'affichera que les champs de base.</p>
<form method="post">
    <input type="hidden" name="action" value="add">
  <p>
    <label for="nameField">Nom: </label>
    <input type="text" name="title" id="nameField" required>
  </p>
  <p>
    <label for="typeField">Catégorie de média: </label>
    <select name="media_type" id="typeField" required>
      <option value="video">Vidéo</option>
      <option value="web">Web</option>
      <option value="graphics">Graphique</option>
      <option value="other">Autre</option>
    </select><br>
  </p>
  <p>
    <?php
      submit_button( $text = __('Add'), $type = 'primary', $name = 'submit', $wrap = true, $other_attributes = null )
    ?>
  </p>
</form>
