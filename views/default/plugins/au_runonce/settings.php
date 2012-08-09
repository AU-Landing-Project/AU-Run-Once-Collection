<?php

// not really settings, but a convenient place to launch the scripts from

echo elgg_echo('au_runonce:disclaimer') . "<br><br>";

// widget manager upgrade layout fix
echo "<h4>" . elgg_echo('au_runonce:wm_layout') . "</h4>";
echo elgg_echo('au_runonce:wm_description') . "<br><br>";
echo elgg_view('output/confirmlink', array('text' => elgg_echo('au_runonce:wm_runscript'), 'href' => elgg_get_site_url() . 'action/au_runonce/wm_17_18_layout', 'class' => 'au_runonce_run_script'));

echo "<br><br>";
// group operators => group tools 1.7 => 1.8 group admin migration
echo "<h4>" . elgg_echo('au_runonce:group_operators_migration') . "</h4>";
echo elgg_echo('au_runonce:group_operators_description') . "<br><br>";
echo elgg_view('output/confirmlink', array('text' => elgg_echo('au_runonce:group_operators_runscript'), 'href' => elgg_get_site_url() . 'action/au_runonce/group_operators_17_to_group_tools_18', 'class' => 'au_runonce_run_script'));

echo "<br><br>";
// tagtracker 1.7  => au_tagtracker_widget 1.8
echo "<h4>" . elgg_echo('au_runonce:tagtracker:upgrade') . "</h4>";
echo elgg_echo('au_runonce:tagtracker:upgrade:description') . "<br><br>";
echo elgg_view('output/confirmlink', array('text' => elgg_echo('au_runonce:tagtracker:upgrade:runscript'), 'href' => elgg_get_site_url() . 'action/au_runonce/tagtracker_17_to_au_tag_tracker_widget_18', 'class' => 'au_runonce_run_script'));

echo "<br><br>";
// Group tools - enable widgets on all closed groups
echo "<h4>" . elgg_echo('au_runonce:group_tools_widgets:upgrade') . "</h4>";
echo elgg_echo('au_runonce:group_tools_widgets:description') . "<br><br>";
echo elgg_view('output/confirmlink', array('text' => elgg_echo('au_runonce:tagtracker:upgrade:runscript'), 'href' => elgg_get_site_url() . 'action/au_runonce/group_tools_set_all_groups_public_widgets', 'class' => 'au_runonce_run_script'));


// just to push the unneccessary save input down a bit
echo "<div style='height:300px'></div>";
