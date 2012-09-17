<?php

$english = array(
    'au_runonce:disclaimer' => "This is a collection of run-once script for very specific purposes.  They may bypass the Elgg API, directly modify the database, any number of things.  Running them more than once or running them when unneccessary will most likely cause more problems.  Use with care, and make sure you've made a backup before doing anything here.  Really, I would recommend not even having this plugin installed when not in use.",
    'au_runonce:generic:failure' => "Something appears to have gone wrong.  You did make a backup right?",
    'au_runonce:generic:success' => "Script ran successfully",
    
    /*
     * Group operators => Group Tools migration of group admin
     */
    'au_runonce:group_operators_migration' => "Group Operators 1.7 => Group Tools 1.8 Migration",
    'au_runonce:group_operators_description' => "Migrates multiple group admins managed by the group operators plugin in 1.7 to the Group Tools managed multiple-admins in 1.8",
    'au_runonce:group_operators_runscript' => "Run Group Operators Migration",
    'au_runonce:group_operator:relationship:fail' => "There was an issue converting operators to group admins",
    'au_runonce:group_operator:relationship:success' => "Group operators converted to group admins successfully",
    'au_runonce:group_operators:allow:fail' => "%s groups updated",
    'au_runonce:group_operators:allow:success' => "%s groups updated",
    
    /*
     * Widget Manager Layout Fix
     */
    'au_runonce:wm_layout' => "Widget Manager Layout Fix 1.7 => 1.8",
    'au_runonce:wm_description' => "If an elgg 1.7 installation was using widget manager, and upgraded to 1.8 with widget manager the layout of the widgets was not conserved.  Specifically the columns were switched in various contexts.  This script will revert all site widgets to the original layout.",
    'au_runonce:wm_runscript' => "Run Widget Manager Layout Fix",
    
    // tagtracker 1.7  => au_tagtracker_widget 1.8
    'au_runonce:tagtracker:upgrade' => "Tagtracker 1.7 => AU Tag Tracker Widget migration",
    'au_runonce:tagtracker:upgrade:description' => "This script takes existing tagtracker widgets from 1.7 and converts them to AU Tag Tracker Widgets in 1.8 keeping relevant settings and setting sane defaults for AU options not available in 1.7 so that widget contents should be the same on upgrade.",
    'au_runonce:tagtracker:upgrade:runscript' => "Run Tagtracker Upgrade Script",
    'au_runonce:tagtracker:upgrade:success' => "%s widgets upgraded",
    'au_runonce:tagtracker:upgrade:fail' => "%s widgets upgraded",
    
    // group tools enable widgets on all closed groups
    'au_runonce:group_tools_widgets:upgrade' => "Enable widgets on all closed groups (for group_tools)",
    'au_runonce:group_tools_widgets:description' => "Group tools allows closed groups to show widgets.  This script will turn this option on for all groups on the site.",
    'au_runonce:group_tools_enable_widgets:upgrade:runscript' => "Run Closed Group Enable Widgets Script",
    
    // remove broken widgets
    'au_runonce:remove_broken_widgets:removed' => '%s broken widgets removed',
    'au_runonce:remove_broken_widgets' => 'Remove Broken Widgets',
    'au_runonce:remove_broken_widgets:description' => "Widgets that no longer have valid handlers persist in the database and can cause issues in some cases when ordering clashes cause a valid widget to disappear (noticeable in widget manager).  This script will remove any existing widgets that are no longer in the system.<br>WARNING - make sure you have all widget related plugins (that you want active) enabled before running this script.",
    'au_runonce:remove_broken_widgets:runscript' => "Run the Broken Widget Removal Script?",
);
					
add_translation("en",$english);
