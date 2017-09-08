<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 * @property Menu $Menu
 */
class Subscribe extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	var $useTable='subscribe';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'email' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Դուք պետք լրացնեք ձեր Էլ. Փոստը ',
				'last' => true, // Stop validation after this rule
			),
			'unique' => array(
				'rule'    => array('isUnique'),
				'message' => 'Այս Էլ. Փոստով արդեն  բաժանորդագրվել են խնդրում ենք փորձել մեկ ուրշը',
				'last' => true,
				),
			'mail' => array(
				'rule'    => array('email'),
				'message' => 'Այստեղ պտեք է գրել ձեր  Էլ. Փոստը',
				'last' => true,
				)
			),
			'text'=>array(
				'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Դուք պետք լրացնեք նամակի պարունակություն դաշտը',
				'last' => true, // Stop validation after this rule
				)
			)	
			
		);
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
}?>