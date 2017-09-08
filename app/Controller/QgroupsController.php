<?php
App::uses('AppController', 'Controller');
/**
 * Qgroups Controller
 *
 * @property Qgroup $Qgroup
 */
class QgroupsController extends AppController {
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
	$this->paginate=array( "Qgroup"=>array(
							    'limit'=>15,
							  ));
		$qgroups=$this->paginate('Qgroup');
		$this->set(compact('qgroups'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
                if (!is_numeric($id)){
			$this->Session->setFlash(__("Նշված հասցեով նյութ գոյություն չունի",true),'flash_error');
			$this->redirect('/');
		}
		$this->Qgroup->id = $id;
		if (!$this->Qgroup->exists()) {
			throw new NotFoundException(__('Invalid qgroup'));
		}
                $var1 = $this->Qgroup->read(null, $id);            
		$this->set('qgroup',$var1);
               // $this->set('title_for_layout', $var1['0']['Qgroup']['name']);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout="admin";
		if ($this->request->is('post')) {
			$this->Qgroup->create();
			if ($this->Qgroup->save($this->request->data)) {
				$this->Session->setFlash(__("Հարցերի խումբը հաջողությամբ պահպանվեց:",true),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__("Չհաջողեց պահպանել հարցերի խումբը, խնդրում ենք նորից փորձել:",true),'flash_error');
			}
		}
	}

/**
 * edit method
 */
	public function edit($id = null) {
		$this->layout="admin";
		$this->Qgroup->id = $id;
		if (!$this->Qgroup->exists()) {
			$this->Session->setFlash(__('Մուտքագրված է սխալ հասցե',true),'flash_error');
			$this->redirect('/');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Qgroup->save($this->request->data)) {
				$this->Session->setFlash(__('Հարցերի խումբը հաջողուփյամբ պահպանվել է',true),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Չհաջողվեց փոփոխել հարցերի խումբը, խնդրում ենք նորից փորձել',true),'flash_error');
			}
		} else {
			$this->request->data = $this->Qgroup->read(null, $id);
		}
	}

/**
 * delete method
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Qgroup->id = $id;
		if (!$this->Qgroup->exists()) {
			throw new NotFoundException(__('Invalid qgroup'));
		}
		if ($this->Qgroup->delete()) {
			$this->Session->setFlash(__('Qgroup deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Qgroup was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>