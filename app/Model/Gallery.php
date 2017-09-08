<?php
App::uses('AppModel', 'Model');
/**
 * Gallery Model
 *
 * @property GalleryGroup $GalleryGroup
 */
class Gallery extends AppModel {
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'GalleryGroup' => array(
			'className' => 'GalleryGroup',
			'foreignKey' => 'gallery_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}?>