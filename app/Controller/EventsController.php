<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 */
class EventsController extends AppController {
public function beforeFilter() {
    parent::beforeFilter();
 	$this->Auth->allow('view');  
}

/** index method */
	public function index() {
		$this->layout="admin";
		$this->paginate=array( "Event"=>array(
								'order'=>'Event.created DESC',				
							    'fields'=>array('Event.id,Event.created,Event.name,Event.text'),
							    'limit'=>20,
								'contain'=>array('Day'=>array(
												               'fields'=>array('Day.id,Day.name')
															   )
												)				
																		
							  ));
		$events = $this->paginate('Event');
		foreach ($events as &$event){
			if(@strpos($event['Event']['text'],' ',400)){
                $firts_point = strpos($event['Event']['text'],' ',400);
	            $event['Event']['text']=substr($event['Event']['text'],0,$firts_point+1).'...';
	        }
            $event['Event']['created'] = date("d.m.Y H-m ", strtotime($event['Event']['created']));
		}
		$this->set(compact('events'));
		$this->set('title_for_layout','Իրադարձություններ');
	}
/**
 * view method
 @return void
 */
	public function view($id = null) {
	if (!is_numeric($id)){
			$this->Session->setFlash(__("Նշված հասցեով նյութ գոյություն չունի",true),'flash_error');
			$this->redirect('/');
		}
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			$this->Session->setFlash(__('Մուտքագրված է սխալ հասցե',true),'flash_error');
			$this->redirect('/');
		}
		$event= $this->Event->read(null, $id);
		$event['Event']['created']= date("d.m.Y",strtotime($event['Event']['created']));
		$this->set(compact('event'));
		$this->set('title_for_layout',$event['Event']['name']);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout="admin";
		if ($this->request->is('post')) {
			$this->Event->create();
			if (!empty($this->request->data['Event']['created'])){
				$this->request->data['Event']['created']= date("Y-m-d H:i", strtotime($this->request->data['Event']['created']));
			} else {
				$this->request->data['Event']['created']= date("Y-m-d H:i");
			} 
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('Իրադարձությունը հաջողությամբ պահպանվեց',true),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Չհաջողվեց պահպանել իրադարձությունը, խնդրում ենք նորից փորձել',true),'flash_error');
			}
		}
		$days = $this->Event->Day->find('list',array('order'=>'Day.created DESC', 'limit'=>70));
		$this->set(compact('days'));
		$this->set('title_for_layout','Ավելացնել իրադարձություն');
	}

/**
 * edit method
 */
	public function edit($id = null) {
		$this->layout="admin";
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			$this->Session->setFlash(__('Invalid event',true),'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if (!empty($this->request->data['Event']['created'])){
				$this->request->data['Event']['created']= date("Y-m-d H:i", strtotime($this->request->data['Event']['created']));
			} else {
				$this->request->data['Event']['created']= date("Y-m-d H:i");
			}
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('Իրադարձությունը հաջողությամբ փոփոխվեց',true),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Չհաջողվեց փոփոխոլ իրադարձությունը',true),'flash_error');
			}
		} else {
			$this->request->data = $this->Event->read(null, $id);
		}
		$days = $this->Event->Day->find('list');
		$this->set(compact('days'));
		$this->set('title_for_layout','Փոփոխել իրադարձութնունը');
	}

/**
 * delete method
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			$this->Session->setFlash(__('Մուտքագրված է սխալ հասցե',true),'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Event->delete()) {
			$this->Session->setFlash(__('Իրադարձությունը հաջողությամբ ջնջվեց',true),'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Չհաջողվեց ջնջել իրադարձությունը, խնդրում ենք նորից փորձել',true),'flash_error');
		$this->redirect(array('action' => 'index'));
	}
}
?>