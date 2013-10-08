<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>"
  <?php print $rdf_namespaces; ?>>

<head profile="<?php print $grddl_profile; ?>">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <?php print $analytics; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip">
    <a href="#main-menu"><?php print t('Jump to Navigation'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print (!empty($session_clear)?$session_clear:'')?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <script type="text/javascript">
  // google analytics > Track newsletter subscription
  var universeName = '';
  if ( jQuery('h1.title .smaller').length != 0 ) {
    universeName = jQuery('h1.title').text();// get universe name
  }
  jQuery('.simplenews-subscribe')[0].setAttribute('onsubmit', "_gaq.push(['_trackEvent', '" + universeName + "', 'Inscription newsletter']);return true;");

  // google analytics > page tracking
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33604797-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  </script>
</body>
</html>
