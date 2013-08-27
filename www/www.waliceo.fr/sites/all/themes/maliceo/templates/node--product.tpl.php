<?php $node_wrapper = entity_metadata_wrapper('node', $node); ?>
<div id="node-<?php print $node->nid; ?>" class="node node-<?php print $node->type; ?> node-promoted <?php print $language; ?>">
    <div class="node-inner">

      <div class="content">

        <div class="product-desc product-verbatim">
            <?php $desc = $node_wrapper->field_short_desc->value(); ?>
            <?php print $desc['value']; ?>
        </div>

        <div class="product_button_subscribe">
            <?php $btn = $node_wrapper->field_titre_bouton_souscription->value(); ?>
            <?php print l($btn['value'],'souscrire/' . $node_wrapper->nid->value(),array('html' => TRUE, )); ?>
        </div>

        <div class="product-desc-detail product-verbatim">
            <?php $body = $node_wrapper->body->value(); ?>
            <?php print $body['value']; ?>
        </div>

        <div class="produit_point_fort_wrapper">
            <?php $services = $node_wrapper->field_services->value(); ?>
            <?php print $services['value']; ?>
        </div>

        <div class="produit_univers_wrapper">

   <h2><?php print $node_wrapper->field_linked_services_title->value(); ?></h2>

          <div class="field-collection-container clearfix product_univers_rollovers">

            <?php foreach ($node_wrapper->field_fc_linked_services->getIterator() as $service): ?>

                <div class="produit_univers">

                    <div class="produit_univers_service_img">
                        <?php $img = $service->field_image->value(); ?>
                        <?php print theme_image(array(
                          'path' => $img['uri'],
                          'width' => $img['width'],
                          'height' => $img['height'],
                          'alt' => '',
                        )); ?>
                    </div>

                    <div class="produit_univers_desc_rollover">
                        <?php print $service->field_description->value(); ?>
                    </div>

                    <div class="produit_univers_service_label">
                        <a href="<?php print $service->field_link_text->value(); ?>">
                            <?php print $service->field_title_linked_services->value(); ?>
                        </a>
                    </div>

                    <div class="produit_univers_service_mask">
                        <a href="<?php print $service->field_link_text->value();?>"><img src="/sites/all/themes/maliceo/images/masque-blanc.png" alt="" /></a>
                    </div>

                </div>

            <?php endforeach; ?>

            </div>

        </div>

        <br style="clear:both" />

      </div> <!-- /content -->

    </div> <!-- /node-inner -->

</div> <!-- /node-->
<script type="text/javascript">
(function($) {
  $('.produit_univers').hover(
    function() {
      $('.produit_univers_desc_rollover', this).fadeIn();
    },
    function() {
      $('.produit_univers_desc_rollover', this).fadeOut();
    }
  );
}(jQuery));
</script>
