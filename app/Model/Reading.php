<?php
App::uses('AppModel', 'Model');
/**
 * Reading Model
 *
 * @property Day $Day
 */
class Reading extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Դուք պետք է լրացնեք անվան դաշտը',
				
			),
		),
		'text' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Դուք պետք է լրացնեք տեքստի դաշտը',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Day' => array(
			'className' => 'Day',
			'foreignKey' => 'day_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>