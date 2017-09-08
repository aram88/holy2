<?php
App::uses('AppController', 'Controller');
/**
 * GalleryGroups Controller
 *
 * @property GalleryGroup $GalleryGroup
 */
class GalleryGroupsController extends AppController {
public function beforeFilter() {
    parent::beforeFilter();
 	$this->Auth->allow('index');
 	$this->Auth->allow('view');  
}
	
/** admin method*/
	public function admin() {
		$this->layout="admin";
		$this->GalleryGroup->recursive = 0;
		$this->paginate=array( "GalleryGroup"=>array(
								'fields'=>array('GalleryGroup.id,GalleryGroup.created,GalleryGroup.name,GalleryGroup.image'),'limit'=>10						
							  ));
		$galleries=$this->paginate('GalleryGroup');
		if (!empty($galleries)){
			foreach ($galleries as &$gallery ){
				$gallery['GalleryGroup']['created'] = date("Y.m.d ", strtotime($gallery['GalleryGroup']['created']));
			}
			$this->set(compact('galleries'));
			
		}	
	}
/** index method */
	public function index() {
		$this->paginate=array( "GalleryGroup"=>array(
								'fields'=>array('GalleryGroup.id,GalleryGroup.created,GalleryGroup.name,GalleryGroup.image'),'limit'=>20						
							  ));
		$galleries=$this->paginate('GalleryGroup');
		if (!empty($galleries)){
			foreach ($galleries as &$gallery ){
				$gallery['GalleryGroup']['created'] = date("Y.m.d ", strtotime($gallery['GalleryGroup']['created']));
			}
			$this->set(compact('galleries'));
			$this->set("title_for_layout","Նկարներ");
			
		}	
	}
/** view method */
	public function view($id = null) {
		$this->layout = "gallery";
		$this->GalleryGroup->id = $id;
		if (!$this->GalleryGroup->exists()) {
			$this->Session->setFlash(__('Այպիսի նկարների խումբ գոյություն չունի խնդրում ենք փորձել եղածները',true),'flash_error');
			$this->redirect(array('action'=>'index'));
		}
		$gallery=$this->GalleryGroup->find('all', array(
												'conditions'=>array('GalleryGroup.id'=>$id),
												'fields'=>array('GalleryGroup.id,GalleryGroup.name'),
												'contain'=>array('Gallery'=>array('fields'=>array('Gallery.name,Gallery.image'))),
										)
								);
		$this->set(compact("gallery"));	
		$this->set("title_for_layout",$gallery['0']['GalleryGroup']['name']);					
	}
/** add method*/
	public function add() {
		$this->layout="admin";
		if ($this->request->is('post')) {
			$this->Gallery->set( $this->request->data );
			if ($this->Gallery->validates()){
				if (!empty($this->request->data['GalleryGroup']['image'])){
					if ($this->request->data['x']!= 'none' && $this->request->data['y']!='none' && $this->request->data['h']!='none' && $this->request->data['w']!='none'){
						$destination = WWW_ROOT."img".DS."upload";        
			  			// grab the file
		    			$file = $this->request->data['GalleryGroup']['image'];
		    			$size =  array($this->request->data['w'],$this->request->data['h'],$this->request->data['x'],$this->request->data['y']); 
		    			$this->Crop->image($file, $destination,NULL,$size,NULL);
		    			$res=$this->Crop->result;
		    			$imgPath = 'upload'.DS.$res;
		    			$destination = WWW_ROOT."img".DS."upload";        
				  		// grab the file
				  		$file = $res;
				  		$realpath = "gallery_group";
				  		$type = 'resizecrop';
		            	$w = 200;
		    			$h = 200;
		    			$x = 0;
		    			$y = 0;
		    			$size =  array($w,$h,$x,$y); 
		    			$this->Crop->image($file, $destination,$type,$size,$realpath);
	                    $results = $this->Crop->result;
		                if (is_array($this->Crop->errors)){
		                	$errors_img = implode("<br />", $this->Crop->errors);
		                    break;
		                }
			  			if (!empty($imgPath)){
		            		$file = new File(WWW_ROOT ."img".DS.$imgPath);
							$file->delete();
		    	  		}
		    	  		$file = new File(WWW_ROOT ."img".DS."upload".DS. $this->request->data['GalleryGroup']['image']);
		    	  		$file->delete();
					} else {
			    		$destination = WWW_ROOT."img".DS."upload";       
				  		// grab the file
			    		$file = $this->request->data['GalleryGroup']['image'];
			    		$realpath = "gallery_group";
				  		$type = 'resizecrop';
		  		        $w = 200;
		    			$h = 200;
		    			$x = 0;
		    			$y = 0;
		    			$size =  array($w,$h,$x,$y); 
		    		    $this->Crop->image($file, $destination,$type,$size,$realpath);
                        $results = $this->Crop->result;
			            if (is_array($this->Crop->errors)){
			               	$errors_img = implode("<br />", $this->Crop->errors);
			                break;
			            }
				  	    $file = new File(WWW_ROOT ."img".DS."upload".DS. $this->request->data['GalleryGroup']['image']);
		            	$file->delete();
						}
					} else {
						if (!empty($errors_img)){
							$img_error = "Error";
						}
					}
					if (empty($img_error)){
						$this->GalleryGroup->create();
						if (isset($results)){
							$this->request->data['GalleryGroup']['image']= $results;
						}
						if (!empty($this->request->data['GalleryGroup']['created'])){
							$this->request->data['GalleryGroup']['created']= date("Y-m-d H:i", strtotime($this->request->data['GalleryGroup']['created']));
						} else {
							$this->request->data['GalleryGroup']['created']= date("Y-m-d H:i");
						} 
						if ($this->GalleryGroup->save($this->request->data)) {
							$this->Session->setFlash(__('Նկարների խումբը հաջողությամբ պահպանվեց',true),'flash_success');
							$this->redirect(array('action' => 'admin'));
						} else {
							$this->Session->setFlash(__('Նկարների խումբը չի պահպանվել, խնդրեւմ ենք նորից փորձել.',true),'flash_error');
						}
					}
			} else {
				$this->Session->setFlash(__('Նկարների խումբը չի պահպանվել, խնդրում ենք նորից փորձել.',true),'flash_error');
			}
		}
	}

/** edit method */
	public function edit($id = null) {
		$this->layout="admin";
		$this->GalleryGroup->id = $id;
		if (!$this->GalleryGroup->exists()) {
			$this->Session->setFlash(__("Մուտքագռված է սխալ հսսցե",true),"flash_error");
			$this->redirect("admin");
		}
		
	if ($this->request->is('post') || $this->request->is('put')) {
			$this->GalleryGroup->set($this->request->data);
			if (empty($this->request->data['GalleryGroup']['imgpath'])){
				$empty_img = true;
			}else {
				$empty_img = false;
				if ($this->GalleryGroup->validates()){
					if ($this->request->data['x']!= 'none' && $this->request->data['y']!='none' && $this->request->data['h']!='none' && $this->request->data['w']!='none'){
						$destination = WWW_ROOT."img".DS."upload";        
			  			// grab the file
		    			$file = $this->request->data['GalleryGroup']['imgpath'];
		    			$size =  array($this->request->data['w'],$this->request->data['h'],$this->request->data['x'],$this->request->data['y']); 
		    			$this->Crop->image($file, $destination,NULL,$size,NULL);
		    			$res=$this->Crop->result;
		    			$imgPath = 'upload'.DS.$res;
		    			$destination = WWW_ROOT."img".DS."upload";        
				  		// grab the file
				  		$file = $res;
				  		$realpath = "gallery_group";
				  		$type = 'resizecrop';
						$w = 200;
		    			$h = 200;
		    			$x = 0;
		    			$y = 0;
		    			$size =  array($w,$h,$x,$y); 
		    			$this->Crop->image($file, $destination,$type,$size,$realpath);
	                    $results = $this->Crop->result;
		                if (is_array($this->Crop->errors)){
		                	$errors_img = implode("<br />", $this->Crop->errors);
		                    break;
		                }
		            	if (!empty($imgPath)){
		            		debug(WWW_ROOT ."img".DS.$imgPath);
							$file = new File(WWW_ROOT ."img".DS.$imgPath);
							$file->delete();
		    	  		}
		    	  		$file = new File(WWW_ROOT ."img".DS."upload".DS. $this->request->data['GalleryGroup']['imgpath']);
		    	  		$file->delete();
					} else {
			    		$destination = WWW_ROOT."img".DS."upload";       
				  		// grab the file
			    		$file = $this->request->data['GalleryGroup']['imgpath'];
			    		$realpath = "gallery_group";
				  		$type = 'resizecrop';
						$w = 200;
		    			$h = 200;
		    			$x = 0;
		    			$y = 0;
		    			$size =  array($w,$h,$x,$y); 
		    			$this->Crop->image($file, $destination,$type,$size,$realpath);
	                    $results = $this->Crop->result;
		                if (is_array($this->Crop->errors)){
		                	$errors_img = implode("<br />", $this->Crop->errors);
		                    break;
		                }
		            	$file = new File(WWW_ROOT ."img".DS."upload".DS. $this->request->data['GalleryGroup']['imgpath']);
		    	  		$file->delete();
						}
							$image = $this->GalleryGroup->find ('first',array('conditions' => array('GalleryGroup.id'=>$id)));
					if ( $empty_img == false){
			    		@$file = new File(WWW_ROOT ."img".DS."gallery_group".DS.$image['GalleryGroup']['image']);
			    		@$file->delete;
						$this->request->data['GalleryGroup']['image'] =  $results;
			    	} else {
			    		$this->request->data['GalleryGroup']['image'] =  $image['GalleryGroup']['image'];
			    	}
				}else {
					$this->Session->setFlash(__("Նկարների խումբը չի պահպանվել, խնդրում ենք նորից փորձել",true),'flash_error');
				}
				
			}
			if (!empty($this->request->data['GalleryGroup']['created'])){
				$this->request->data['GalleryGroup']['created']= date("Y-m-d H:i", strtotime($this->request->data['GalleryGroup']['created']));
			} else {
				$this->request->data['GalleryGroup']['created']= date("Y-m-d H:i");
			} 
			if ($this->GalleryGroup->save($this->request->data)) {
					$this->Session->setFlash(__("Նկարների խումբը հաջողությամբ պահպանվել է",true),'flash_success');
					$this->redirect(array('action' => 'admin'));
				} else {
					$this->Session->setFlash(__("Նկարների խումբը չի պահպանվել, խնդրում ենք նորից փորձել",true),'flash_error');
			}	
		} else {
			$this->request->data = $this->GalleryGroup->read(null, $id);
		}
		
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->GalleryGroup->id = $id;
		if (!$this->GalleryGroup->exists()) {
			$this->Session->setFlash(__('Մուտքագրված է սխալ հսացե',true),"flash_error");
			$this->redirect('admin');
		}
		$galleries= $this->GalleryGroup->find('first',array(
															'conditins'=>array('GalleryGroup.id'=>$id),
															'fields'=>array('GalleryGroup.id,GalleryGroup.name,GalleryGroup.image'),
															'contain'=>array('Gallery'=>array(
																							   'fields'=>array('Gallery.id,Gallery.image')))		
															));	
		if (!empty($galleries['Gallery'])){
			foreach ($galleries['Gallery'] as $gallery){
				$this->deleteGallery($gallery['id'],$gallery['image']);
			}
		}	
		@$file = new File(WWW_ROOT ."img".DS."gallery_group".DS.$galleries['GalleryGroup']['image']);
			@$file->delete();											
															
		if ($this->GalleryGroup->delete()) {
			
			$this->Session->setFlash(__('Նկարների խումբը հաջողությամբ ջնջվեց',true),'flash_success');
			$this->redirect(array('action' => 'admin'));
		}
		$this->Session->setFlash(__('Չհաջողվեց ջնջել նկարների խումբը, խնդրում ենք նորից փորձել',true),'flash_error');
		$this->redirect(array('action' => 'admin'));
	}
	
public function deleteGallery($id = null,$img=null) {
    	@$file = new File(WWW_ROOT ."img".DS."gallery".DS.$img);
		@$file->delete();
		@$file = new File(WWW_ROOT ."img".DS."gallery".DS."sm".$img);
		@$file->delete();
		$this->Gallery->delete($id); 
	}
}
?>