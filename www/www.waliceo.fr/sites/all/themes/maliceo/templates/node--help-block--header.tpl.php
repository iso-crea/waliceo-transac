<?php
$text_foot = smile_field_get_value($node, 'field_texte_pied');
$phone_number  = smile_field_get_value($node, 'field_text');
?>
<div id="block-contact" class="text-centered">
  <p id="block-contact-phone"><?php echo $phone_number ?></p>
  <div id="block-contact-bottom-half">
    <div class="link-contact">
      <a rel="lightframe[|width:650px; height:680px;]" href="http://adrea.viatelecom.com/client.php" onclick="jQuery('#bottomNavClose').css({'margin-left': '642px'});"><?php echo t('visio') ?></a>
      <a rel="lightframe[|width:650px; height:680px;]" href="http://adrea.viatelecom.com/client.php" onclick="jQuery('#bottomNavClose').css({'margin-left': '642px'});"><img src="/sites/all/themes/maliceo/images/icon-screen.png"></a>
    </div>
    <div class="link-contact">
      <a rel="lightframe[|width:650px;height:630px;]" href="http://adrea.viatelecom.com/waliceo_chat.php" onclick="jQuery('#bottomNavClose').css({'margin-left': '642px'});"><?php echo t('chat') ?></a>
      <a rel="lightframe[|width:650px;height:630px;]" href="http://adrea.viatelecom.com/waliceo_chat.php" onclick="jQuery('#bottomNavClose').css({'margin-left': '642px'});"><img src="/sites/all/themes/maliceo/images/icon-speech.png"></a>
    </div>
  </div>
</div>

