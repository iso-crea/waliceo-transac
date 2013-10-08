<?php
/**
 * overrides node.tpl.php
 * used for BOTH actu and article content-type.
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>">
	<div class="node-inner">


    <?php if (!$page){ ?>
      <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php } ?>
  	<div class="content">
  	
  	
        <?php
        // Only display subtitle when in univers context. 
        if (($node->type=='actu') && (strlen(strrpos($_SERVER['HTTP_REFERER'], "/news"))) > 0) :
        ?>
        <h2 class="actu_subtitle">
        <?php
        // Variable "subtitle" variable is set in maliceo_preprocess_node.
        echo $subtitle;
        ?>
        </h2>
      <?php 
        endif;

       if ($node->type=='actu'):  //display date if type="actu" only.?>
       <h1 class="actu_title">
        <?php
        echo $title;
        ?>
        </h1>
      <div class="submitted date"><?php print format_date($node->created, 'Moyen'); ?></div>
    <?php
        endif;
    
        echo '<div class="article_subtitle">';
        echo smile_field_get_value($node, 'field_subtitle','safe_value');
        echo '</div>'; // end of "article_subtitle"

        echo '<div class="article_rich_text">';
        echo smile_field_get_value($node, 'field_richtext_article');
        echo '</div>'; // article_rich_text"



  	    // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        //print render($content);
       ?>
  	</div>

    <?php if (!empty($content['links']['terms'])): ?>
      <div class="terms"><?php print render($content['links']['terms']); ?></div>
    <?php endif;?>

    <?php if (!empty($content['links'])): ?>
	    <div class="links"><?php print render($content['links']); ?></div>
	  <?php endif; ?>

    <?php if ($node->type == 'actu' && (!empty($content['field_slideshow']))) :?>
        <?php print render($content['field_slideshow']); ?>
    <?php endif; ?>

	</div> <!-- /node-inner -->
</div> <!-- /node-->

<?php print render($content['comments']); ?>
