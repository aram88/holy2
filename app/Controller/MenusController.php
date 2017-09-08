<?php
App::uses('AppController', 'Controller');
/**
 * Menus Controller
 */
class MenusController extends AppController {
public function beforeFilter() {
    parent::beforeFilter();
 	$this->Auth->allow('view','sendmail');  
}
	private $parents= array();
/** find parrent */
	public $i = 0;
	public function getParent($chid=NULL){
		$this->Menu->recursive = 0;
		$parent=$this->Menu->find('first', array(
										'conditions'=>array('Menu.id'=>$chid),
										'fields'=>array('Menu.id,Menu.menu_id,Menu.name')
										)
						 );
		$this->parents[$this->i]['name']=$parent['Menu']['name'];
		$this->parents[$this->i]['id']=$parent['Menu']['id'];
			$this->i++;
			
		if ($parent['Menu']['menu_id']!=NULL){
			$this->getParent($parent['Menu']['menu_id']);
		}else {
			return ;
		}
	}	
	
	public function adminview($id) {
		$this->layout= "admin";
		$this->paginate=array( "Post"=>array(
								'conditions'=>array('Post.menu_id'=>$id),
								'order'=>'Post.created DESC',				
							    'fields'=>array('Post.id,Post.created,Post.name,Post.img,Post.stick'),
							    'limit'=>20,
								'contain'=>array('Menu'=>array(
												               'fields'=>array('Menu.id,Menu.name')
															   )
												)				
																		
							  ));
		$posts = $this->paginate('Post');
		$stick = array('0'=>'Ոչ','1'=>'Այո');
		$this->set(compact('stick'));
		$this->set(compact('posts'));	
		$this->set('title_for_layout','Նյութերի ցուցակ');	
	}						  
			
/**
 * index method
 */
	public function index() {
		$this->layout= "admin";
		$this->paginate=array( "Menu"=>array(
								'order'=>'Menu.created DESC',				
							    'fields'=>array('Menu.id,Menu.created,Menu.name,
								                Menu.menu_id, Menu.position,Menu.location,Menu.visible,Menu.sub_show,Menu.main_show'),
								'limit'=>100,						
							  ));
		$location = array(''=>'','0'=>"Վերև",'1'=>"Ներքև",'2'=>"Ձախ",'3'=>"Աջ");
		$yes=array(''=>'Ոչ','0'=>'Ոչ','1'=>'Այո',);
		$this->set(compact('yes'));
		$menues=$this->paginate('Menu');
		$this->set(compact('menues','location'));
	}

/**
 * view method
 */
	public function view($id = null) {
	if (!is_numeric($id)){
			$this->Session->setFlash(__("Նշված հասցեով նյութ գոյություն չունի",true),'flash_error');
			$this->redirect('/');
		}
		$this->getParent($id);
		if (!empty($this->parents)){
			$this->parents=array_reverse($this->parents);
			array_pop($this->parents);
			$this->set('parents',$this->parents);
		}
		$this->Menu->id = $id;
		if (!$this->Menu->exists()) {
			$this->Session->setFlash(__('Նշված հասցեով նյութ գոյություն չունի',true),'flash_error');
			$this->redirect('/');
		}
		$menu = $this->Menu->find('first', array(
												'conditions'=>array('Menu.id'=>$id),
												'fields'=>array('Menu.id,Menu.name,Menu.img,Menu.text,Menu.menu_id'),
												'contain'=>array(
																 'Children'=>array('fields'=>array('Children.id'),'limit'=>1),
																 'Post'=>array('fields'=>array('Post.id'),'limit'=>1) 
																)
												)
								);
		if (!empty($menu['Children'])){
			$this->paginate=array( "Menu"=>array(
							'conditions'=>array(
												'Menu.menu_id'=>$id
												),
							    'fields'=>array('Menu.id,Menu.name,Menu.img,Menu.text,Menu.img_name,Menu.main_show'),'limit'=>15,
								'order'=>'Menu.position DESC'											
							  ));
			$menus=$this->paginate('Menu');
		}						
		
		elseif (!empty($menu['Post'])){
			$this->paginate=array('Post'=>array(
												'conditions'=>array('Post.menu_id'=>$id),
												'fields'=>array('Post.id,Post.name,Post.img,Post.text,Post.created,Post.img_name,Post.read,Post.read_all,
																Post.path,Post.type'),
												'limit'=>15,
												'order'=>'created DESC'				
												)
								);
			$menus = $this->paginate('Post');
		}
		if (!empty($menus['0']['Post'])){
			foreach ($menus as &$post ){
				if($post['Post']['read'] == 1){
					if(@strpos($post['Post']['text'],' ',550)){
		                $firts_point = strpos($post['Post']['text'],' ',550);
		                $post['Post']['text']=substr($post['Post']['text'],0,$firts_point+1);
		            }
	            	$post['Post']['created'] = date("Y.m.d ", strtotime($post['Post']['created']));
				} else {
					continue;
				}
			}
		}
		$this->set('title_for_layout',$menu['Menu']['name']);
		$this->set(compact('menus'));						
		$this->set(compact('menu'));
	}

/**
 * add method
 */
	public function add() {
		$this->layout="admin";
		unset($this->Menu->validate['mail']);
		unset($this->Menu->validate['mailtext']);
		unset($this->Menu->validate['subject']);
		if ($this->request->is('post')) {
			$this->Menu->set( $this->request->data );
			if ($this->Menu->validates()){
				if (!empty($this->request->data['Menu']['imgpath'])){
					if ($this->request->data['x']!= 'none' && $this->request->data['y']!='none' && $this->request->data['h']!='none' && $this->request->data['w']!='none'){
						$destination = WWW_ROOT."img".DS."upload";        
			  			// grab the file
		    			$file = $this->request->data['Menu']['imgpath'];
		    			$size =  array($this->request->data['w'],$this->request->data['h'],$this->request->data['x'],$this->request->data['y']); 
		    			$this->Crop->image($file, $destination,NULL,$size,NULL);
		    			$res=$this->Crop->result;
		    			$imgPath = 'upload'.DS.$res;
		    			$destination = WWW_ROOT."img".DS."upload";        
				  		// grab the file
				  		$file = $res;
				  		$realpath = "menu";
				  		$type = 'resizecrop';
				  		$a = $this->request->data['w']/$this->request->data['h'];	
		            	$w1 = 250;
		    			$h1 = ceil( 250/$a);
		    			$w2 = 150;
		    			$h2 = ceil( 150/$a);
		    			$w3 = 60;
		    			$h3 = ceil( 60/$a);
		    			$x = 0; $y = 0; 
				  		$IMAGE_DIMENSIONS = array(
				  									'mt'=>array($w1,$h1,$x,$y),
				  									'st'=>array($w2,$h2,$x,$y),
				  									'sm'=>array($w3,$h3,$x,$y),
				  								  );
		            	foreach ($IMAGE_DIMENSIONS as $prefix => $size) {
			            	if ($prefix == 'mt'){
			     			    $this->Crop->image($file, $destination,$type,$size,$realpath);
	                         } else {
	                            $this->Crop->image($file, $destination,$type,$size,$realpath,$prefix);
	                         }
                            $results[$prefix] = $this->Crop->result;
			                if (is_array($this->Crop->errors)){
			                	$errors_img = implode("<br />", $this->Crop->errors);
			                    break;
			                }
		            	}
		            	if (!empty($imgPath)){
							$file = new File(WWW_ROOT ."img".DS.$imgPath);
							$file->delete();
		    	  		}
		    	  		$file = new File(WWW_ROOT ."img".DS."upload".DS. $this->request->data['Menu']['imgpath']);
		    	  		$file->delete();
					} else {
			    		$destination = WWW_ROOT."img".DS."upload";       
				  		// grab the file
			    		$file = $this->request->data['Menu']['imgpath'];
			    		$realpath = "menu";
				  		$type = 'resizecrop';
				  		$w1 = 250;
		    			$h1 = 193;
		    			$w2 = 150;
		    			$h2 = 116;
		    			$w3 = 60;
		    			$h3 = 46;
		    			$x = 0; $y = 0; 
				  		$IMAGE_DIMENSIONS = array(
				  									'mt'=>array($w1,$h1,$x,$y),
				  									'st'=>array($w2,$h2,$x,$y),
				  									'sm'=>array($w3,$h3,$x,$y),
				  								  );
						foreach ($IMAGE_DIMENSIONS as $prefix => $size) {
							if ($prefix == 'mt'){
		     				    $this->Crop->image($file, $destination,$type,$size,$realpath);
                        	 } else {
                        	    $this->Crop->image($file, $destination,$type,$size,$realpath,$prefix);
                        	 }
                            $results[$prefix] = $this->Crop->result;
			                if (is_array($this->Crop->errors)){
			                	$errors_img = implode("<br />", $this->Crop->errors);
			                    break;
			                }
		            	}
		            	$file = new File(WWW_ROOT ."img".DS."uploads".DS. $this->request->data['Menu']['imgpath']);
		    	  		$file->delete();
						}
					} else {
						if (!empty($errors_img)){
							$img_error = "Error";
						}
					}
					if (empty($img_error)){
						$this->Menu->create();
						$this->request->data['Menu']['img']= $results['mt'];
						$this->request->data['Menu']['menu_id'] = $this->request->data['Menu']['parent'];
						unset($this->request->data['Menu']['parent']);
						if ($this->Menu->save($this->request->data)) {
							////stex
							if ($this->request->data['Menu']['location'] == 0){
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
							if ($this->request->data['Menu']['location'] == 3){
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
							if ($this->request->data['Menu']['location'] == 2){
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
							
							///stex
							
							
							$this->Session->setFlash(__("Մենյուն հաջողությամբ պահպանվեց",true),'flash_success');
							$this->redirect(array('action' => 'index'));
						} else {
							$this->Session->setFlash(__("Չհաջողվեց մենյուն պահպանել, խնդրում ենք նորից փորձել",true),'flash_error');
						}
					}
			} else {
				$this->Session->setFlash(__('Մենյուն չի պահպանվել, խնդրում ենք նորից թորձել',true),'flash_error');
			}
		}
		$locations = array('Վերև','Ներքև','Ձախ','Աջ');
		$this->set(compact('locations'));
		$menus = $this->Menu->find('list', array('conditions'=>array('Menu.menu_id '=>NULL)));
		
		$this->set(compact('menus'));
	}

/**
 * edit method
 */
	public function edit($id = null) {
		$this->layout="admin";
		unset($this->Menu->validate['mail']);
		unset($this->Menu->validate['mailtext']);
		unset($this->Menu->validate['subject']);
		$this->Menu->id = $id;
		if (!$this->Menu->exists()) {
			$this->Session->setFlash(__("Նշված հասցեով մենյու գոյություն չունի",true),'flash_error');
			$this->redirect('index');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Menu->set($this->request->data);
			if (empty($this->request->data['Menu']['imgpath'])){
				$empty_img = true;
			}else {
				$empty_img = false;
				if ($this->Menu->validates()){
					if ($this->request->data['x']!= 'none' && $this->request->data['y']!='none' && $this->request->data['h']!='none' && $this->request->data['w']!='none'){
						$destination = WWW_ROOT."img".DS."upload";        
			  			// grab the file
		    			$file = $this->request->data['Menu']['imgpath'];
		    			$size =  array($this->request->data['w'],$this->request->data['h'],$this->request->data['x'],$this->request->data['y']); 
		    			$this->Crop->image($file, $destination,NULL,$size,NULL);
		    			$res=$this->Crop->result;
		    			$imgPath = 'upload'.DS.$res;
		    			$destination = WWW_ROOT."img".DS."upload";        
				  		// grab the file
				  		$file = $res;
				  		$realpath = "menu";
				  		$type = 'resizecrop';
				  		$a = $this->request->data['w']/$this->request->data['h'];	
		            	$w1 = 250;
		    			$h1 = ceil( 250/$a);
		    			$w2 = 150;
		    			$h2 = ceil( 150/$a);
		    			$w3 = 60;
		    			$h3 = ceil( 60/$a);
		    			$x = 0; $y = 0; 
				  		$IMAGE_DIMENSIONS = array(
				  									'mt'=>array($w1,$h1,$x,$y),
				  									'st'=>array($w2,$h2,$x,$y),
				  									'sm'=>array($w3,$h3,$x,$y),
				  								  );
		            	foreach ($IMAGE_DIMENSIONS as $prefix => $size) {
			            	if ($prefix == 'mt'){
			     			    $this->Crop->image($file, $destination,$type,$size,$realpath);
	                         } else {
	                            $this->Crop->image($file, $destination,$type,$size,$realpath,$prefix);
	                         }
                            $results[$prefix] = $this->Crop->result;
			                if (is_array($this->Crop->errors)){
			                	$errors_img = implode("<br />", $this->Crop->errors);
			                    break;
			                }
		            	}
		            	if (!empty($imgPath)){
		            		debug(WWW_ROOT ."img".DS.$imgPath);
							$file = new File(WWW_ROOT ."img".DS.$imgPath);
							$file->delete();
		    	  		}
		    	  		$file = new File(WWW_ROOT ."img".DS."upload".DS. $this->request->data['Menu']['imgpath']);
		    	  		$file->delete();
					} else {
			    		$destination = WWW_ROOT."img".DS."upload";       
				  		// grab the file
			    		$file = $this->request->data['Menu']['imgpath'];
			    		$realpath = "menu";
				  		$type = 'resizecrop';
				  		$w1 = 250;
		    			$h1 = 193;
		    			$w2 = 150;
		    			$h2 = 116;
		    			$w3 = 60;
		    			$h3 = 46;
		    			$x = 0; $y = 0; 
				  		$IMAGE_DIMENSIONS = array(
				  									'mt'=>array($w1,$h1,$x,$y),
				  									'st'=>array($w2,$h2,$x,$y),
				  									'sm'=>array($w3,$h3,$x,$y),
				  								  );
						foreach ($IMAGE_DIMENSIONS as $prefix => $size) {
							if ($prefix == 'mt'){
		     				    $this->Crop->image($file, $destination,$type,$size,$realpath);
                        	 } else {
                        	    $this->Crop->image($file, $destination,$type,$size,$realpath,$prefix);
                        	 }
                            $results[$prefix] = $this->Crop->result;
			                if (is_array($this->Crop->errors)){
			                	$errors_img = implode("<br />", $this->Crop->errors);
			                    break;
			                }
		            	}
		            	$file = new File(WWW_ROOT ."img".DS."upload".DS. $this->request->data['Menu']['imgpath']);
		    	  		$file->delete();
						}
							$image = $this->Menu->find ('first',array('conditions' => array('Menu.id'=>$id)));
				if ( $empty_img == false){
		    		@$file = new File(WWW_ROOT ."img".DS."menu".DS.$image['Menu']['img']);
					@$file->delete();
					@$file = new File(WWW_ROOT ."img".DS."menu".DS."sm".$image['Menu']['img']);
					@$file->delete();
					@$file = new File(WWW_ROOT ."img".DS."menu".DS."st".$image['Menu']['img']);
					@$file->delete();
					$this->request->data['Menu']['img'] =  $results['mt'];
		    	} else {
		    		$this->request->data['Menu']['img'] =  $image['Menu']['img'];
		    	}
				}
				
			}
			if ($this->Menu->save($this->request->data)) {
					$this->Session->setFlash(__("Մենյու հաջողությամբ պահպանվել է",true),'flash_success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->request->data = $this->Menu->read(null, $id);
					$t=$this->request->data['Menu']['img'];
					unset($this->request->data['Menu']);
					$this->request->data['Menu']['image'] =$t;
					$errors = $this->Menu->invalidFields();
					$this->set(compact('errors')); 
					$this->Session->setFlash(__("Մենյու չի պահպանվել, խնդրում ենք նորից փորձել",true),'flash_error');
			}	
		} else {
			$this->request->data = $this->Menu->read(null, $id);
			$this->request->data['Menu']['image']=$this->request->data['Menu']['img']; 
		}
		$locations = array('Վերև','Ներքև','Ձախ','Աջ');
		$this->set(compact('locations'));
		$menus = $this->Menu->find('list');
		$this->set(compact('menus'));
	}

/**
 * delete method
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Menu->id = $id;
		if (!$this->Menu->exists()) {
			$this->Session->setFlash(__('Մուտքագրված է սխալ հասցե',true),'flash_error');
			$this->redirect('index');
		}
		$menus=	$this->Menu->find('first',array(
										'conditions'=>array('Menu.id'=>$id),
										'contain'=>array(
														'Post'=>array('fields'=>'Post.id,Post.img,Post.name,Post.menu_id'),
														'Children'=>array('fields'=>'Children.id,Children.img,Children.name')),
														
										));
		@$file = new File(WWW_ROOT ."img".DS."menu".DS.$menus['Menu']['img']);
		@$file->delete();
		@$file = new File(WWW_ROOT ."img".DS."menu".DS."sm".$menus['Menu']['img']);
		@$file->delete();
		@$file = new File(WWW_ROOT ."img".DS."menu".DS."st".$menus['Menu']['img']);
		@$file->delete();
		$this->Menu->delete($menus['Menu']['id']);
		if (!empty($menus['Post'])){
			foreach ($menus['Post'] as $post){
				$this->deletePost($post['id'],$post['img']);
			}
		}
		foreach ($menus['Children'] as $children){
			$this->delete($children['id']);
		}
		$this->Session->setFlash(__('Մենյուն հաջողությամբ ջնջվեց',true),'flash_success');
		$this->redirect(array('action' => 'index'));
	}
/***deletePost**/
public function deletePost($id = null,$img=null) {
    	@$file = new File(WWW_ROOT ."img".DS."post".DS.$img);
		@$file->delete();
		@$file = new File(WWW_ROOT ."img".DS."post".DS."sm".$img);
		@$file->delete();
		@$file = new File(WWW_ROOT ."img".DS."post".DS."st".$img);
		@$file->delete();
		$this->Post->delete($id,$caskade=true); 
	}
	
	public function autocomplete () {
		$this->autoRender = false;
		$query = $_GET['term'];
		$result = $this->Menu->query("SELECT  menus.id, menus.name 
										FROM menus 
										WHERE
										menus.name LIKE  '%".$query."%'");
		$array = array();
		foreach ($result as $v){
			$row_array['id'] =$v['menus']['id'];
			$row_array['value'] = $v['menus']['name'];
			array_push($array, $row_array);
		}
		
		echo json_encode($array);
		exit();
	
	}
	public function search ($name = NULL ) {
		$this->autoRender = false;
		$name =$this->request->data['name'];
		$result = $this->Menu->query("SELECT  menus.id, menus.name 
										FROM menus 
										WHERE
										menus.name LIKE  '%".$name."%'");
		$array = array();
		foreach ($result as $v){
			$row_array['id'] =$v['menus']['id'];
			$row_array['name'] = $v['menus']['name'];
			array_push($array, $row_array);
		}
		
		echo json_encode($array);
		exit();
	
	}
	public function sendmail() {
		$this->autoRender = false;
		if ($this->request->is('post')) {
			$this->Menu->set( $this->request->data );
			unset($this->Menu->validate['name']);
			if ($this->Menu->validates()){
			  $to = "daycenter.am@gmail.com"; 
                               
				$subject = $this->request->data['Menu']['subject'];
				$txt = $this->request->data['Menu']['mailtext'];
				$headers = "From: {$this->request->data['Menu']['mail']} ";
	            //mail($to,$subject,$txt,$headers);
				if (mail($to,$subject,$txt,$headers)) {
					$this->Session->setFlash(__('Շնորհակալություն ձեր նամակի համար մենք շուտով կպատասխանենք դրան:',true),'flash_success');
					$this->redirect('/');
				} else {
					$this->Session->setFlash(__('Չհաջողվեց ուղարկել նամակը խնդրում ենք, նորից փորձել: ',true),'flash_error');
					$this->redirect($this->referer());
				}
			}else {
					$errors = $this->Menu->invalidFields();
					$this->Session->setFlash(__('Չհաջողվեց ուղարկել նամակը խնդրում ենք, նորից փորձել: '."<br/>". $errors['subject']['0']." <br/>". $errors['mail']['0']. "<br/>". $errors['mailtext']['0'],true),'flash_error');
					$this->redirect($this->referer());
					
				}
		}
	}
}
?>