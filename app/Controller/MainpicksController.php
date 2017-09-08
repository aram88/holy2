<?php
App::uses('AppController', 'Controller');
/**
 * Mainpicks Controller
 *
 * @property Mainpick $Mainpick
 */
class MainpicksController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Mainpick->recursive = 0;
		$this->set('mainpicks', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Mainpick->id = $id;
		if (!$this->Mainpick->exists()) {
			throw new NotFoundException(__('Invalid mainpick'));
		}
		$this->set('mainpick', $this->Mainpick->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Mainpick->create();
			if ($this->Mainpick->save($this->request->data)) {
				$this->Session->setFlash(__('The mainpick has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mainpick could not be saved. Please, try again.'));
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
		$this->Mainpick->id = $id;
		if (!$this->Mainpick->exists()) {
			throw new NotFoundException(__('Invalid mainpick'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Mainpick->save($this->request->data)) {
				$this->Session->setFlash(__('The mainpick has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mainpick could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Mainpick->read(null, $id);
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
		$this->Mainpick->id = $id;
		if (!$this->Mainpick->exists()) {
			throw new NotFoundException(__('Invalid mainpick'));
		}
		if ($this->Mainpick->delete()) {
			$this->Session->setFlash(__('Mainpick deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Mainpick was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>