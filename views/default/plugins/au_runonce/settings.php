<?php

// not really settings, but a convenient place to launch the scripts from

echo elgg_echo('au_runonce:disclaimer') . "<br><br>";

// widget manager upgrade layout fix
echo "<h4>" . elgg_echo('au_runonce:wm_layout') . "</h4>";
echo elgg_echo('au_runonce:wm_description') . "<br><br>";
echo elgg_view('output/confirmlink', array('text' => elgg_echo('au_runonce:wm_runscript'), 'href' => elgg_get_site_url() . 'action/au_runonce/wm_17_18_layout', 'class' => 'au_runonce_run_script'));




// just to push the unneccessary save input down a bit
echo "<div style='height:300px'></div>";
