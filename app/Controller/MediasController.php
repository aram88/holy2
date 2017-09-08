<?php
App::uses('AppController', 'Controller');
/**
 * Media Controller
 *
 * @property Media $Media
 */
class MediasController extends AppController {
public function beforeFilter() {
    parent::beforeFilter();
 	$this->Auth->allow('admin');
 	 
}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout="admin";
		$this->paginate=array( "Media"=>array(
								'order'=>'Media.created DESC',				
							    'limit'=>15,
							  ));
		$media = $this->paginate('Media');
		$this->set(compact('media'));
	}
/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Media->id = $id;
		if (!$this->Media->exists()) {
			throw new NotFoundException(__('Invalid media'));
		}
		$this->set('media', $this->Media->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout="admin";
		if ($this->request->is('post')) {
			$this->Media->create();
			if ($this->Media->save($this->request->data)) {
				$this->Session->setFlash(__('Մեդիան հաջողությամբ պահպանվեց',true),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Չհաջողվեց պահպանել մեդիան, խնդրում ենք նորից փորձել',true),'flash_error');
				$this->redirect(array('action' => 'index'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Media->id = $id;
		if (!$this->Media->exists()) {
			throw new NotFoundException(__('Invalid media'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Media->save($this->request->data)) {
				$this->Session->setFlash(__('The media has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Media->read(null, $id);
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
		$this->Media->id = $id;
		if (!$this->Media->exists()) {
			$this->Session->setFlash(__('Մուտքագրված է սխալ հասցե',true),'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		$fil = $this->Media->find ('first',array('conditions' => array('Media.id'=>$id)));
    	@$file = new File(WWW_ROOT ."media".DS.$fil['Media']['path']);
		@$file->delete();
		if ($this->Media->delete()) {
			$this->Session->setFlash(__('Մեդիան հաջողությամբ ջնջվեց',true),'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Չհաջողվեց ջնջել մեդիան,խնդրում ենք նորից փորձել',true),'flash_error');
		$this->redirect(array('action' => 'index'));
	}
}
?>