<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>">
	<div class="node-inner">
        <?php if (!$page): ?>
          <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
        <?php endif; ?>
        <div class="content univers">
           <div class="produit_description">
               <?php echo smile_field_get_value($node, 'field_page_rich_text','safe_value'); ?>
           </div>
           <?php
           $video = smile_field_get_value($node, 'field_video', 'video_id');
           $bg_img_url = file_create_url(smile_field_get_value($node, 'field_image_texte_riche', 'uri'));
           $img_text   = smile_field_get_value($node, 'field_richtext_article', 'safe_value');
           $sub_title = smile_field_get_value($node, 'field_sub_title');
           $video_rich_text = smile_field_get_value($node, 'field_video_rich_text');

           if ( $sub_title ) :
               echo '<h2>' . $sub_title . '</h2>';
           endif;
           ?>
           <div class="produit_button_subscribe">
              <?php

                $related_shop_id = maliceo_shop_id_by_universe($node->nid);
                echo l(smile_field_get_value($node, "field_titre_bouton_souscription"),
                           'node/' . $related_shop_id,array('html' => TRUE, ))
              ?>
           </div>

           <?php
           if ( $img_text ) :
               echo '<div class="univers_produit_texte_riche">' . $img_text . '</div>';
           endif;
           if ($video):
           ?>
           <div class="block-video" style="background: url(<?php echo $bg_img_url;?>) no-repeat;">
             <div class="video-wrapper">
             <?php
             //echo '<img src="'.$bg_img_url.'">';
             echo theme('youtube_video',  array('video_id'=>$video, 'youtube_size'=>variable_get('youtube_video_300x200','200x200')));
             //echo render($content['field_youtube_link']);
             echo '<div id="link_to_all_videos">'.l(t('All our videos on'),variable_get('youtube_channel_url','http://www.youtube.com/')).'&nbsp;
                <img src="/sites/all/themes/maliceo/images/youtube.png" width="40" height="16" id="youtube-logo" alt="YouTube logo" /></div>';
             ?>
             </div>
           </div>
           <?php print $video_rich_text; ?>
           <?php endif;?>
        </div>
	</div> <!-- /node-inner -->
</div> <!-- /node-->

