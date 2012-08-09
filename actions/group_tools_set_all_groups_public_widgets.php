<?php

$count = 0;
function au_runonce_enable_widgets($result, $getter, $options){
  // $result is a group
  $result->profile_widgets == "yes";
  
  global $count;
  $count++;
}

$options = array(
    'types' => array('group'),
    'limit' => 0,
);

// using ElggBatch because there may be many, many groups in the installation
// try to avoid oom errors
$batch = new ElggBatch('elgg_get_entities', $options, 'au_runonce_enable_widgets', 25);

system_message('success');
forward(REFERER);