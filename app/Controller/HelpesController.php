<?php
App::uses('AppController', 'Controller');
/**
 * Helps Controller
 *
 * @property Help $Help
 */
class HelpesController extends AppController {
public function beforeFilter() {
    parent::beforeFilter();
 	$this->Auth->allow('add');  
}
/*** validate**/
public   function valid ($data){
	
	if (preg_match('/<\s*\w.*?>/', $data)){
			return false;
		}

		if (preg_match('/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/', $data)){
			return false;
		} else {
			return true;
		}
	
}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Helpe->recursive = 0;
		$this->set('helpes', $this->paginate());
		$this->layout = 'admin';
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'admin';
		$this->Helpe->id = $id;
		if (!$this->Helpe->exists()) {
			throw new NotFoundException(__('Invalid helpe'));
		}
		$this->set('helpe', $this->Helpe->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		 $this->set('title_for_layout','Հրավեր ծառայության');
		
		if ($this->request->is('post')) {
			
			$this->Helpe->create();
			$this->Helpe->set( $this->request->data );
			if ($this->Helpe->validates()){
				
				if ( empty($this->request->data['Helpe']['home_tell']) && empty($this->request->data['Helpe']['work_tell']) && empty($this->request->data['Helpe']['mobile_tell'])){
					$this->Session->setFlash(__('Հայտը չի պահպանվել,խնդրում ենք նշել առնվազն մեկ հեռախոսահամր, որպեսզի կարողանաք ձեր հետ կապնվել:',false),'flash_error');
				}else{
					$error = 0;
					foreach ($this->request->data['Helpe'] as $key=> $value) {
						if ($key == 'email'){
							continue;
						}
						
						if ( $this->valid($value) == false){
							$error = 1; break;
						}
					} 
					if ($error == 1){
						$this->Session->setFlash(__('Կայքում արգելված է գրել որևէ HTML տագ կամ հղում: Եթե ձեր հարցաթերթիկը պարունակում է որևէ հղում, 
				    ապա խնդրում ենք այն ուղարկել մաիլի օգնությամբ, կայքի ապահովությունից ելնելով ',false),'flash_error');
					}else {
						if ($this->Helpe->save($this->request->data)) {
							$this->sendAdminMail($this->request->data['Helpe']);
							$this->Session->setFlash(__('Շնորհակալություն հայտը լրացնելու համար, մենք որոշ ժամանակ հետո կկապնվենք Ձեձ հետ ',false),'flash_success');
							$this->redirect('/');
						} else {
							$this->Session->setFlash(__('Հայտը չի կարող պահպանվել,խնդրում ենք նորից փորձել',false),'flash_error');
						}
					}
					
				}
				
			}else{
				$this->Session->setFlash(__('Հայտը չի կարող պահպանվել,խնդրում ենք նորից փորձել',false),'flash_error');
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
		$this->layout = 'admin';
		$this->Helpe->id = $id;
		if (!$this->Helpe->exists()) {
			throw new NotFoundException(__('Invalid helpe'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Helpe->save($this->request->data)) {
				$this->Session->setFlash(__('The helpe has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The helpe could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Helpe->read(null, $id);
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
		$this->Helpe->id = $id;
		if (!$this->Helpe->exists()) {
			throw new NotFoundException(__('Invalid helpe'));
		}
		if ($this->Helpe->delete()) {
			$this->Session->setFlash(__('Helpe deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Helpe was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
   /** Send for for  */

	private function sendAdminMail($data) {
		$this->Email->smtpOptions = array(
		   'port'=>'465',
		   'timeout'=>'30',
		   'host' => 'ssl://smtp.holytrinity.am',
		   'username'=> 'holytrinity@holytrinity.am',
		   'password'=> 'Narman302%'
		);
		
		$this->Email->delivery = 'smtp';
		$this->Email->from = 'Holy Trinity' . ' <' . 'holytrinity@holytrinity.am' . '>';
		$this->Email->to = Configure::read('SMPT.email') . ' <' .Configure::read('SMPT.email') . '>';
		 
		$this->Email->template = 'harcatertik';
		$this->Email->sendAs = 'both';
		
		$this->set('data', $data);
		
		
		
		$this->Email->subject = 'Lracvac harcatertik';
		return $this->Email->send();
	}
}
