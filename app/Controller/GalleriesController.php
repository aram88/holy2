<?php
App::uses('AppController', 'Controller');
/**
 * Galleries Controller
 *
 * @property Gallery $Gallery
 */
class GalleriesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = "admin";
		$this->paginate=array( "Gallery"=>array(
								'order'=>'Gallery.created DESC',				
							    'fields'=>array('Gallery.id,Gallery.created,Gallery.name,Gallery.image'),
							    'limit'=>2,
								'contain'=>array('GalleryGroup'=>array(
												               'fields'=>array('GalleryGroup.id,GalleryGroup.name')
															   )
												)				
																		
							  ));
		$galleries = $this->paginate('Gallery');							  
		$this->set(compact('galleries'));								  
		$this->set('title_for_layout','Նկարների ցուցակ');
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Gallery->id = $id;
		if (!$this->Gallery->exists()) {
			throw new NotFoundException(__('Invalid gallery'));
		}
		$this->set('gallery', $this->Gallery->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout="admin";
		if ($this->request->is('post')) {
			$this->Gallery->set( $this->request->data );
			if ($this->Gallery->validates()){
				if (!empty($this->request->data['Gallery']['image'])){
					if ($this->request->data['x']!= 'none' && $this->request->data['y']!='none' && $this->request->data['h']!='none' && $this->request->data['w']!='none'){
						$destination = WWW_ROOT."img".DS."upload";        
			  			// grab the file
		    			$file = $this->request->data['Gallery']['image'];
		    			$size =  array($this->request->data['w'],$this->request->data['h'],$this->request->data['x'],$this->request->data['y']); 
		    			$this->Crop->image($file, $destination,NULL,$size,NULL);
		    			$res=$this->Crop->result;
		    			$imgPath = 'upload'.DS.$res;
		    			$destination = WWW_ROOT."img".DS."upload";        
				  		// grab the file
				  		$file = $res;
				  		$realpath = "gallery";
				  		$type = 'resizecrop';
						$a = $this->request->data['w']/$this->request->data['h'];	
		            	$w = ceil( 700*$a);
		    			$h = 700;
		    			$h1= 50;
		    			$w1= ceil(50*$a);
		    			$x = 0;
		    			$y = 0;
						$IMAGE_DIMENSIONS = array(
				  									'mt'=>array($w,$h,$x,$y),
				  									'sm'=>array($w1,$h1,$x,$y),
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
		    	  		$file = new File(WWW_ROOT ."img".DS."upload".DS. $this->request->data['Gallery']['image']);
		    	  		$file->delete();
					} else {
			    		$destination = WWW_ROOT."img".DS."upload";       
				  		// grab the file
			    		$file = $this->request->data['Gallery']['image'];
			    		$realpath = "gallery";
				  		$type = 'resizecrop';
		  		        $w = 910;
		    			$h = 700;
						$h1= 50;
		    			$w1= ceil(50*1.3);
		    			$x = 0;
		    			$y = 0;
						$IMAGE_DIMENSIONS = array(
				  									'mt'=>array($w,$h,$x,$y),
				  									'sm'=>array($w1,$h1,$x,$y),
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
				  	    $file = new File(WWW_ROOT ."img".DS."upload".DS. $this->request->data['Gallery']['image']);
		            	$file->delete();
						}
					} else {
						if (!empty($errors_img)){
							$img_error = "Error";
						}
					}
					if (empty($img_error)){
						$this->Gallery->create();
						$this->request->data['Gallery']['image']= $results['mt'];
						$this->request->data['Gallery']['gallery_group_id'] = $this->request->data['Gallery']['gallery_group_id'];
						$this->request->data['Gallery']['name']= $this->request->data['Gallery']['name'];
						if ($this->Gallery->save($this->request->data)) {
							$this->Session->setFlash(__('Նկարը հաջողությամբ պահպանվեց',true),'flash_success');
							$this->redirect(array('action' => 'index'));
						} else {
							$this->Session->setFlash(__('Նկարը չի պահպանվել, խնդրեւմ ենք նորից փորձել.',true),'flash_error');
						}
					}
			} else {
				$this->Session->setFlash(__('Նկարը չի պահպանվել, խնդրեւմ ենք նորից փորձել.',true),'flash_error');
			}
		}
		$galleryGroups = $this->Gallery->GalleryGroup->find('list');
		$this->set(compact('galleryGroups'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
			$this->layout="admin";
		$this->Gallery->id = $id;
		if (!$this->Gallery->exists()) {
			$this->Session->setFlash(__("Մուտքագռված է սխալ հսսցե",true),"flash_error");
			$this->redirect("admin");
		}
		
	if ($this->request->is('post') || $this->request->is('put')) {
			$this->Gallery->set($this->request->data);
			if (empty($this->request->data['Gallery']['imgpath'])){
				$empty_img = true;
			}else {
				$empty_img = false;
				if ($this->Gallery->validates()){
					if ($this->request->data['x']!= 'none' && $this->request->data['y']!='none' && $this->request->data['h']!='none' && $this->request->data['w']!='none'){
						$destination = WWW_ROOT."img".DS."upload";        
			  			// grab the file
		    			$file = $this->request->data['Gallery']['imgpath'];
		    			$size =  array($this->request->data['w'],$this->request->data['h'],$this->request->data['x'],$this->request->data['y']); 
		    			$this->Crop->image($file, $destination,NULL,$size,NULL);
		    			$res=$this->Crop->result;
		    			$imgPath = 'upload'.DS.$res;
		    			$destination = WWW_ROOT."img".DS."upload";        
				  		// grab the file
				  		$file = $res;
				  		$realpath = "gallery";
				  		$type = 'resizecrop';
				  		$a = $this->request->data['w']/$this->request->data['h'];	
						$w = ceil( 700*$a);
		    			$h = 700;
		    			$h1= 50;
		    			$w1= ceil(50*$a);
		    			$x = 0;
		    			$y = 0;
						$IMAGE_DIMENSIONS = array(
				  									'mt'=>array($w,$h,$x,$y),
				  									'sm'=>array($w1,$h1,$x,$y),
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
		    	  		$file = new File(WWW_ROOT ."img".DS."upload".DS. $this->request->data['Gallery']['imgpath']);
		    	  		$file->delete();
					} else {
			    		$destination = WWW_ROOT."img".DS."upload";       
				  		// grab the file
			    		$file = $this->request->data['Gallery']['imgpath'];
			    		$realpath = "gallery";
				  		$type = 'resizecrop';
					 $w = 910;
		    			$h = 700;
						$h1= 50;
		    			$w1= ceil(50*1.3);
		    			$x = 0;
		    			$y = 0;
						$IMAGE_DIMENSIONS = array(
				  									'mt'=>array($w,$h,$x,$y),
				  									'sm'=>array($w1,$h1,$x,$y),
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
		            	$file = new File(WWW_ROOT ."img".DS."upload".DS. $this->request->data['Gallery']['imgpath']);
		    	  		$file->delete();
						}
							$image = $this->Gallery->find ('first',array('conditions' => array('Gallery.id'=>$id)));
					if ( $empty_img == false){
			    		@$file = new File(WWW_ROOT ."img".DS."gallery".DS.$image['Gallery']['image']);
			    		@$file->delete();
			    		@$file = new File(WWW_ROOT ."img".DS."gallery".DS."sm".$image['Gallery']['image']);
			    		@$file->delete(); 
						$this->request->data['Gallery']['image'] =  $results['mt'];
			    	} else {
			    		$this->request->data['Gallery']['image'] =  $image['Gallery']['image'];
			    	}
				}else {
					$this->Session->setFlash(__("Նկարների խումբը չի պահպանվել, խնդրում ենք նորից փորձել",true),'flash_error');
				}
				
			}
			if (!empty($this->request->data['Gallery']['created'])){
				$this->request->data['Gallery']['created']= date("Y-m-d H:i", strtotime($this->request->data['Gallery']['created']));
			} else {
				$this->request->data['Gallery']['created']= date("Y-m-d H:i");
			} 
			if ($this->Gallery->save($this->request->data)) {
					$this->Session->setFlash(__("Նկարների խումբը հաջողությամբ պահպանվել է",true),'flash_success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__("Նկարների խումբը չի պահպանվել, խնդրում ենք նորից փորձել",true),'flash_error');
			}	
		} else {
			$this->request->data = $this->Gallery->read(null, $id);
		}
		
		$galleryGroups = $this->Gallery->GalleryGroup->find('list');
		$this->set(compact('galleryGroups'));
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
		$this->Gallery->id = $id;
		if (!$this->Gallery->exists()) {
			throw new NotFoundException(__('Մուտքգրված է սխալ հասցե',true),'flash_error');
		}
		$image= $this->Gallery->find("first",array(
											"conditions"=>array('Gallery.id'=>$id),
											'fields'=>array('Gallery.id,Gallery.image')));
		if (!empty($image['Gallery']['image'])){
			@$file = new File(WWW_ROOT ."img".DS."gallery".DS.$image['Gallery']['image']);
    		@$file->delete();
    		@$file = new File(WWW_ROOT ."img".DS."gallery".DS."sm".$image['Gallery']['image']);
    		@$file->delete();
			
		}
		
		if ($this->Gallery->delete($id)) {
			$this->Session->setFlash(__('Նկարը հաջողությամբ ջնջվեց',true),'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Չհաջողվեց ջնջել նկարը,խնդրում ենք նորից փորձել',true),'flash_error');
		$this->redirect(array('action' => 'index'));
	}
}
?>