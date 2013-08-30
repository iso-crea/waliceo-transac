<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */

foreach ($view->result as $row):
  $wrapper = entity_metadata_wrapper('node', node_load($row->nid));
  $left_headers = maliceo_products_list_render_services_fields_headers($wrapper);
$universe = $wrapper->field_policy_reference->field_univers_ref->value();
//$universe = $wrapper->field_policy_reference->field_univers_ref->title->value();

// Reorder the left headers
/*
usort($left_headers, function($a, $b) use ($universe) {
    $title = $universe->field_title[LANGUAGE_NONE][0]['machine'];
    $aOrder = variable_get('headers_' . $title . '_' . $a['field_name']);
    $bOrder = variable_get('headers_' . $title . '_' . $b['field_name']);
    return $aOrder - $bOrder;
  });
  */
  break;
endforeach;




?>
<?php
/*// get the advantages bloc information
if (!empty($universe->field_advantage_title)) {
  $advantage_title = $universe->field_advantage_title['und'][0]['value'];
  $advantage_text = $universe->field_advantage_text['und'][0]['value'];
}*/

// Build left header cells column and description cells column.
$description_cells = '';
$header_rows_cells = '';
$i = 1;
foreach ($left_headers as $left_header) :
$class  = '';
$offset = '1em';
if (!empty($left_header['is_highlighted'])) :
  $class  = ' strong ';
$offset = 0;
endif;
$oddeven = ' views-field-odd ';
if ($i % 2 === 0):
  $oddeven = ' views-field-even ';
endif;
$i += 1;

// Build description column (tooltips).
$description_cells .= '<div class="views-field views-field-row views-field-header views-field-row-' . ($i - 1) . ' ' . $oddeven . 'service-tooltip-box">';
if ( isset($left_header['description']) && $left_header['description'] ) :
  $description_cells .= '<a class="service-tooltip" href="#">'
    . ' <img src="/sites/all/themes/maliceo/images/icon_quest.png" class="clearfix" alt="Infos" />'
    . ' <div class="service-tooltip-classic">'
    . strip_tags($left_header['description'],'<br /><br/><br><BR /><BR/><BR>')
    . '</div></a>';
endif;
$description_cells .= '</div>';

$style = 'style="padding-left:' . $offset . ';"';
$header_rows_cells .= '<div class="views-field views-field-row views-field-row-' . ($i - 1) . ' views-field-header' . $class  . $oddeven . '" ' . $style . '>' .
  $left_header['label'] .
  '</div>';
endforeach;
?>
<?php if (!empty($title)): ?>
<h3><?php print $title; ?></h3>
<?php endif; ?>
<div class='views-row view-row-header'>
  <div class="views-field views-field-header views-field-title-top"></div>
  <div class="price-box price-box-top views-field views-field-header">
  <p class="info">
<?php echo t("Survolez un élément pour obtenir plus d'informations");?>
  </p>
  </div>
<?php
 /* if (isset($advantage_title)) :
    print '<div class="advantage-title">' . $advantage_title . '</div>';
    print '<div class="advantage-text">' . $advantage_text . '</div>';
  endif;*/
?>
<?php
  echo $header_rows_cells;
?>
<div class="views-field views-field-header price-box"></div>
  </div>
  <div class="views-row views-row-tooltip">
  <div class="views-field views-field-header views-field-title-top"></div>
  <div class="views-field views-field-header price-box price-box-top"></div>
<?php echo $description_cells?>
  <div class="views-field views-field-header price-box"></div>
  </div>
<?php foreach ($rows as $id => $row): ?>
  <div class="<?php print $classes_array[$id]; ?> views-row-product-content">
<?php print $row; ?>
  </div>
<?php endforeach; ?>
