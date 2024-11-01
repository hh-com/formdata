<?php
class Formdata extends \Controller
{

	
	/* Catch the formdata and save it in tl_formdata */
	public function catchAndSaveFormData($arrPost, $arrForm, $arrFiles)
	{

		if($arrForm['saveInDatabase'] != "1")
		return;

		foreach ($arrPost AS $k => $v)
		{
			if (is_array($v))
			{
				$arrPost[$k] = implode(", ", $v);
			}
		}

		$set = array (
			'tstamp' => time(),
			'form_id' => $arrForm['id'],
			'formvalues' => serialize($arrPost)
		);

		\Database::getInstance()->prepare("INSERT INTO tl_formdata %s")->set( $set )->execute();

	}

}
?>
