<?php

$db_prefix = elgg_get_config('dbprefix');

// overview
// we need to update the widget handler from 'tagtracker' to 'au_tagtracker'

// part 1 - reset some widget settings
// do this before updating the handler so we can narrow down just to the ones we need to update
$count = 0;
function au_runonce_tagtracker_settings_update($result, $getter, $options){
  // $result is a widget
  $widget = $result;
  
  // pull in from existing widget
  $widget->num_display = $widget->tagtrack_count ? $widget->tagtrack_count : 10;
  $widget->eligo_tagfilter = htmlentities($widget->tag);
  
  // set defaults
  $widget->eligo_type = 'object';
  $widget->eligo_custom_select_options = 'au_tagtracker_custom_select';
  $widget->eligo_tagfilter_andor = 'or';
  $widget->eligo_displayby = 'recent';
  $widget->eligo_owners = 'all';
  $widget->eligo_sortby = 'date';
  $widget->eligo_sortby_dir = 'desc';
  
  global $count;
  $count++;
}

$options = array(
    'types' => array('object'),
    'subtypes' => array('widget'),
    'limit' => 0,
    'joins' => array("JOIN {$db_prefix}private_settings ps ON e.guid = ps.entity_guid"),
    'wheres' => array("ps.name = 'handler' AND ps.value = 'tagtracker'")
);

// using ElggBatch because there may be many, many groups in teh installation
// try to avoid oom errors
$batch = new ElggBatch('elgg_get_entities', $options, 'au_runonce_tagtracker_settings_update', 25);

global $count;
if($count > 0){
  system_message(elgg_echo('au_runonce:tagtracker:upgrade:success', array($count)));
}
else{
  register_error(elgg_echo('au_runonce:tagtracker:upgrade:fail', array($count)));
}


// part 2 - update handler name
$subtype = get_subtype_id('object', 'widget');

$q = "
UPDATE {$db_prefix}private_settings ps
JOIN {$db_prefix}entities e ON ps.entity_guid = e.guid
SET ps.value = 'au_tagtracker'
WHERE ps.value = 'tagtracker'
AND ps.name = 'handler'
AND e.subtype = {$subtype}
";

if(!update_data($q)){
  register_error(elgg_echo('au_runonce:generic:failure'));
}

forward(REFERER);