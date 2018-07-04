<?php

/**
 * Backend modules
 */
array_insert($GLOBALS['BE_MOD'], 1, array(
    'system' => array(
		'formdata' => array
		(
			'tables'      => array('tl_formdata'),
            'icon'        => 'system/themes/flexible/images/form.gif'
		)
    )
));

/* Catch the form and save in DB */
$GLOBALS['TL_HOOKS']['processFormData'][] = array('Formdata', 'catchAndSaveFormData');


?>