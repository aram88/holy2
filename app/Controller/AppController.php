<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
App::uses('File', 'Utility'); 
App::uses('Folder', 'Utility'); 

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
   
	var $uses = array('Mainpick','Questionpick','Day','Reading','Event','Gallery','Media','GalleryGroup','Group','General', 'Menu','Message','Post','Qgroup','Question','StaticPage','User','Subscribe');
	public $components = array(
        'Acl','Email',
        'Auth'  =>array(
                               'fields' => array('username' => 'username', 'password' => 'password'),
                               'authorize'=> array('Controller','Actions'),
                               'loginRedirect' =>array('controller' => 'generals', 'action' => 'index'),
                               'loginAction' => array('controller' => 'pages', 'action' => 'home'),
                               'logoutRedirect' => array('controller' => 'pages', 'action' => 'home'),
                             )
       ,'RequestHandler',
        'Session','Crop','Upload','Mediamake','Random'
    );
	
    public $helpers = array('Html', 'Form', 'Session', 'Text','Tinymce','Paginator');


    public function beforeFilter() {
  /*  $this->Auth->authorize = 'actions';
   	$this->Auth->authorize =array('Controllers','Actions');
        //$this->Auth->actionPath = /';
        //Configure AuthComponent
        $this->Auth->fields = array('username' => 'username', 'password' => 'password');
        $this->Auth->loginAction = array('controller' => 'pages', 'action' => 'home');
        $this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'home');
        $this->Auth->loginRedirect = array('controller' => 'generals', 'action' => 'index');*/
 $this->Auth->deny('*');
    	$_SESSION['KCEDITOR']['disabled']=false;
    	if ($this->layout == "default"){
    		$readings = $this->Day->find('first',array(
    												  'fields'=>array('Day.id,Day.name'),
    												  'order'=>'Day.created DESC',
    												  'conditions'=>array('Day.created <='=> date("Y-m-d")),
    												  'limit'=>1,
    												  'contain'=>array(
    																	'Event'=>array(
    																				'fields'=>'Event.id,Event.name,',
																					'order'=>'Event.position DESC,  Event.created DESC',
    																				
    																				'order'=>'Event.created DESC',),
    																	'Reading'=>array(
    																				'fields'=>'Reading.id,Reading.name,',
																					'order'=>'Reading.position DESC,  Reading.created DESC',
    																				
    																				)
    																	)
    												));
    		//debug($reading);die;
    		if (!empty($readings)){
    			$this->set(compact('readings'));
    		}		
	    	 $left_menus = Cache::read('left_menus', 'long');
                 $left_menus = false;
	        if (!$left_menus) {
	    
	           
	            $left_menus =$this->Menu->find('all',array(
    											
    											'conditions'=>array(
    															'Menu.menu_id'=>NULL,
    															'Menu.location'=>2,
    														  ),
    											'order'=>array('Menu.position DESC'),				  
    											'fields'=>array(
    														  	'Menu.id,Menu.menu_id,Menu.name'
    														  ),
    											'contain'=>array(
    															'Post'=>array(
    														  				'fields'=>array('Post.id,Post.name,Post.menu_id')
    														  				),
    														  	'Children'=>array(
    														  				'conditions'=>array('Children.sub_show'=>1),
    														  				'fields'=>array('Children.id,Children.name,Children.menu_id'),
    														  				'order'=>array('Children.position DESC')
    														  				),			
    														  )
    											)
    								);
	            Cache::write('left_menus', $left_menus, 'long');
	        }
	        $right_menus = Cache::read('right_menus', 'long');
	        $right_menus = false;
	        if (!$right_menus) {
	    
	           
	           $right_menus =$this->Menu->find('all',array(
    											
    											'conditions'=>array(
    															'Menu.menu_id'=>NULL,
    															'Menu.location'=>3,
    														  ),
    											'order'=>'Menu.position DESC',				  
    											'fields'=>array(
    														  	'Menu.id,Menu.menu_id,Menu.name'
    														  ),
    											'contain'=>array(
    															'Post'=>array(
    														  				'fields'=>array('Post.id,Post.name,Post.menu_id')
    														  				),
    														  	'Children'=>array(
    														  				'conditions'=>array('Children.sub_show'=>1),
    														  				'fields'=>array('Children.id,Children.name,Children.menu_id'),
    														  				'order'=>'Children.position DESC',
    														  				),			
    														  )
    											)
    								); 
	            Cache::write('right_menus', $right_menus, 'long');
	        }
	        $tops = Cache::read('tops', 'long');
	        if (!$tops) {
	   			 $tops =$this->Menu->find('all',array(
	    											
	    											'conditions'=>array(
	    															'Menu.menu_id'=>NULL,
	    															'Menu.location'=>0,
	    														  ),
	    											'order'=>'Menu.position DESC',				  
	    											'fields'=>array(
	    														  	'Menu.id,Menu.menu_id,Menu.name'
	    														  ),
	    											'contain'=>array(
	    														  	'Children'=>array(
	    														  				'conditions'=>array('Children.sub_show'=>1),
	    														  				'fields'=>array('Children.id,Children.name,Children.menu_id'),
	    														  				'order'=>'Children.position DESC',
	    														  				),			
	    														  )
	    											)
	    								); 	
	            Cache::write('tops', $tops, 'long');
	        }																	
    	
 		
	    	
	    							
	    	if (!empty($tops)){
	    		$this->set(compact('tops'));
	    	}													
	    	if (@$this->request->params['pass']['0'] == "home"){
	    		$stick_post=$this->Post->find('all',array(
	    										'conditions'=>array('Post.stick'=>1),
	    										'fields'=>array('Post.id,Post.created,Post.name,Post.img,Post.text,Post.img_name,Post.read,Post.read_all')
	    										,'limit'=>2));
	    		if (!empty($stick_post['0']['Post'])){
	    			foreach ($stick_post as &$post ){
	    				if ($post['Post']['read_all']==0){
							if(@strpos($post['Post']['text'],' ',550)){
				                $firts_point = strpos($post['Post']['text'],' ',550);
				                $post['Post']['text']=substr($post['Post']['text'],0,$firts_point+1);
				            }
	    				}
		            	$post['Post']['created'] = date("d.m.Y ", strtotime($post['Post']['created']));
					}
					$this->set(compact('stick_post'));
	    			
	    		}
		    	$this->paginate=array( "Post"=>array(
										'conditions'=>array(
														'Post.home_page'=>1,
		    											'Post.stick'=>0
														),
										'order'=>'Post.created DESC',				
									    'fields'=>array('Post.id,Post.created,Post.name,Post.img,Post.text,Post.img_name,Post.type,Post.read,Post.read_all'),'limit'=>15						
									  ));
				$main_post=$this->paginate('Post');
				if (!empty($main_post['0']['Post'])){
					foreach ($main_post as &$post ){
						if ($post['Post']['read_all']==0){
							if(@strpos($post['Post']['text'],' ',550)){
				                $firts_point = strpos($post['Post']['text'],' ',550);
				                $post['Post']['text']=substr($post['Post']['text'],0,$firts_point+1);
				            }
			            	$post['Post']['created'] = date("d.m.Y ", strtotime($post['Post']['created']));
						}
					}
				}
				$this->set(compact('main_post'));
	    	}
	    	$right_posts=$this->Post->find('all', array(
	    							'conditions'=>array('Post.type' => NULL,'Post.id >='=>'FLOOR( RAND*(SELECT MAX(id) FROM posts))'),
	    							'fields'=>array('Post.id,Post.name'),
	    							//'order'=>'RAND()',
	    							'limit'=>10,
	    						));
    		$left_books=$this->Post->find('all', array(
    							'conditions'=>array('Post.type' =>0,'Post.id >='=>'FLOOR( RAND*(SELECT MAX(id) FROM posts))'),
    							'fields'=>array('Post.id,Post.name,Post.path'),
    							//'order'=>'RAND()',
    							'limit'=>10,
    						));
    		$right_medias=$this->Post->find('all', array(
    							'conditions'=>array('Post.type' =>1,'Post.id >='=>'FLOOR( RAND*(SELECT MAX(id) FROM posts))'),
    							'fields'=>array('Post.id,Post.name,Post.path'),
    							//'order'=>'RAND()',
    							'limit'=>5,
    						));				
			$this->set(compact('right_menus','left_menus','right_posts','left_books','right_medias'));
	    	
    	}
    }
	function isAuthorized() {
		//$is_allowed = $this->Acl->check ( array ('model' => 'Group', 'foreign_key' => $this->user ['Group'] ['id'] ), $this->name . '/' . $this->params ['action'], '*' );
		return true;
	}
    
}
?>