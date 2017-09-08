<?php
App::uses('AppModel', 'Model');
/**
 * Qgroup Model
 *
 * @property Question $Question
 */
class Qgroup extends AppModel {
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
				'message' => 'Ô´Õ¸Ö‚Ö„ ÕºÕ¥Õ¿Ö„ Õ§ Õ¬Ö€Õ¡Ö�Õ¶Õ¥Ö„ Õ¡Õ¶Õ¾Õ¡Õ¶ Õ¤Õ¡Õ·Õ¿Õ¨',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'qgroup_id',
			'dependent' => false,
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