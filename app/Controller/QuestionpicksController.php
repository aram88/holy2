<?php
App::uses('AppController', 'Controller');
/**
 * Questionpicks Controller
 *
 * @property Questionpick $Questionpick
 */
class QuestionpicksController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Questionpick->recursive = 0;
		$this->set('questionpicks', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Questionpick->id = $id;
		if (!$this->Questionpick->exists()) {
			throw new NotFoundException(__('Invalid questionpick'));
		}
		$this->set('questionpick', $this->Questionpick->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Questionpick->create();
			if ($this->Questionpick->save($this->request->data)) {
				$this->Session->setFlash(__('The questionpick has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The questionpick could not be saved. Please, try again.'));
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
		$this->Questionpick->id = $id;
		if (!$this->Questionpick->exists()) {
			throw new NotFoundException(__('Invalid questionpick'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Questionpick->save($this->request->data)) {
				$this->Session->setFlash(__('The questionpick has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The questionpick could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Questionpick->read(null, $id);
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
		$this->Questionpick->id = $id;
		if (!$this->Questionpick->exists()) {
			throw new NotFoundException(__('Invalid questionpick'));
		}
		if ($this->Questionpick->delete()) {
			$this->Session->setFlash(__('Questionpick deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Questionpick was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>