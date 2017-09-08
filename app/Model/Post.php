<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 * @property Menu $Menu
 */
class Post extends AppModel {
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
				'last' => false, // Stop validation after this rule
			),
		),
	);

/**
 * belongsTo associations
 */
	public $belongsTo = array(
		'Menu' => array(
			'className' => 'Menu',
			'foreignKey' => 'menu_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	public $hasOne = array(
		'General' => array(
			'className'  => 'General',
			'foreignKey' => 'post_id',
			'dependent'  => true,
		)
	);
}
?>