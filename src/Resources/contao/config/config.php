<?php

/**
 * Backend modules
 */
Contao\ArrayUtil::arrayInsert($GLOBALS['BE_MOD'], 1, array(
    'system' => array(
		'formdata' => array
		(
			'tables'      => array('tl_formdata'),
            'icon'        => 'system/themes/flexible/images/form.gif'
		)
    )
));


?>