<?php
App::uses('AppModel', 'Model');
/**
 * Help Model
 *
 */
class Helpe extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $useTable = 'helpes';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'between' => array(
				'rule' => array('between',2,30),
				'message' => 'Ձեր անունը պետք է լինի 2-30 սիմվոլի չափով ',
				'allowEmpty' => false,
				'last' => true, // Stop validation after this rule
				
			),
			
			
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Անվան դաշտը պարտադիր է',
				'allowEmpty' => false,
				'last' => true, // Stop validation after this rule
			),
		),
		'last_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ազգանունի դաշտը պարտադիր է',
				'allowEmpty' => false,
				'last' => true, // Stop validation after this rule
			),
			'between' => array(
				'rule' => array('between',2,30),
				'message' => 'Ձեր ազգանունը պետք է լինի 2-30 սիմվոլի չափով ',
				'allowEmpty' => false,
				'last' => true, // Stop validation after this rule
				
			),
			
		),
		'surname' => array(
			'between' => array(
				'rule' => array('between',2,30),
				'message' => 'Ձեր Հայրանունը պետք է լինի 2-30 սիմվոլի չափով ',
				'allowEmpty' => true,
				'last' => true, // Stop validation after this rule
				
			),
		),
		'email' => array(
			'unique' => array(
				'rule'    => array('isUnique'),
				'message' => 'Այս Էլ. Փոստով արդեն  լրացրել են այս  ֆորման: Եթե ցանկանում եք որևէ փոփոխություն անել լրացված ֆորմայուն, ապա դիմեք մեզ կամ նամակ ուղարկոլով, կամ զանգահարելով, կամ եկեղեցի այցելելով',
				'allowEmpty' => true,	
				'last' => true,
				),
			'mail' => array(
				'rule'    => array('email'),
				'message' => 'Այստեղ պտեք է գրել ձեր  Էլ. Փոստը',
				'allowEmpty' => true,
				'last' => true,
				),
		),
		'home_tell' => array(
			'phone' => array(
				'rule' => array('custom','/[1-9]+/'),
				'message' => 'Նշվածը հեռաղոսահամր չէ',
				'allowEmpty' => true,
				'last' => true, // Stop validation after this rule
			),
		),
		'work_tell' => array(
			'phone' => array(
				'rule' => array('custom', '/^[1-9]+$/'),
				'message' => 'Նշվածը հեռաղոսահամր չէ',
				'allowEmpty' => true,
				'last' => true, // Stop validation after this rule
			),
		),
		'mobile_tell' => array(
			'phone' => array(
			'rule' => array('custom','/[1-9]+/'),
				'message' => 'Նշվածը հեռաղոսահամր չէ',
				'allowEmpty' => true,
				'last' => true, // Stop validation after this rule
			),
			'unique' => array(
				'rule'    => array('isUnique'),
				'message' => 'Այս բջջային հեռախոսահամարով արդեն  լրացրել են այս  ֆորման: Եթե ցանկանում եք որևէ փոփոխություն անել լրացված ֆորմայուն, ապա դիմեք մեզ կամ նամակ ուղարկոլով, կամ զանգահարելով, կամ եկեղեցի այցելելով',
				'allowEmpty' => true,	
				'last' => true,
				),
		),
	);
}
