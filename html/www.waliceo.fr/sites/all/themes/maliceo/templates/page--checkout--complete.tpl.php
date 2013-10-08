<?php
/* 
 * Some variables ($contract_date... ) come from maliceo_cart_preprocess_page().
 */

?>
<style>
</style>
<div id="page" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <!-- ______________________ HEADER _______________________ -->
  <div id="header">
      <div id="header-region">
        <?php echo render($page['header']); ?>
     </div>
</div>
  <!-- ______________________ MAIN _______________________ -->

  <div id="main" class="clearfix">
    <div id="content">
      <div id="content-inner" class="inner column center">

        <?php if ($breadcrumb || $title|| $messages || $tabs || $action_links): ?>
          <div id="content-header">

            <?php if ($title): ?>
              <h1 class="title"><?php print $title; ?></h1>
            <?php endif; ?>

            <?php print render($title_suffix); ?>
            <?php print $messages; ?>
            <?php print render($page['help']); ?>

            <?php if ($tabs): ?>
              <div class="tabs"><?php print render($tabs); ?></div>
            <?php endif; ?>

            <?php if ($action_links): ?>
              <ul class="action-links"><?php print render($action_links); ?></ul>
            <?php endif; ?>

          </div> <!-- /#content-header -->
        <?php endif; ?>

        <div id="content-area">

           <div class="block block-system block-content block-system-content clearfix" id="block-system-main">
              <div style="font-size: 1.4em" class="checkout-header">
                <img src="/sites/all/themes/maliceo/images/css/red-arrow.png">
                <?php echo t('Your contract will start on <span class="text-highlight">@contract_date</span>',array('@contract_date' => $contract_date )); ?>
                <br/>
                <?php echo t('Your tariff is computed on the basis of @tariffs.',array('@tariffs' => $contract_tariff_date )); ?>
                <div class="separator"></div>
              </div>

              <div class="block-inner">
                <div class="content">
                  <div class="subscription-finished">
                    <div class="header"><?php echo t('Checkout complete'); ?></div>
                    <div class="detail">
                        <?php echo t('A confirmation has been sent by email, with your login and password to access your personal page on Waliceo.');
                        // Form will only show a confirmation message, which has been altered (maliceo_cart_form_alter).
                        print render($page['content'])                        
                        ?>

                    </div>
                  </div>
                  <div class="subscription-files subscription-file-download">
                    <div class="header"><?php echo t('Your documents to download: ');?></div>
                    <div class="detail">
                      <div class="file-download-block"><div class="file-download-link"><a href="<?php echo variable_get('maliceo_lnk_terms_of_use','/sites/default/files/maliceo_checkout_complete/condition_generales__' . $product_title . '.pdf');?>"><?php echo t('Terms of use');?></a></div></div>
                      <div class="file-download-block"><div class="file-download-link"><a href="<?php echo variable_get('maliceo_lnk_terms_of_acceptance','/sites/default/files/maliceo_checkout_complete/condition_adhesion__' . $product_title . '.pdf');?>"><?php echo t('Terms of acceptance');?></a></div></div>
                      <div class="file-download-block"><div class="file-download-link"><a href="<?php echo variable_get('maliceo_lnk_internal_rules','/sites/default/files/maliceo_checkout_complete/reglement__' . $product_title . '.pdf');?>"><?php echo t('Internal rules');?></a></div></div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="subscription-files subscription-file-upload">
                    <div class="header"><?php echo t('Please provide us : ');?></div>
                    <div class="detail">
                      <div class="file-upload-block">
                        <label><?php echo t('Your social security attestation');?> :</label>
                        <?php
                            print render(drupal_get_form('ssa_form_upload'));
                        ?>
                      </div>
                      <div class="file-upload-notes">
                        <?php echo t('Maximum filesize : 100 Mo. Accepted format : jpeg, pdf');?>
                      </div>
                      <div class="file-upload-block">
                        <label><?php echo t('Your health checks attestation');?> :</label>
                        <?php
                            print render(drupal_get_form('hca_form_upload'));
                        ?>
                      </div>
                      <div class="file-upload-notes">
                        <?php echo t('Maximum filesize : 100 Mo. Accepted format : jpeg, pdf');?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>              
            </div>          
          <!-- block-system-->
        </div>
<!-- blocs de droite -->
<div id="co-side-bloc-1" class="co-side-bloc">
  <div class="step">
    <div class="display">
      <div class="label"><?php echo t('step');?></div>
      <div class="step-number">3/3</div>
      <div class="my-info"><?php echo t('Checkout succeeded');?></div>
    </div>
  </div>
  
  <div class="help">
    <div class="question"><?php echo t('need help');?></div>
    <div class="phone"><?php echo variable_get('maliceo_hotline','09 86 86 00 86');?></div>
    <div class="link-contact">
      <a rel="lightframe[|width:650px;height:680px;]" href="http://adrea.viatelecom.com/client.php" onclick="jQuery('#bottomNavClose').css({'margin-left': '642px'});"><?php echo t('visio');?></a>
      <a rel="lightframe[|width:650px;height:680px;]" href="http://adrea.viatelecom.com/client.php" onclick="jQuery('#bottomNavClose').css({'margin-left': '642px'});"><img src="/sites/all/themes/maliceo/images/icon-screen.png"></a>
    </div>
    <div class="link-contact">
      <a rel="lightframe[|width:650px;height:630px;]" href="http://adrea.viatelecom.com/waliceo_chat.php" onclick="jQuery('#bottomNavClose').css({'margin-left': '642px'});"><?php echo t('chat');?></a>
      <a rel="lightframe[|width:650px;height:630px;]" href="http://adrea.viatelecom.com/waliceo_chat.php" onclick="jQuery('#bottomNavClose').css({'margin-left': '642px'});"><img src="/sites/all/themes/maliceo/images/icon-speech.png"></a>
    </div>
  </div>
</div>
<!-- fin blocs de droite -->

        <?php print $feed_icons; ?>

      </div>
    </div> <!-- /content-inner /content -->

    <?php if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="column sidebar second">
        <div id="sidebar-second-inner" class="inner">
          <?php print render($page['sidebar_second']); ?>
        </div>
      </div>
    <?php endif; ?> <!-- /sidebar-second -->

  </div> <!-- /main -->

  <!-- ______________________ FOOTER _______________________ -->

  <?php if ($page['footer']): ?>
    <div id="footer">
      <?php print render($page['footer']); ?>
      <div class="clearboth"></div>
    </div> <!-- /footer -->
  <?php endif; ?>

</div> <!-- /page -->

