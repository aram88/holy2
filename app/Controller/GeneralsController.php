<?php
App::uses('AppController', 'Controller');
/**
 * Galleries Controller
 *
 * @property Gallery $Gallery
 */
class GeneralsController extends AppController {

	public function beforeFilter() {
    	parent::beforeFilter();
 		$this->Auth->allow('view');  
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout="admin";
/*$emails = $this->Subscribe->find('all',array('fileds'=>array('Subscribe.email,Subscrbe.id')));
				
    $bcc = 'Bcc:  ';
				foreach ($emails as $mail){
$bcc .= $mail['Subscribe']['email'].', ';
                                       
					
				}
	echo $bcc; die;*/
	}

	
	public function view ($day,$month,$year){
		if (!is_numeric($day)){
			 $this->Session->setFlash(__("Նշված հասցեով նյութ գոյություն չունի",true),'flash_error');
			$this->redirect('/');
		} 
		if (!is_numeric($month)){
			 $this->Session->setFlash(__("Նշված հասցեով նյութ գոյություն չունի",true),'flash_error');
			$this->redirect('/');
		} 
		if (!is_numeric($year)){
			$this->Session->setFlash(__("Նշված հասցեով նյութ գոյություն չունի",true),'flash_error');
			$this->redirect('/');
		} 				
			$this->paginate=array( "General"=>array(
													 "conditions"=>array('General.created'=>$year.'-'.$month.'-'.$day),'group'=>array('Post.name'),
													 'limit'=>18,
													 "fields"=>array('General.id,General.post_id,General.created'),
													  "contain"=>array(
													  "Post"=>array(
													                'fields'=>array(" Post.name, Post.img,Post.img_name,Post.path,Post.type,Post.text,Post.read,Post.read_all"),
																
													                ))));
			$generals= $this->paginate('General');
		
		foreach ($generals as &$post ){
				if (preg_match('|<iframe [^>]*(src="[^"]+")[^>]*|', $post['Post']['text']) ){
					$post['Post']['read_all']= 0;
					$post['Post']['read'] = 0;
					
					continue;
					
				}
					
						if(@strpos($post['Post']['text'],' ',550)){
		                $firts_point = strpos($post['Post']['text'],' ',550);
		                $post['Post']['text']=substr($post['Post']['text'],0,$firts_point+1);
		            }
		            
			} //debug($generals);die();
		//	$generals =array_unique($generals);
		$day=$this->Day->find("first",array(
											'conditions'=>array('Day.created'=>$year.'-'.$month.'-'.$day), 
											'fields'=>array('Day.id,Day.name'),
											'contain'=>array('Event'=>array('fields'=>array('Event.id,Event.name,Event.text')),
															 'Reading'=>array('fields'=>array('Reading.id,Reading.name,Reading.text')),					
															)
											));
		if (!empty($day) ){	
			foreach ($day['Event'] as &$post ){
					 	if(@strpos($post['text'],' ',450)){
			                $firts_point = strpos($post['text'],' ',450);
			                $post['text']=substr($post['text'],0,$firts_point+1);
			            }
					
				}
			foreach ($day['Reading'] as &$post ){
					 	if(@strpos($post['text'],' ',450)){
			                $firts_point = strpos($post['text'],' ',450);
			                $post['text']=substr($post['text'],0,$firts_point+1);
			            }
					
				}									
			$this->set(compact('day'));
			$this->set('title_for_layout',$day['Day']['name']);
		}else {
			$this->set('title_for_layout',$generals['0']['General']['created']);
		}
		$this->set(compact('generals'));
	}

}
?>