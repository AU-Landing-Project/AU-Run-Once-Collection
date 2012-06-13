<?php

$english = array(
    'au_runonce:disclaimer' => "This is a collection of run-once script for very specific purposes.  They may bypass the Elgg API, directly modify the database, any number of things.  Running them more than once or running them when unneccessary will most likely cause more problems.  Use with care, and make sure you've made a backup before doing anything here.  Really, I would recommend not even having this plugin installed when not in use.",
    'au_runonce:generic:failure' => "Something appears to have gone wrong.  You did make a backup right?",
    'au_runonce:generic:success' => "Script ran successfully",
    
    /*
     * Widget Manager Layout Fix
     */
    'au_runonce:wm_layout' => "Widget Manager Layout Fix 1.7 => 1.8",
    'au_runonce:wm_description' => "If an elgg 1.7 installation was using widget manager, and upgraded to 1.8 with widget manager the layout of the widgets was not conserved.  Specifically the columns were switched in various contexts.  This script will revert all site widgets to the original layout.",
    'au_runonce:wm_runscript' => "Run Widget Manager Layout Fix",
);
					
add_translation("en",$english);