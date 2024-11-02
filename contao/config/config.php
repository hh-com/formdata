<?php

/**
 * Backend modules
 */

// Contao\Files::getInstance()->rrdir('var/cache/dev/contao', true);
// Contao\Files::getInstance()->rrdir('var/cache/prod/contao', true);

Contao\ArrayUtil::arrayInsert($GLOBALS['BE_MOD']['system'], 0, array(
	'formdata' => array
	(
		'tables'      => array('tl_formdata'),
		'icon'        => 'system/themes/flexible/images/form.gif'
	)
)); 

?>