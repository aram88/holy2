<?php
	class UtilsController extends AppController{
	public function beforeFilter() {
    parent::beforeFilter();
 	$this->Auth->allow('*');  
}
		var $name = 'Utils';
		var $uses = array('City', 'Country', 'State', 'Category', 'ProductModel', 'ModelPrice');
		
		

		public function getCities() {
			$this->autoRender = false;
			if (!empty($this->params['form']['state_id'])) {
				$this->City->recursive = -1;			
				$result = $this->City->find('all', array('fields' => array('City.id', 'City.name'), 
															'conditions' => array('City.state_id' => $this->params['form']['state_id']), 
															'order' => array('City.name ASC')
														)
											);
				$response = array();
				foreach ($result as $k => $v) {
					$response[$k] = array();
					$response[$k]['id'] = $v['City']['id'];
					$response[$k]['name'] = $v['City']['name'];
				}
				
				echo json_encode($response);
			} else {
				// echo just nothing
				echo "";
			}
			
		}
		
		public function getSubmenus() {
			$this->autoRender = false;
			if (!empty($this->request->data['menu_id'])) {
				$this->Menu->recursive = -1;			
				$result = $this->Menu->find('all', array('fields' => array('Menu.id', 'Menu.name'), 
															'conditions' => array('Menu.menu_id' => $this->request->data['menu_id']), 
															'order' => array('Menu.name ASC')
														)
											);
				$response = array();
				foreach ($result as $k => $v) {
					$response[$k] = array();
					$response[$k]['id'] = $v['Menu']['id'];
					$response[$k]['name'] = $v['Menu']['name'];
				}
				echo json_encode($response);
			} else {
				echo "";
			}
			
		}
		
	public function getQuestions() {
			$this->autoRender = false;
			if (!empty($this->request->data['menu_id'])) {
				$result = $this->Question->find('all', array('fields' => array('Question.id', 'Question.text'), 
															'conditions' => array('Question.qgroup_id' => $this->request->data['menu_id'], 'Question.publish' =>'0'), 
															'order' => array('Question.text ASC')
														)
											);
				$response = array();
				foreach ($result as $k => $v) {
					$response[$k] = array();
					$response[$k]['id'] = $v['Question']['id'];
					$response[$k]['name'] = $v['Question']['text'];
				}
				echo json_encode($response);
			} else {
				echo "";
			}
			
		}
		public function getParents() {
			$this->autoRender = false;
			if (!empty($this->request->data['menu_id'])) {
				$this->Menu->recursive = -1;			
				$result = $this->Menu->find('all', array('fields' => array('Menu.id', 'Menu.name'), 
															'conditions' => array('Menu.menu_id' => NULL), 
															'order' => array('Menu.name ASC')
														)
											);
				$response = array();
				foreach ($result as $k => $v) {
					$response[$k] = array();
					$response[$k]['id'] = $v['Menu']['id'];
					$response[$k]['name'] = $v['Menu']['name'];
				}
				echo json_encode($response);
			} else {
				echo "";
			}
			
		}
		public function getSubsubcategories() {
			$this->autoRender = false;
			if (!empty($this->request->params['form']['subcategory_id'])) {
				$this->Category->recursive = -1;			
				$result = $this->Category->find('all', array('fields' => array('Category.id', 'Category.name'), 
															'conditions' => array('Category.parent_id' => $this->params['form']['subcategory_id']), 
															'order' => array('Category.name ASC')
														)
											);
				$response = array();
				foreach ($result as $k => $v) {
					$response[$k] = array();
					$response[$k]['id'] = $v['Category']['id'];
					$response[$k]['name'] = $v['Category']['name'];
				}
				
				echo json_encode($response);
			} else {
				echo "";
			}
		}
		
	public function getImagepath (){
		$this->autoRender = false;
		
		$error = "";
		$msg = "";
		$this->destination = WWW_ROOT ."img".DS.'upload'.DS;      
		// grab the file
		$this->file = $this->request->params['form']['fileToUpload']; 
		$this->file_name = $this->params['form']['fileToUpload']['name'];
 		$this->Upload->upload($this->file, $this->destination,NULL,NULL);
		$this->res=$this->Upload->result;
		if ($this->Upload->errors){
		
			$error ="Դուք պետք է ընտրեք միայն նկար "; //"You must select Image (jpg,gif,png...)";
		} else {
			$msg = $this->res;
		}
		echo "{";
		echo				"error: '" . $error . "',\n";
		echo				"msg: '" . $msg . "'\n";
		echo "}";
		exit();
		}
		
	public function saveMedia (){
		$this->autoRender = false;


		$error = "";
		$msg = "";
		$this->destination = WWW_ROOT ."media";      
		// grab the file
		$this->file = $this->request->params['form']['fileToUpload']; 
		
		
		
 		$this->Mediamake->upload($this->file);
		$this->res=$this->Mediamake->result;
		if ($this->Mediamake->errors){
		
			$error ="Դուք պետք է ընտրեք միայն նկար "; //"You must select Image (jpg,gif,png...)";
		} else {
			$msg = $this->res;
		}
		echo "{";
		echo				"error: '" . $error . "',\n";
		echo				"msg: '" . $msg . "'\n";
		echo "}";
		exit();
		}
	}
?>