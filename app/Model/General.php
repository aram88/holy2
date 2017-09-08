<?php
App::uses('AppModel', 'Model');
/**
 * Menu Model
 *
 * @property Menu $Menu
 * @property Menu $Menu
 * @property Post $Post
 */
class General extends AppModel {
/**
 * Display field
 */
	public $displayField = 'name';
	
	public $belongsTo = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id'
		)
	);

}
?>