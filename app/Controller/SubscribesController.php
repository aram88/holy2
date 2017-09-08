<?php
App::uses('AppController', 'Controller');
/**
 * subscribes Controller
 *
 * @property Qgroup $Qgroup
 */
class SubscribesController extends AppController {
public function beforeFilter() {
    parent::beforeFilter();
 	$this->Auth->allow('add');
 	$this->Auth->allow('sendhashEmail');
 	$this->Auth->allow('remove');
}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('tite_for_layout','Բաժանորդագրվողներ');
		$this->layout='admin';
			$this->paginate=array( "Subscribe"=>array(
							    'fields'=>array('Subscribe.id,Subscribe.email'),
							    'limit'=>20,
							  ));
		$subscribes = $this->paginate('Subscribe');
		$this->set(compact('subscribes'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view() {
		$this->layout='admin';
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Subscribe->set( $this->request->data );
			unset($this->Subscribe->validate['email']);
			if ($this->Subscribe->validates()) {
				$emails = $this->Subscribe->find('all',array('fileds'=>array('Subscribe.email,Subscrbe.id')));
				
				foreach ($emails as $mail){
                                           $in = rand(1, 4);
					@$this->sendEmail($mail['Subscribe']['email'],$this->request->data['Subscribe']['text'],$this->request->data['Subscribe']['subject'],$in);
				}
				$this->Session->setFlash(__('Նամակները հաջողությամբ ուղարկվեցին '),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Նամակները չեն ուղարկվել, խնդրում ենք նորից փորձել '),'flash_error');
			}
		} else {
			
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
	
		if ($this->request->is('post')) {
			$this->Subscribe->set( $this->request->data );
			if ($this->Subscribe->validates()){
                           
				$this->request->data['Subscribe']['hash'] = String::uuid();
                             
				$this->Subscribe->create();
				unset($this->Subscribe->validate['text']);
				if (!@$this->sendHashEmail($this->request->data)){
					$errors = $this->Subscribe->invalidFields();
					$this->Session->setFlash('Մուտքագրված է սխալ Էլ. հասցե','flash_error');
					$this->redirect($this->referer());
				}
				if ($this->Subscribe->save($this->request->data)) {
					
					$this->Session->setFlash(__('Շնորհակալություն դուք հաջողությամբ բաժանորդագրվեցիք մեր կայքին: Դուք կստանաք նամակներ մեր էջում կատարվող թարմացումների մասին:  '),'flash_success');
					$this->redirect('/');
				} else {
					$errors = $this->Subscribe->invalidFields();
					$this->Session->setFlash($errors['email']['1'],'flash_error');
					$this->redirect($this->referer());
				}
			}else {
					$errors = $this->Subscribe->invalidFields();
					$this->Session->setFlash($errors['email']['1'],'flash_error');
					$this->redirect($this->referer());
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
		ini_set("max_execution_time",0);
		ini_set("max_input_time", '-1');
		$this->layout='admin';
		$this->Subscribe->id = $id;
		if (!$this->Subscribe->exists()) {
			throw new NotFoundException(__('Invalid subscribe'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Subscribe->set( $this->request->data );
			$in = rand(1, 4);
			if ($this->Subscribe->validates()) {
				@$this->sendEmail($this->request->data['Subscribe']['email'],$this->request->data['Subscribe']['text'],$this->request->data['Subscribe']['subject'],$in);
				$this->Session->setFlash(__('Նամակը հաջողությամբ ուղարկվեց '),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Նամակը չի ուղարկվել, խնդրում ենք նորից փորձել '),'flash_error');
			}
		} else {
			$this->request->data = $this->Subscribe->read(null, $id);
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
		$this->Subscribe->id = $id;
		if (!$this->Subscribe->exists()) {
			throw new NotFoundException(__('Invalid subscribe'));
		}
		if ($this->Subscribe->delete()) {
			$this->Session->setFlash(__('Subscribe deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Subscribe was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	private function sendHashEmail($user) {
		$this->Email->smtpOptions = array(
		   'port'=>'465',
		   'timeout'=>'30',
		    'host' => 'ssl://smtp.holytrinity.am',
		   'username'=> Configure::read('SMPT.email'),
		   'password'=> Configure::read('SMPT.password')
		);
		 
		$this->Email->delivery = 'smtp';
		$this->Email->from = 'Holy Trinity' . ' <' . Configure::read('SMPT.email') . '>';
		$this->Email->to = $user['Subscribe']['email'] . ' <' . $user['Subscribe']['email'] . '>';
		$this->Email->template = 'hash_message';
		$this->Email->sendAs = 'both';
		$activation_url = Router::url("/subscribes/remove/" . $user['Subscribe']['hash'], true);
		
		$this->set('activation_url', $activation_url);
		$this->Email->subject = 'Holy Trinity Subscribe';
		return $this->Email->send();
	}
	private function sendEmail($user,$text,$subject,$in=NULL) {
		$this->Email->smtpOptions = array(
		   'port'=>'465',
		   'timeout'=>'30',
		    'host' => 'ssl://smtp.holytrinity.am',
		   'username'=> Configure::read('SMPT.email'.$in),
		   'password'=> Configure::read('SMPT.password'.$in)
		);
		 
		$this->Email->delivery = 'smtp';
		$this->Email->from = 'Holy Trinity'. ' <' . Configure::read('SMPT.email'.$in) . '>';
		$this->Email->to = $user . ' <' . $user . '>';
		$this->Email->template = 'send_submessage';
		$this->Email->sendAs = 'both';
		$this->set('text',$text);
		if (!empty($subject)){
			$this->Email->subject = $subject;
		} else {
			$this->Email->subject = 'Holy Trinity Church';
		}
		if ($this->Email->send()){
			return true;
		}else {
			return false;
			
		}
	}
	function remove($hash=null) {
		$this->autoRender = false;
		if(!is_null($hash)){
			$user = $this->Subscribe->findByHash($hash);
			if($user) {
				$this->Subscribe->id = $user['Subscribe']['id'];
				if ($this->Subscribe->delete()) {
					$this->Session->setFlash(__('Ձեր Էլ. հասցեն ջնջվել է մեր մոտից, դուք այլևս մեր կայքից նամակներ չեք ստանա: Շնորհակալություն:'),'flash_success');
					$this->redirect('/');
				}else {
					$this->Session->setFlash(__('Չհաջողվեց ջնջել ձեր տվյալները, խնդրում են, նորից փորձել:' , true), 'flash_error');
					$this->redirect ('/');
				}
		
			}
		} else {
			$this->Session->setFlash(__('Չհաջողվեց ջնջել ձեր տվյալները, խնդրում են, նորից փորձել:' , true), 'flash_error');
			$this->redirect ('/');
		}
		
	}	
}
?>