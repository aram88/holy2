<?php
App::uses('AppModel', 'Model');
/**
 * GalleryGroup Model
 *
 * @property Gallery $Gallery
 */
class GalleryGroup extends AppModel {
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
				'message' => 'Դուք պետք է լրացնեք անունը',
				'last' => false, // Stop validation after this rule
				
			),
		),
		'image' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Դուք պետք է ընտրեք նկարը',
				'allowEmpty' => false,
				
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
		'Gallery' => array(
			'className' => 'Gallery',
			'foreignKey' => 'gallery_group_id',
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

}?>