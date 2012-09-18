<?php

// this could take a while...
set_time_limit(0);

// define our deletion action
function au_runonce_remove_broken_widgets($result, $getter, $options){
  global $deletedwidgetcount;
  // $result is a widget
  $result->delete();
  $deletedwidgetcount++;
}


// get all registered widget types

$widgets_config = elgg_get_config('widgets');

$handlers = array_keys($widgets_config->handlers);
$handler_list = '';

foreach ($handlers as $handler) {
  if (!$handler_list) {
    $handler_list .= "'{$handler}'";
  }
  else {
    $handler_list .= ",'{$handler}'";
  }
}

$dbprefix = elgg_get_config('dbprefix');

$options = array(
    'types' => 'object',
    'subtypes' => 'widget',
    'limit' => 0,
    'joins' => array("JOIN {$dbprefix}private_settings ps ON e.guid = ps.entity_guid"),
    'wheres' => array("ps.name = 'handler' AND ps.value NOT IN({$handler_list})")
);
    
// using ElggBatch because there may be many, many widgets in the installation
// try to avoid oom errors
$batch = new ElggBatch('elgg_get_entities', $options, 'au_runonce_remove_broken_widgets', 25, false);

global $deletedwidgetcount;
system_message(elgg_echo('au_runonce:remove_broken_widgets:removed', array($deletedwidgetcount)));
forward(REFERRER);