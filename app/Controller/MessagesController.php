<?php
App::uses('AppController', 'Controller');
/**
 * Messages Controller
 *
 * @property Message $Message
 */
class MessagesController extends AppController {
public function beforeFilter() {
    parent::beforeFilter();
 	$this->Auth->allow('add');
}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('title_for_layout',"Õ†Õ´Õ¡Õ¯Õ¶Õ¥Ö€");
		$this->layout="admin";
		$this->paginate=array( "Message"=>array(
								'order'=>'Message.created DESC',				
							    'limit'=>20,
							  ));
		$messages = $this->paginate('Message');
		$this->set(compact('messages'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Invalid message'));
		}
		$this->set('message', $this->Message->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->set('title_for_layout','Հետադարձ Կապ');
		if ($this->request->is('post')) {
			$this->Message->set( $this->request->data );
			unset($this->Message->validate['ans']);
			if ($this->Message->validates()){
			  $to = "info@holytrinity.am"; 
                               
				$subject = $this->request->data['Message']['subject'];
				$txt = $this->request->data['Message']['text'];
				$headers = "From: {$this->request->data['Message']['mail']} ";
	            //mail($to,$subject,$txt,$headers);
				if (mail($to,$subject,$txt,$headers)) {
					$this->Session->setFlash(__('Շնորհակալություն ձեր նամակի համար մենք շուտով կպատասխանենք դրան:',true),'flash_success');
					$this->redirect('/');
				} else {
					$this->Session->setFlash(__('Չհաջողվեց ուղարկել հարցը խնդրում ենք, նորից փորձել: ',true),'flash_error');
				}
			}else {
					$this->Session->setFlash(__('Չհաջողվեց ուղարկել հարցը խնդրում ենք, նորից փորձել: ',true),'flash_error');
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
		$this->set('title_for_layout',"Պատասխանել նամակին");
		$this->layout="admin";
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			$this->Session->setFlash(__('Չհաջողվեց պպատասխանել նամակին, խնդրում ենք նորից փորձել ',true),'flash_error');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			@$this->sendEmail($this->request->data);
			if ($this->Message->delete($this->request->data['Message']['id'])) {
				
					$this->Session->setFlash(__('Նամակը պատսխանվել է հաջողությամբ',true),'flash_success');
					$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Չհաջողվեց պպատասխանել նամակին, խնդրում ենք նորից փորձել ',true),'flash_error');
			}
		} else {
			$this->request->data = $this->Message->read(null, $id);
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
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Invalid message'));
		}
		if ($this->Message->delete()) {
			$this->Session->setFlash(__('Message deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Message was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	private function sendEmail($user) {
		$this->Email->smtpOptions = array(
		   'port'=>'465',
		   'timeout'=>'30',
		   'host' => 'ssl://smtp.gmail.com',
		   'username'=> Configure::read('SMPT.email'),
		   'password'=> Configure::read('SMPT.password')
		);
		$this->Email->delivery = 'smtp';
		$this->Email->from = Configure::read('SMPT.email') . ' <' . Configure::read('SMPT.email') . '>';
		$this->Email->to = $user['Message']['mail'] . ' <' . $user['Message']['mail'] . '>';
		$this->Email->template = 'userans';
		$this->Email->sendAs = 'both';
		$this->set('text', $user['Message']['ans']);
		$this->Email->subject = $user['Message']['subject'];
		return $this->Email->send();
	}
}
?>