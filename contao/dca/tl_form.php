<?php

$GLOBALS['TL_DCA']['tl_form']['palettes']['default'] = str_replace
(
    'allowTags',
    'allowTags,saveInDatabase',
    $GLOBALS['TL_DCA']['tl_form']['palettes']['default']
);

$GLOBALS['TL_DCA']['tl_form']['fields']['saveInDatabase'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form']['saveInDatabase'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);


?>
