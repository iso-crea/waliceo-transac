<?php
$title_rich_text = smile_field_get_value($node, 'field_titre_texte_riche_', 'safe_value');
$body_rich_text = smile_field_get_value($node, 'field_corps_texte_riche', 'safe_value');
$field_link_in_red_button_url = smile_field_get_value($node, 'field_link_in_red_button', 'url');
$field_link_in_red_button_title = smile_field_get_value($node, 'field_link_in_red_button', 'title');
?>
<div class="products-block-wrapper">
  <div class="products-block">
    <div class="products-block-title">
    <?php
    echo $title_rich_text;
    ?>
    </div>
    <div class="products-block-body">
    <?php
    echo $body_rich_text;
    ?>
    </div>
  </div>
  <?php
  // Only display link when a URL was provided.
  if (!empty($field_link_in_red_button_url)) :
  ?>
    <div class="products-block-btn-compare-wrapper">
      <?php print '<a href="' . $field_link_in_red_button_url . '">' . $field_link_in_red_button_title . '</a>'; ?>
    </div>
  <?php
  endif;
  ?>
</div>
<!-- / products-block-wrapper -->