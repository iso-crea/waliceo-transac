<?php
$title = smile_field_get_value($node, 'field_block_title');
$bubble_image = file_create_url(smile_field_get_value($node, 'field_bubble_image', 'uri'));
$field = field_view_field('node', $node, 'field_fc_partners_image');
?>
<div class="partners-block">
  <div class="title"><?php echo $title ?><?php if (!empty($bubble_image)) echo '<img src="' . $bubble_image . '" />'?></div>
  <div class="partner-list-block"><?php echo render($field) ?></div>
</div>
<script>
/*(function($) {
  $(document).ready(function() {
     // Add link value from image to the sibling text.
     jQuery(".partner-logo-link a").each(function(){
       img_lnk = jQuery(this).attr("href");
       orginal_partner_text = jQuery(this).parent().next('.partner-name').text();
       link = '<a href="' + img_lnk +'">' + orginal_partner_text +'</a>';
       jQuery(this).parent().next('.partner-name').html(link);
    });
  });
}(jQuery));      REMOVED BY ERMAH, NOT USEFULL ANY MORE*/
</script>

