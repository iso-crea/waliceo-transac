<?php
$logo_uri   = smile_field_get_value($node, 'field_logo', 'uri');
$logo_alt   = smile_field_get_value($node, 'field_logo', 'alt');
$logo_title = smile_field_get_value($node, 'field_logo', 'title');
?>
<div id="block-logo">
    <a href="/" title="<?php print t('Accueil'); ?>" rel="home" id="logo">
        <img src="<?php echo file_create_url($logo_uri)?>" alt="<?php echo $logo_alt;?>" title="<?php echo $logo_title;?>" />
    </a>
</div>
<div id="block-top">
  <div id="block-top-elements">
    <div id="block-menu-top">
      <?php
        $menu_tree = i18n_menu_translated_tree('menu-menu-top', $GLOBALS['language']->language);
        echo render($menu_tree);
      ?>
    </div>
    <div style="float:left">
      <div id="block-font-size-links"> <a class="mini" href="#">a</a> / <a class="maxi" href="#">A</a></div>
      <div id="block-client-link"><?php echo l('ESPACE CLIENT', 'user');?></div>
      <?php if ($user->uid) : ?>
        <div class="disconnect_link"><a href="/user/logout/"><?php echo t('Logout');?></a></div>
      <?php endif;?>
    </div>
  </div>
  <div id="block-menu-main">
    <?php
      $menu_tree = i18n_menu_translated_tree('main-menu', $GLOBALS['language']->language);
      echo render($menu_tree);
    ?>
  </div>
  <?php if (!drupal_is_front_page()):?>
  <div id="block-breadcrumb">
  <?php echo get_breadcrumbs();?>
  </div>
  <?php endif;?>
</div>
