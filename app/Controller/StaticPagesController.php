<?php
App::uses('AppController', 'Controller');
/**
 * StaticPages Controller
 *
 * @property StaticPage $StaticPage
 */
class StaticPagesController extends AppController {

public function beforeFilter() {
    parent::beforeFilter();
 	$this->Auth->allow('sitemap');
 	$this->Auth->allow('search');  
}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->StaticPage->recursive = 0;
		$this->set('staticPages', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->StaticPage->id = $id;
		if (!$this->StaticPage->exists()) {
			throw new NotFoundException(__('Invalid static page'));
		}
		$this->set('staticPage', $this->StaticPage->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StaticPage->create();
			if ($this->StaticPage->save($this->request->data)) {
				$this->Session->setFlash(__('The static page has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The static page could not be saved. Please, try again.'));
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
		$this->StaticPage->id = $id;
		if (!$this->StaticPage->exists()) {
			throw new NotFoundException(__('Invalid static page'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->StaticPage->save($this->request->data)) {
				$this->Session->setFlash(__('The static page has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The static page could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->StaticPage->read(null, $id);
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
		$this->StaticPage->id = $id;
		if (!$this->StaticPage->exists()) {
			throw new NotFoundException(__('Invalid static page'));
		}
		if ($this->StaticPage->delete()) {
			$this->Session->setFlash(__('Static page deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Static page was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	public function sitemap(){
		$map_menus = $this->Menu->find('list',array('conditions'=>array('Menu.menu_id'=> NULL)));
		$this->set(compact('map_menus'));
		$this->set('title_for_layout', "Կայքի քարտեզ");
		
	}
	public function search(){
		$this->set('title_for_layout', "Որոնել");
	}
}
?>