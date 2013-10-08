<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>">
	<div class="node-inner">
    
    <?php if (!$page): ?>
      <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
 	<div class="content">
      <?php
        print render($content['body']);

        $articles = field_get_items('node', $node, 'field_articles');
        if (!empty($articles)): 
            print theme_render_template(path_to_theme().'/templates/liste-de-blocs_articles.tpl.php',array('articles'=>$articles));
        endif;
       ?>
  	</div>
  	
       
	</div> <!-- /node-inner -->
</div> <!-- /node-->

