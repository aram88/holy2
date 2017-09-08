<?php
App::uses('AppModel', 'Model');
/**
 * Day Model
 *
 * @property Event $Event
 * @property Reading $Reading
 */
class Day extends AppModel {
/**
 * Display field
 */
	public $displayField = 'name';
/**
 * Validation rules
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Դուք պետք է լրացնեք անվան դաշտը',
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed
/**
 * hasMany associations
 */
	public $hasMany = array(
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'day_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Reading' => array(
			'className' => 'Reading',
			'foreignKey' => 'day_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
?>