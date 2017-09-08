<?php
App::uses('AppModel', 'Model');
/**
 * Question Model
 *
 * @property Qgroup $Qgroup
 */
class Question extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'first_name' => array(
			
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
				'message' => 'Էլ. հսացեն պարտադիր է',
				'last' => true, 
			),
			'email' =>array(
				'rule' => array('email'),
				'message' => 'Գրվածը Էլ. հասցե չէ',
				'last' =>true,
			),
		),
		'text' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Հարցի բովանդակությունը պարտադիր է',
				'last' => true, 
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
		'ans_text' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Պատսխանի  բովանդակությունը պարտադիր է',
				'last' => true, 
			),
		),
		
	);
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Qgroup' => array(
			'className' => 'Qgroup',
			'foreignKey' => 'qgroup_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	function notTag($data){
		if (preg_match('/<\s*\w.*?>/', $data['text'])){
			return false;
		} else {
			return true;
		}
	} 
	function notTag2($data){
		if (preg_match('/<.+?>/', $data['first_name'])){
			return false;
		} else {
			return true;
		}
	} 
		function notUrl($data){
		if (preg_match('/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/', $data['first_name'])){
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
	
	
}
?>