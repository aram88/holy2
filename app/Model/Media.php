<?php
App::uses('AppModel', 'Model');
/**
 * Media Model
 *
 */
class Media extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'medias';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
}
?>