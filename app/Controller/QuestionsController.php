<?php
App::uses('AppController', 'Controller');
/**
 * Questions Controller
 *
 * @property Question $Question
 */
class QuestionsController extends AppController {
public function beforeFilter() {
    parent::beforeFilter();
 	$this->Auth->allow('add');
 	$this->Auth->allow('show');  
}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout="admin";
		$this->paginate=array( "Question"=>array(
								'order'=>'Question.created DESC',				
							    'limit'=>15,
							  ));
		$questiont=$this->paginate('Question');
		foreach ($questiont as &$quest){ 
			if (strlen($quest['Question']['text']) > 35 ){
				$quest['Question']['text'] = substr($quest['Question']['text'],0,15 )."..."; 
            }
	     }
		$this->Question->recursive = 0;
		$this->set('questions', $questiont);
		$type= array('0'=>'Այո','1'=>'Ոչ');
		$this->set(compact('type'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout="admin";
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			$this->Session->setFlash(__("Մուտքագրված է սխալ հասցե",true),'flash_error');
			$this->redirect('/');
		}
		$question = $this->Question->find('first',array(
													'conditions'=>array('Question.id'=>$id),
													'contain'=>array('Qgroup'),
													'order'=>array('Question.created')));
		$this->set(compact('question'));
	}
	public function show($id = null) {
                if (!is_numeric($id)){
			$this->Session->setFlash(__("Նշված հասցեով նյութ գոյություն չունի",true),'flash_error');
			$this->redirect('/');
		}
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			$this->Session->setFlash(__("Մուտքագրված է սխալ հասցե",true),'flash_error');
			$this->redirect('/');
		}
		$this->set('question', $this->Question->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Question->create();
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__('Շնորհակալություն ձեր հարց ուղվել է քահանային: Դուք շուտով կստանաք ձեզ հուզող հարցի պատասխանը:',true),'flash_success');
				$this->redirect('/');
			} else {
				$this->Session->setFlash(__('Հարցը չի կարող ուղղվել քանային: Դուք ունեք որոշակի սխալներ հարցի ֆորման լրացնելուց: Խնդրում ենք նորից փորձել:',true),'flash_error');
			}
		}
		$qgroups = $this->Question->Qgroup->find('list');
		$this->set(compact('qgroups'));
                $this->set('title_for_layout','Հարց քահանային');
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout="admin";
		$this->Question->id = $id;
		
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if ($this->Question->save($this->request->data)) {
				@$this->sendQuestionAnsEmail($this->request->data);
				$this->Session->setFlash(__('Շնորհակալություն դուք պատասխանեցիք հարցին :', true),'flash_success');
				$this->redirect('/generals');
			} else {
				$this->Session->setFlash(__('Կներեք չհաջողվեց պատասխանել հարցին և նամակ ուղարկել: Խնդրում ենք կրկին փորձել', true),'flash_error');
			}
		} else {
			$this->request->data = $this->Question->read(null, $id);
		}
		$qgroups = $this->Question->Qgroup->find('list');
		$this->set(compact('qgroups'));
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
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->Question->delete()) {
			$this->Session->setFlash(__('Question deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Question was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	/** Send answer message for  customer */

	private function sendQuestionAnsEmail($user) {
		$this->Email->smtpOptions = array(
		   'port'=>'465',
		   'timeout'=>'30',
		   'host' => 'ssl://smtp.holytrinity.am',
		   'username'=> Configure::read('SMPT.email'),
		   'password'=> Configure::read('SMPT.password')
		);
		
		$this->Email->delivery = 'smtp';
		$this->Email->from = Configure::read('SMPT.email') . ' <' . Configure::read('SMPT.email') . '>';
		$this->Email->to = $user['Question']['mail'] . ' <' . $user['Question']['mail'] . '>';
		 
		$this->Email->template = 'questionanswer';
		$this->Email->sendAs = 'both';
		
		$this->set('text', $user['Question']['text']);
		$this->set('ans_text', $user['Question']['ans_text']);
		
		$this->Email->subject = 'Trinity';
		return $this->Email->send();
	}
	
}?>