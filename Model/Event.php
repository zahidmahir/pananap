<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 */
class Event extends AppModel {

	public $actsAs = array(
		'Upload.Upload' => array(
			'photo'
		)
	);
}
