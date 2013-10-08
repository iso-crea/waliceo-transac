<?php
/**
 * @file
 * Template to render a product in product list page.
 *
 * @package
 *   maliceo
 */
global $base_path;
$wrapper = entity_metadata_wrapper('node', $node);
$fields  = maliceo_products_list_render_services_fields($wrapper);
$link_more_info   = maliceo_get_div_link(t('En savoir +'), $node_url, array());
$price_box_prefix = '';
$get_salesquote = '';
// Retrieve the price.
$price = $wrapper->field_price->value() / 100;
$product_id = $wrapper->nid->value();
if( module_exists('maliceo_commerce') &&  rules_condition_has_filled_in_form()) :
  $price = maliceo_commerce_get_formatted_price(maliceo_commerce_get_price($wrapper, 'field_policy_reference'));
  $add_to_cart_form = render($content['field_policy_reference']);
  if ( module_exists('maliceo_salesquote') ):
      $get_salesquote = '<a class="form-devis popin-devis" rel="lightmodal[|width:400px; height:160px;]" href="' . $base_path . 'ajax/sales-quote-form/' . $product_id .'">' .
                    t('Get a sales quote') . '</a>';
  endif;
else:
  $add_to_cart_form = '<a class="form-submit" href="' .
                    $base_path . 'souscrire/' . $product_id .
                    '?destination=' . current_path() . '">' .
                    t('Devis en ligne') . '</a>';
  $price_box_prefix = t('à partir de');
endif;

if (!module_exists('maliceo_commerce')){
  if (empty($price)){
      // Provide a default value when none is provided and module is disabled.
      $price = 0;
  }
}
$price = ( $price ? $price . ' €' : '0€');

$price_for_disp = $price; //maliceo_commerce_get_formatted_price($price);
$price_for_disp = str_replace(',00 ', '', $price_for_disp);
$price_for_disp = str_replace(' ', '', $price_for_disp);
$price_for_disp = str_replace('€€', '€', $price_for_disp);

if ( strlen($price_for_disp) > 5) {
    $price_for_disp = '<span style="font-size:0.75em">' . $price_for_disp . '</span>';
}

$price_box = '<div class="price-box-top-text">' . $price_box_prefix . '</div>' .
             '<div class="price">' .
             $price_for_disp .
             '</div>' .
             '<div class="price-box-bottom-text">' . t('par mois') . '</div>' .
             '<div class="price-box-add-btn">' . $add_to_cart_form . '</div>';
if ( $get_salesquote ) {
    $price_box .= '<div class="salesquote-link clearfix">' . t('or') . '<br />' . $get_salesquote . '</div>';
}

$product_short_desc = $wrapper->field_short_desc->value();
$title_link       = maliceo_get_h2_link($title, $node_url);
$price_box_top    = $price_box . '<div class="price-more-info">' . $link_more_info . '</div>';
$price_box_bottom = $price_box /* . $title_link . $product_short_desc */ ;
$universe         = $wrapper->field_policy_reference->field_univers_ref->title->value();
?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>" data-univers="<?php print $universe; ?>" data-name="<?php print $wrapper->title->value(); ?>" data-price="<?php print $price; ?>">
  <div class="node-inner">
      <div class="views-field views-field-title-top">
          <?php print $title_link; ?>
      </div>
      <div class="views-field price-box price-box-top">
          <?php echo $price_box_top;?>
      </div>
      <?php

      $i = 1;
      foreach ($fields as $field) :
        $class = ' views-field-odd';
        if ($i % 2 === 0) :
          $class = ' views-field-even';
        endif;
        $i += 1;
        ?>
        <div class="views-field-row views-field<?php echo $class?> views-field-row-<?php print $i - 1; ?>">
            <?php echo $field;?>
        </div>
      <?php
      endforeach;
      ?>
      <div class="views-field price-box price-box-bottom">
        <?php echo $price_box_bottom;?>
      </div>
      <div class="views-field views-field-title-link"><?php echo $title_link; ?></div>
      <div class="views-field-prod-desc"><?php echo $product_short_desc['value']; ?>&nbsp;</div>
   </div> <!-- /node-inner -->
</div> <!-- /node-->
