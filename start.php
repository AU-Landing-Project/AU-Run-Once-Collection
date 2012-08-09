<?php

function au_runonce_init(){
  elgg_extend_view('css/admin', 'au_runonce/css');
  
  // register actions for our run-once scripts
  // this allows us to limit access to admins, as well as other built-in security
  
  // updates the widgets layout in groups/index/dashboard in widget manager after an upgrade from 1.7 to 1.8
  elgg_register_action("au_runonce/wm_17_18_layout", elgg_get_plugins_path() . "au_runonce/actions/widget_manager_17_to_18_layout.php", 'admin');
  
  // updates group admins provided by group operators plugin in 1.7 to group tools multiple admins in 1.8
  elgg_register_action("au_runonce/group_operators_17_to_group_tools_18", elgg_get_plugins_path() . "au_runonce/actions/group_operators_17_to_group_tools_18.php", 'admin');
  
  // migrates 1.7 tagtracker widgets to 1.8 au_tagtracker_widgets
  elgg_register_action("au_runonce/tagtracker_17_to_au_tag_tracker_widget_18", elgg_get_plugins_path() . "au_runonce/actions/tagtracker_17_to_au_tag_tracker_widget_18.php", 'admin');
  
  // sets all groups to show public widgets (if closed group)
  elgg_register_action("au_runonce/group_tools_set_all_groups_public_widgets", elgg_get_plugins_path() . "au_runonce/actions/group_tools_set_all_groups_public_widgets.php", 'admin');
}

elgg_register_event_handler('init', 'system', 'au_runonce_init');