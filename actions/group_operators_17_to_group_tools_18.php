<?php

$db_prefix = elgg_get_config('dbprefix');

// overview
// we need to update the relationship name from 'operator' to 'group_admin'
// we also need to enable group administration on all groups

// part 1 - update relationship name
$q = "
UPDATE {$db_prefix}entity_relationships
SET relationship = 'group_admin'
WHERE relationship = 'operator'
";

if(update_data($q)){
  system_message(elgg_echo('au_runonce:group_operator:relationship:success'));
}
else{
  register_error(elgg_echo('au_runonce:group_operator:relationship:fail'));
}


// part 2 - set all groups to allow multiple admins
// set metadata on all groups - $group->group_multiple_admin_allow_enable = 'yes'
$count = 0;
function au_runonce_multiple_admin($result, $getter, $options){
  // $result is a group
  $result->group_multiple_admin_allow_enable = 'yes';
  
  global $count;
  $count++;
}

$options = array(
    'types' => array('group'),
    'limit' => 0,
);

// using ElggBatch because there may be many, many groups in teh installation
// try to avoid oom errors
$batch = new ElggBatch('elgg_get_entities', $options, 'au_runonce_multiple_admin', 25);

global $count;
if($count > 0){
  system_message(elgg_echo('au_runonce:group_operators:allow:success', array($count)));
}
else{
  system_message(elgg_echo('au_runonce:group_operators:allow:fail', array($count)));
}

forward(REFERER);