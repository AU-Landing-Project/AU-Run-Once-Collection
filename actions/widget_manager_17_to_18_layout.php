<?php

// this does the heavy lifting
function mb_move_column($start_column, $end_column, $context){
  $db_prefix = elgg_get_config('dbprefix');
  $subtype = get_subtype_id('object', 'widget');

  // construct our query
  $q = "
  UPDATE {$db_prefix}private_settings AS ps1
  JOIN {$db_prefix}entities e ON ps1.entity_guid = e.guid
  JOIN {$db_prefix}private_settings ps2 ON ps1.entity_guid = ps2.entity_guid
  SET ps1.value = '{$end_column}'
  WHERE e.type = 'object'
  AND e.subtype = {$subtype}
  AND ps1.name = 'column'
  AND ps1.value = '{$start_column}'
  AND ps2.name = 'context'
  AND ps2.value = '{$context}'";

  return update_data($q);
}

$results = array();

/*
*
*       Fix group widgets layout
*/

// first move all groups widgets from column 1 to a temporary non-existant column
$results[] = mb_move_column(1, 'mb_tmp_column', 'groups');

// now move all groups widgets from column 3 to column 1
$results[] = mb_move_column(3, 1, 'groups');

// now move the tmp column widgets to column 3
$results[] = mb_move_column('mb_tmp_column', 3, 'groups');

/*
*
*       Fix dashboard widgets layout
*/


/*
*
*       Fix index widgets layout
*/


/*
*
*       Fix profile widgets layout
*/

// see if we were successful or not
if(in_array(FALSE, $results)){
  register_error(elgg_echo('au_runonce:generic:failure'));
}
else{
  system_message(elgg_echo('au_runonce:generic:success'));
}

forward(REFERER);