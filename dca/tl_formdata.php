<?php

/**
 * Table tl_formdata
 */
$GLOBALS['TL_DCA']['tl_formdata'] = array
(

	// Config 
	'config' => array
	(
		'dataContainer'               => 'Table',
		'closed'                      => true,
		'notEditable'                 => true,
		'notCopyable'                 => true,
		'onload_callback' => array
		(
			#array('tl_formdata', 'xy'),
		),
		'onsubmit_callback' => array
		(
			#array('tl_formdata', 'xy')
		),
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary',
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('form_id DESC', 'id DESC'),
			'flag'                    => 1,
            'panelLayout'             => 'filter,search,limit',
		),
		'label' => array
		(
			'fields'                  => array('id', 'tstamp', 'form_id'),
			
            'label_callback'          => array('tl_formdata', 'labelLaoyut'),
            'group_callback'          => array('tl_formdata', 'groupName')
		),
		'global_operations' => array
		(
		),
		'operations' => array
		(
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_formdata']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_news_archive']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('protected'),
		'default'                     => 'form_id,formvalues'
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'form_id' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_formdata']['form_id'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
			'options_callback'        => array('tl_formdata', 'formNames'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'formvalues' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_formdata']['formvalues'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50', 'readonly'=> true),
			'sql'                     => "blob NULL"
		),
        
	)
);


class tl_formdata extends Backend
{
	
	/* Get the formular values */
	public function labelLaoyut($dc)
	{
		$values = "";

		foreach (deserialize($dc['formvalues']) AS $k => $v)
		{
			$values .= " <strong>".$k."</strong>: " . $v . "<br>";
		}

		$layout = "
		<div>
			<span style='color:#000;padding-right:3px; width: 30px;'>id: ".$dc['id']."</span>
			<span style='color:#b3b3b3;padding-right:3px; width: 60px;'>[".date("d.m.Y H:i", $dc['tstamp'])."]</span><br>
			<span style='color:#000;padding:7px 33px;display:inline-block;'>".$values."</span>
		</div>
		
		";
		
		return $layout;
		
	}
	/* Get the formular name */
	public function groupName($dc)
	{
		$result = $this->Database->prepare("SELECT * FROM tl_form where id=?")->execute( (int) $dc);
		
		if ($result->numRows > 0)
		{
			$arr = $result->row();
			return $arr['title'];
		}
		else
		{
			return "";
		}
	}

	/* Get the formular name */
	public function formNames($dc)
	{	
		$forms = array();
		
		$result = $this->Database->prepare("SELECT * FROM tl_form ")->execute();
		
		if ($result->numRows > 0)
		{
			$arr = $result->fetchAllAssoc();	
			foreach ($arr AS $k => $v ) {
				$forms[$v['id']] = $v['title'];
			}
			return $forms;
		}
		return "";
		
		
		
	}
	

	
}

