<?php
App::uses('AppModel', 'Model');
/**
 * Menu Model
 *
 * @property Menu $Menu
 * @property Menu $Menu
 * @property Post $Post
 */
class Menu extends AppModel {
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
				'last' => true, // Stop validation after this rule
				
			),
		),
		'position'=> array(
			'numeric'=>array(
				'rule' =>'/^[0-9]*$/',
				'allowEmpty' => true,
				'message' => 'Այտեղ պետք Է միայն թիվ գրել օրինակ 10 20 100 2000 ',
			),
		),
		'subject' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Դուք պետք է լրացնեք թեմայի դաշտը',
				'last' => TRUE // Stop validation after this rule
			),
			'notta' => array(
				'rule' => array('notTag2'),
				'message' => 'Կայքում արգելված է գրել որևէ HTML տագ կամ հղում: ',
				'required' => false,
				'last' => true,
			    'allowEmpty' => true, 
				
			),
			'noturl' => array(
                'rule'     => array('notUrl'),
                'message'  => 'Կայքում արգելված է գրել որևէ HTML տագ կամ հղում:',
				'required' => false,
				'last' => true,
			    'allowEmpty' => true, 
            ),
		),
		'mail' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Դուք պետք է լրացնեք էլ. հասցեի դաշտը',
				'last' => true, // Stop validation after this rule
			),
			'email' =>array(
				'rule' => array('email'),
				'message' => 'Դուք պետք է նշեք ձեր էլ. հասցեն',
				'last' =>true,
			),
		),
		'mailtext' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Դուք պետք է լրացնեք հարցի բովանդակության դաշտը',
				'last' => false, // Stop validation after this rule
			),
			'nottag' => array(
				'rule' => array('notTag'),
				'message' => 'Կայքում արգելված է գրել որևէ HTML տագ կամ հղում: Եթե ձեր հարցը պարունակում է որևէ հղում, 
				    ապա խնդրում ենք այն ուղարկել մաիլի օգնությամբ, կայքի ապահովությունից ելնելով  ',
				'last' => true, 
			),
			'noturl' => array(
                'rule'     => array('notUrl2'),
                'message'  => 'Կայքում արգելված է գրել որևէ HTML տագ կամ հղում: Եթե ձեր հարցը պարունակում է որևէ հղում, 
				    ապա խնդրում ենք այն ուղարկել մաիլի օգնությամբ, կայքի ապահովությունից ելնելով  ',
				'required' => false,
				'last' => true,
			    'allowEmpty' => true, 
            ),
		),
		
	);
/**
 * belongsTo associations
 */
var $belongsTo = array(
					    'Parent'=>array(
					    	  'className'=>'Menu',
					    	  'foreignKey'=>'menu_id'
					    		)
					  );
/**
 * hasMany associations
 */
	public $hasMany = array(
		'Children' => array(
			'className' => 'Menu',
			'foreignKey' => 'menu_id',
		),
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'menu_id',
			'dependent' =>true,
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
	
	function notTag($data){
		if (preg_match('/<\s*\w.*?>/', $data['mailtext'])){
			return false;
		} else {
			return true;
		}
	} 
	function notTag2($data){
		if (preg_match('/<.+?>/', $data['subject'])){
			return false;
		} else {
			return true;
		}
	} 
		function notUrl($data){
		if (preg_match('/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/', $data['subject'])){
			return false;
		} else {
			return true;
		}
	}
	function notUrl2($data){
		if (preg_match('/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/', $data['text'])){
			return false;
		} else {
			return true;
		}
	}  

}?>