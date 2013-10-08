<?php
/**
 * @file views-view.tpl.php
 * Main view template
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="page-produits-desc-entete">
      <?php print $header; ?>
    </div>
  <?php endif; ?>
  <?php if ($exposed): ?>
  <?php
  print maliceo_info_block_render();

  // Only show if last part of path isn't "form".
  $path = request_path();
  $path = array_reverse(explode('/', $path));

  $form_extra_url_suffix = variable_get('maliceo_form_extra_url_suffix', '/form');
  // Remove leading "/".
  $form_extra_url_suffix = substr($form_extra_url_suffix, 1);
  ?>
  <?php if ($path[0] !== $form_extra_url_suffix): ?>
    <div class="view-filters">
      <div class="item-list-label">
        <?php print t('Filter by: '); ?>
      </div>
      <?php
        // From maliceo_preprocess_views_view (template.php).
        // Rewriting the default exposed form (textfield) as a list of links.
        print theme('item_list', array('items' => $univers_options));
      ?>
    </div>
  <?php endif; ?>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php
  // Fix nasty bug.
  else:
    if ($_SESSION['cache_cleared'] !== TRUE) {
      drupal_flush_all_caches();
      $_SESSION['cache_cleared'] = TRUE;
      drupal_goto(request_uri());
    }
  endif;
  ?>

</div><?php /* class view */ ?>

<div style="display: none;" id="univers-advantage-title"><?php print $advantage_title;?></div>
<div style="display: none;" id="univers-advantage-description"><?php print $advantage_description;?></div>

<script type="text/javascript">
  
var universe_advantage_title = '';

(function($) {
  $('.view-row-header .views-field-row').each(function() {
    // Gets the "views-field-row-\d+" class.
    var klass = '';
    $.each(this.className.split(' '), function() {
      if (/views-field-row-\d+/.test('' + this)) {
        klass = '' + this;
      }
    });

    // Now check if it exists in the middle.
    if (!$.trim($('.views-row-product-content .' + klass).text()).length) {

      // Only $(this) is not enough, there is also the tooltip div to remove.
     // $('.' + klass).remove();
    }
  });

  // If there is missing fields, we need to add them.
  var nb = $('.view-row-header .views-field-row').length;
  $('.node-product').each(function() {
    for (var i = 1; i <= nb; i++) {
      if (!$('.views-field-row-' + i, this).length) {
        var evenodd = i % 2 ? 'views-field-odd' : 'views-field-even';
        $('<div></div>', {'className': 'views-field-row views-field ' + evenodd + ' views-field-row-' + i}).insertBefore($('.price-box-bottom', this));
      }
    }
  });

  $(".views-row-product-content").hover(
    function(){
      $(this).addClass('selected');
    },
    function(){
      $(this).removeClass('selected');
    }
  );
  // If the custom form has been submitted
  if ($('.form-item-quantity')) {
    $('body').addClass('form-filled');
    $('.form-item-quantity').remove();
  }

  $('.views-field-title-top').equalHeightColumns();
  $('.views-field-prod-desc').equalHeightColumns();
  for (var i=1; i<= $('.views-field-row').length; i++) {
    $('.views-field-row-' + i).equalHeightColumns();
  }

  // Google Analytics
  $('.form-devis').each(function() {
      // Get the node for this link.
      var node = $(this).closest('.node-inner').parent();
      $(this)[0].setAttribute('onclick', "javascript:_gaq.push(['_trackEvent', '" + node.data('univers') + "', 'demande de devis', '" + node.data('name') + "', '" + node.data('price').replace(/€/g, '').replace(/\s+/g, '') + "']);");
  });

  <?php if ($current_universe != 'pour-tout-monde') : ?>
    var current_universe = "<?php print $current_universe;?>";
    universe_advantage_title = "<p><?php print $advantage_title;?></p>";
  <?php endif;?>
  if (universe_advantage_title != '')
          display_advantage_block();

})(jQuery);

  // display the block of the advantages linked to a universe
  function position_advantage_block() {
    var adv_title_top = jQuery('.advantage_empty_block:first').position().top;
    var adv_title_left = jQuery('.views-field-row-1:first').position().left;
    var adv_desc_left = adv_title_left + 178;
    jQuery('#univers-advantage-title').css({position:"absolute", display:"", left:adv_title_left, top:adv_title_top});
    jQuery('#univers-advantage-description').css({position:"absolute", display:"", left:adv_desc_left, top:adv_title_top});
    setTimeout("position_advantage_block()",500);
  }

  function display_advantage_block() {
    //make space for the adv elements
    jQuery('<div class="advantage_empty_block">&nbsp;</div>').insertAfter('.price-box-top');
    var adv_height = jQuery('#univers-advantage-description').height();
    jQuery('.advantage_empty_block').css({height:adv_height + 10});
    position_advantage_block();
  }

</script>

<div class="clearboth"></div>
<div class="label_under_products_list">
<?php echo t('If you want to choose several guaranties'); ?>
</div>

<?php //The scripts and css below regard the salesquote form in the lightbox ?>
<script src="/sites/all/modules/maliceo/maliceo_salesquote/maliceo_salesquote.js"></script>
