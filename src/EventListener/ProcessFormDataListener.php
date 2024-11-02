<?php

/*
 * This file is part of ContaoFormdataBundle.
 *
 * (c) Harald Huber
 *
 * @license LGPL-3.0-or-later
 */
 
namespace Hhcom\ContaoFormdataBundle\EventListener;

use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\Form;
use Contao\Database;


class ProcessFormDataListener
{
    public function __invoke(array $submittedData, array $formData, ?array $files, array $labels, Form $form): void
    {
		if($formData['saveInDatabase'] != "1")
			return;

		foreach ($submittedData AS $k => $v)
		{
			if (is_array($v))
			{
				$submittedData[$k] = implode(", ", $v);
			}
		}

		dump($submittedData);

		$set = array (
			'tstamp' => time(),
			'form_id' => $formData['id'],
			'formvalues' => serialize($submittedData)
		);

		Database::getInstance()->prepare("INSERT INTO tl_formdata %s")->set( $set )->execute();
    }
}

