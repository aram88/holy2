<?php
App::uses('AppController', 'Controller');
/**
 * Readings Controller
 *
 * @property Reading $Reading
 */
class ReadingsController extends AppController {
public function beforeFilter() {
    parent::beforeFilter();
 	$this->Auth->allow('show'); 
 	$this->Auth->allow('view');   
	$this->Auth->allow('repeat');
	$this->Auth->allow('pahq');
	$this->Auth->allow('search');
	$this->Auth->allow('autocomplite');
	$this->Auth->allow('autocomplete');
}

public function pahq () {
	$this->layout ='admin';
	if (!$this->Auth->loggedIn()){
		$this->redirect('/');
	}

}
public function repeat () {
	$this->layout ='admin';
	if (!$this->Auth->loggedIn()){
		$this->redirect('/');
	}
	
}
public function autocomplite(){
	
	$this->autoRender = false;
	$query = $_GET['term'];
	$result = $this->Reading->query("SELECT DISTINCT events.name, events.day_id
										FROM events
										WHERE
										events.name LIKE  '%".$query."%' LIMIT 0, 10");
	$array = array();
	foreach ($result as $v){
		$row_array['id'] =$v['events']['day_id'];
		$row_array['value'] = $v['events']['name'];
		array_push($array, $row_array);
	}
	
	echo json_encode($array);
	exit();
}
public function autocomplete(){

	$this->autoRender = false;
	$query = $_GET['term'];
	$result = $this->Reading->query("SELECT DISTINCT readings.name, readings.day_id
										FROM readings
										WHERE
										readings.name LIKE  '%".$query."%' LIMIT 0, 10");
	$array = array();
	foreach ($result as $v){
		$row_array['id'] =$v['readings']['day_id'];
		$row_array['value'] = $v['readings']['name'];
		array_push($array, $row_array);
	}

	echo json_encode($array);
	exit();
}

public function search (){
	if (!$this->Auth->loggedIn()){
		$this->redirect('/');
	}
	if (isset($this->request->data['read1']) && !empty($this->request->data['read1'])){
		$result = $this->Reading->query("SELECT r.day_id  FROM events AS e
									JOIN readings AS r ON ( r.day_id = e.day_id AND e.name = '".$this->request->data['name']."'
											AND r.name ='".$this->request->data['read1']."')");
		}else {
		
		$result = $this->Reading->query("SELECT r.day_id  FROM events AS r
									WHERE r.name = '".$this->request->data['name']."'");
	}
	
	$readings = $this->Day->find('first',array(
			'fields'=>array('Day.id,Day.name'),
			'order'=>'Day.created DESC',
			'conditions'=>array('Day.id'=>$result['0']['r']['day_id']),
			'contain'=>array(
					'Event'=>array(
							'fields'=>'Event.name'),
					'Reading'=>array(
							'fields'=>'Reading.name')
			)
	));
	$res = array();
	if (isset($readings['Day']['id']) && isset($readings['Day']['name'])){
		$res["0"]["id"] = $readings['Day']['id'];
		$res["0"]["name"] = $readings['Day']['name'];
	}
	if (isset($readings['Event']['0']['day_id']) && !empty($readings['Event']['0']['day_id'])){
		$row_array['id'] = $readings['Event']['0']['day_id'];
		$row_array['name'] = $readings['Event']['0']['name'];
		array_push($res, $row_array);
	}
	if (isset($readings['Reading']['0']['day_id']) && !empty($readings['Reading']['0']['day_id'])){
		foreach ($readings['Reading'] as $reading){
			$row_array['id'] = $reading["day_id"];
			$row_array['name'] = $reading["name"];
			array_push($res, $row_array);
		}
		
	}
	
	echo json_encode($res);
	exit();
	
}
/**
 * index method
 */
	public function index() {
		$this->layout="admin";
		$this->paginate=array( "Reading"=>array(
								'order'=>'Reading.created DESC',				
							    'fields'=>array('Reading.id,Reading.created,Reading.name,Reading.text'),
							    'limit'=>20,
								'contain'=>array('Day'=>array(
												               'fields'=>array('Day.id,Day.name')
															   )
												)				
																		
							  ));
		$readings = $this->paginate('Reading');
		foreach ($readings as &$reading){
			if(@strpos($reading['Reading']['text'],' ',400)){
                $firts_point = strpos($reading['Reading']['text'],' ',400);
	            $reading['Reading']['text']=substr($reading['Reading']['text'],0,$firts_point+1).'...';
	        }
            $reading['Reading']['created'] = date("d.m.Y H-m ", strtotime($reading['Reading']['created']));
		}
		$this->set('title_for_layout','Ընթերցվածքների  ցուցակ');
		$this->set(compact('readings'));
	}
/**
 * view method
 */
	public function view($id = null) {
		$this->Reading->id = $id;
		if (!$this->Reading->exists()) {
			$this->Session->setFlash(__('Մութքգրված է սխալ հսացե',true),'flash_error');
			$this->redirect('/');
		}
		$reading = $this->Reading->read(null, $id);
		$reading['Reading']['created']=date("d.m.Y",strtotime($reading['Reading']['created']));
		$this->set(compact('reading' ));
		$this->set('title_for_layout',$reading['Reading']['name']);
	}
/**
 * add method
 */
	public function add() {
		$this->layout="admin";
		if ($this->request->is('post')) {
			$this->Reading->create();
			if (!empty($this->request->data['Reading']['created'])){
				$this->request->data['Reading']['created']= date("Y-m-d H:i", strtotime($this->request->data['Reading']['created']));
			} else {
				$this->request->data['Reading']['created']= date("Y-m-d H:i");
			} 
			if ($this->Reading->save($this->request->data)) {
				$this->Session->setFlash(__('Ընթերցվածքը հաջողությամբ պահպանվել է',true),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Չհաջողվեց պահապանել ընթերցվածքը, խնդրում  ենք նորից փորձել',true),'flash_error');
			}
		}
		$days = $this->Reading->Day->find('list',array('order'=>'Day.created DESC', 'limit'=>20));
		$this->set(compact('days'));
	}
/**
 * edit method
 */
	public function edit($id = null) {
		$this->layout="admin";
		$this->Reading->id = $id;
		if (!$this->Reading->exists()) {
			$this->Session->setFlash(__('Մուտքագրված է սխալ հասցե',true),'flash_error');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if (!empty($this->request->data['Reading']['created'])){
				$this->request->data['Reading']['created']= date("Y-m-d H:i", strtotime($this->request->data['Reading']['created']));
			} else {
				$this->request->data['Reading']['created']= date("Y-m-d H:i");
			}
			if ($this->Reading->save($this->request->data)) {
				$this->Session->setFlash(__('Ընթերցվածքը հաջողությամբ փոփոխվեց ',true),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Չհաջողվեց փոփոխել ընթեցվածքը, խնդրում ենք նորից փորձել',true),'flash_error');
			}
		} else {
			$this->request->data = $this->Reading->read(null, $id);
		}
		$days = $this->Reading->Day->find('list');
		$this->set(compact('days'));
		$this->set('title_for_layout','Փոփոխել ընթերցվածքը');
	}
/**
 * delete method
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Reading->id = $id;
		if (!$this->Reading->exists()) {
			$this->Session->setFlash(__('Մուտքագրված է սխալ հասցե',true),'falsh_error');
		}
		if ($this->Reading->delete()) {
			$this->Session->setFlash(__('Ընթերցվածքը հաջողությամբ ջնջվեց',true),"flash_success");
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Չհաջողվեց ջնջել ընթերցվածքը, խնդրում ենք նորից փորձել',true),'flash_error');
		$this->redirect(array('action' => 'index'));
	}
}?>