<?php
App::uses('AppController', 'Controller');
/**
 * Days Controller
 *
 * @property Day $Day
 */
class DaysController extends AppController {
	public $month =array(
			"1"=>"Հունվար",
			"2"=>"Փետրվար",
			"3"=>"Մարտ",
			"4"=>"Ապրիլ",
			"5"=>"Մայիս",
			"6"=>"Հունիս",
			"7"=>"Հուլիս",
			"8"=>"Օգոստոս",
			"9"=>"Սեպտեմբեր",
			"10"=>"Հոկտեմբեր",
			"11"=>"Նոյեմբեր",
			"12"=>"Դեկտեմբեր",
	);
public function beforeFilter() {
    parent::beforeFilter();
 	$this->Auth->allow('pahqrepeat');
 	$this->Auth->allow('all');
 	$this->Auth->allow('view');
 	$this->Auth->allow('create');
$this->Auth->allow('foo');
$this->Auth->allow('mailpost ');
}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout="admin";
		$this->Day->recursive = 0;
		$this->paginate= array("Day"=>array(
		'order'=>'Day.created DESC',
		'fields'=>array('*'),
		
		'limit'=>15,
		
		));
		$this->set('days', $this->paginate("Day"));
	}
/**
 * view method
 */
	public function all() {
		$this->paginate= array("Day"=>array(
											'order'=>'Day.created DESC',
											'fields'=>array('Day.name,Day.id'),
											'conditions'=>array('Day.created <='=> date("Y-m-d")),
											'limit'=>5,
											'contain'=>array('Event'=>array('fields'=>array('Event.id,Event.name')),
															 'Reading'=>array('fields'=>array('Reading.id,Reading.name')),					
															)
											));
		$days= $this->paginate("Day");
		$this->set(compact('days'));
		$this->set('title_for_layout',"Բոլոր օրերի գրառումները");
	}
/**	
/**
 */
	public function view($id = null) {
	if (!is_numeric($id)){
			$this->Session->setFlash(__("Նշված հասցեով նյութ գոյություն չունի",true),'flash_error');
			$this->redirect('/');
		}
		$this->Day->id = $id;
		if (!$this->Day->exists()) {
			$this->Session->setFlash(__('Մուտքագրված է սխալ հասցե',true),'flash_error');
			$this->redirect('/');
		}
		$day=$this->Day->find("first",array(
											'conditions'=>array('Day.id'=>$id),
											'fields'=>array('Day.id,Day.name'),
											'contain'=>array('Event'=>array('fields'=>array('Event.id,Event.name'),'order'=>'Event.position DESC,  Event.created DESC',),
															 'Reading'=>array('fields'=>array('Reading.id,Reading.name'),'order'=>'Reading.position DESC,  Reading.created DESC',),					
															)
											));
		$this->set(compact('day'));
		$this->set('title_for_layout',$day['Day']['name']);
	}
/**
 * created method
 */
	public function create() {
		if (!$this->Auth->loggedIn()){
			$this->redirect('/');
		}
		$this->layout="admin";
		if ($this->request->is('post')) {
			
			if (!empty($this->request->data['Day']['created'])){
				$this->request->data['Day']['created']= date("Y-m-d", strtotime($this->request->data['Day']['created']));
			
			} else {
				$this->request->data['Day']['created']= date("Y-m-d H:i");
			}
			$day = $this->request->data['Day']['created'];
			$res = $this->Day->find('all',array(
							'conditions'=>array('Day.id'=>$this->request->data['Day']['old_day']),
							'contain'=>array(
									'Event'=>array(
										'fields'=>array('Event.*'),
										'order'=>'Event.position DESC,  Event.created DESC',	
									),
									'Reading'=>array(
										'fields'=>array('Reading.*'),
										'order'=>'Reading.position DESC,  Reading.created DESC',	
									),
							)
			));
			
			if (!isset($res)){
				$this->Session->setFlash(__('Չհաջողվեց պահպանել օրը, խնդրում ենք նորից փորձել',true),'flash_error');
			}
			$this->Day->create();
			if ($this->Day->save($this->request->data['Day'])) {
				$i = 60;
				foreach ($res['0']['Event']  as $event){
					$Event = array();
					$Event =$event;
					$Event['id']= NULL;
					$Event['day_id']= $this->Day->id;
					$Event['created']= $day;
					$Event['position']= $i;
					$i--;
					$this->Event->create();
					$this->Event->save($Event); 
				}
				$i = 60;
				foreach ($res['0']['Reading']  as $reading){
					$Reading = array();
					$Reading =$reading;
					$Reading['id'] =NULL;
					$Reading['day_id']= $this->Day->id;
					$Reading['created']= $day;
					$Reading['position']= $i;
					$i--;
					$this->Reading->create();
					$this->Reading->save($Reading);
				}				
				$this->Session->setFlash(__('Օրը հաջողությամբ պահպանվել է',true),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Չհաջողվեց պահպանել օրը, խնդրում ենք նորից փորձել',true),'flash_error');
			}
		}
	}	
	public function pahqrepeat(){
		if (!$this->Auth->loggedIn()){
			$this->redirect('/');
		}
		$this->layout="admin";
		if ($this->request->is('post')) {
			if (!isset($this->request->data['Day']['created']) || empty($this->request->data['Day']['created'])){
				$this->Session->setFlash(__('Չհաջողվեց պահպանել օրը, խնդրում ենք նորից փորձել',true),'flash_error');
				$this->redirect($this->referer());
			}
			$res = $this->Day->find('all',array(
					'conditions'=>array('Day.id >='=>173),'limit'=>49,
					'contain'=>array(
							'Event'=>array(
									'fields'=>array('Event.*'),
									'order'=>'Event.position DESC,  Event.created DESC',
							),
							'Reading'=>array(
									'fields'=>array('Reading.*'),
									'order'=>'Reading.position DESC,  Reading.created DESC',
							),
					)
			));
			$i=0;
			foreach ($res as $days){
				$this->Day->create();
				$day = array();
				$day['created'] =date("Y-m-d H:i", strtotime($this->request->data['Day']['created']."+$i days"));
				$day['name'] = $this->month[(int)date("m",strtotime($day['created']))] . " ". (int)date("d",strtotime($day['created']));
				$this->Day->save($day);
				$i++;
				$j = 60;
				foreach ($days['Event'] as $event){
					$Event = array();
					$Event =$event;
					$Event['id']= NULL;
					$Event['day_id']= $this->Day->id;
					$Event['created']= $day;
					$Event['position']= $j;
					$j--;
					$this->Event->create();
					$this->Event->save($Event);
					
				}
				$j = 60;
				foreach ($days['Reading']  as $reading){
					$Reading = array();
					$Reading =$reading;
					$Reading['id'] =NULL;
					$Reading['day_id']= $this->Day->id;
					$Reading['created']= $day;
					$Reading['position']= $j;
					$j--;
					$this->Reading->create();
					$this->Reading->save($Reading);
				}
				
				
			}
			$this->Session->setFlash(__('Մեծ պահքը հաջողությամբ պահպանվեց',true),'flash_success');
			$this->redirect(array('action' => 'index'));
				
		}
		
	}
/**
 * add method
 */
	public function add() {
		$this->layout="admin";
		if ($this->request->is('post')) {
			$this->Day->create();
			if (!empty($this->request->data['Day']['created'])){
				$this->request->data['Day']['created']= date("Y-m-d H:i", strtotime($this->request->data['Day']['created']));
			} else {
				$this->request->data['Day']['created']= date("Y-m-d H:i");
			} 
			if ($this->Day->save($this->request->data)) {
				$this->Session->setFlash(__('Օրը հաջողությամբ պահպանվել է',true),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Չհաջողվեց պահպանել օրը, խնդրում ենք նորից փորձել',true),'flash_error');
			}
		}
	}
/**
 * edit method
 */
	public function edit($id = null) {
		$this->layout="admin";
		$this->Day->id = $id;
		if (!$this->Day->exists()) {
			$this->Session->setFlash(__('Մուտքագրված է սպխալ հասցե',true),'flash_error');
			$this->redirect('index');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['Day']['created']= date("Y-m-d H:i", strtotime($this->request->data['Day']['created']));
			if ($this->Day->save($this->request->data)) {
				$this->Session->setFlash(__('Օրը հաջողությամբ պահպանվեց',true),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Օրը չի կարող պահպանվել, Խնդրում ենք նորից փորձել',true),'flash_error');
			}
		} else {
			$this->request->data = $this->Day->read(null, $id);
		}
	}
/**
 * delete method
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Day->id = $id;
		if (!$this->Day->exists()) {
			$this->Session->setFlash(__('Մուտքագրված է սխալ հասցե',true),'flash_error');
			$this->redirect('index');
		}
		if ($this->Day->delete($id,$caskade=true)) {
			$this->Session->setFlash(__('Օրը հաջողությայմբ ջնջվեց',true),'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Չհաջողվեց ջնջել օրը, խնդրում ենք նորից փորձել',true),'flash_error');
		$this->redirect(array('action' => 'index'));
	}

 public function foo(){
   // multiple recipients
$to  = '';
// subject
$subject = 'Birthday Reminders for August';

// message
$message = '
<html>
<head>
  <title>Birthday Reminders for August</title>
</head>
<body>
  <table border="0" cellspacing="0" cellpadding="0"
  style="font-family:Helvetica,Arial,sans-serif;border-collapse:collapse;width:100% !important;font-family:Helvetica,Arial,sans-serif;padding:0;"
  width="100%" bgcolor="#DFDFDF">
    <tbody>
       <tr>
            <td colspan="3">
              <table border="0" cellspacing="0" cellpadding="0" style="font-family:Helvetica,Arial,sans-serif;" width="1">
               <tbody>
                <tr>
                 <td>
                  <div style="height:5px;font-size:5px;line-height:5px;">
                   &nbsp;
                  </div></td>
                </tr>
               </tbody>
              </table>
          </td>
       <tr/>

        <tr>
            <td>
                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="table-layout:fixed;">
                   <tbody>
                    <tr>
                         <td align="center" style="padding-top: 30px; padding-bottom: 30px;">
                              <table border="0" cellspacing="20" cellpadding="0"  width="600" bgcolor="#fff"  style=" font-family:Helvetica,Arial,sans-serif;min-width:290px; border-radius: 5px; border: 1px solid #999;  ">
                                    <tr>
                                        <td style="position: relative;" >
                                        <img src="http://www.holytrinity.am/img/home/logo.png" height="100px"  style="float:left; display: block;" />
                                       &nbsp;&nbsp;&nbsp;<span style="font-size: 16px; color: #770011; ">
                                        Հայ Առաքելական Սուրբ Եկեղեցի
                                        </span>
                                        <br/>
                                         &nbsp;&nbsp;&nbsp;<span style="font-size: 16px; color: #770011;">
                                        Արարատյան Հայրապետական Թեմ
                                        </span>
                                         <br/>
                                        &nbsp;&nbsp;&nbsp; <span style=" font-size: 16px; color: #770011; ">
                                        ՍՈՒՐԲ ԵՐՐՈՐԴՈՒԹՅՈՒՆ ԵԿԵՂԵՑԻ
                                        </span>
                                        </td>

                                    </tr>
                                    <tr style="padding-top: 50px;">
                                        <td><strong>ՍՈՒՐԲ ԵՐՐՈՐԴՈՒԹՅՈՒՆ ԵԿԵՂԵՑԻ</strong></td>
                                    </tr>
                                     <tr style="padding-top: 50px">
                                        <td>Մայր Աթոռ Սուրբ Էջմիածնից ողջունում ենք ՀՀ Գիտությունների Ազգային Ակադեմիայի և Երևանի պետական համալսարանի համատեղ նախաձեռնությամբ Հայոց Ցեղասպանության 100-րդ տարելիցին նվիրված` «Հայոց Ցեղասպանություն 100. ճանաչումից հատուցում» միջազգային գիտաժողովի կազմակերպումը և Հայրապետական Մեր օրհնությունը հղում գիտաժողովի բոլոր մասնակիցներին:</td>
                                    </tr>
                                    <tr style="padding-top: 50px">
                                        <td>Որին կարող եք ծանոթանալ հետևյալ հասցեով <a href="http://surbzoravor.am//post/view/amenayn-hayoc-katoghikosy-patgam-e-hghel--hayoc-ceghaspanutyun-100-chanachumic-hatucum-mijazgayin-gita%d5%aaoghovi-masnakicnerin" target="_blank" onclick="onClickUnsafeLink(event);">http://surbzoravor.am//post/viewamenayn-hayoc-katoghikosy-patgam-e-hghel--hayoc-ceghaspanutyun-100-chanachumic-hatucum-mijazgayin-gitaժoghovi-masnakicnerin</a><a target="_blank" onclick="onClickUnsafeLink(event);">
</a></td>
                                    </tr>


                              </table>
                        </td>

                    </tr>
                   </tbody>
                </table>
            </td>
        </tr>
    </tbody>

  </table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

// Additional headers
$headers .= 'To:<aramgrig@hotmail.com>,<miki_grig@mail.ru>,<grigoryanaram88@gmail.com>' . "\r\n";
$headers .= 'From: Birthday Reminder <subscribe@holytrinity.am>' . "\r\n";

// Mail it
var_dump(mail($to, $subject, $message, $headers));die;
    }

public function mailpost ($text, $id, $email, $name, $in=NULL){
        $text = "Բարև ձեզ  մեր կայքում ավելացել է նոր նյութ։
                     <br/> <br/><b>".$name
            ."</b><br/> <br/>".$text
            ."<br/><br/> Որին կարող եք ծանոթանալ հետևյալ հասցեով <a href=".'http://holytrinity.am'."/posts/view/".$id.">".'http://holytrinity.am'."/post/view/".$id."<a/>";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= 'To:<'.$email.'>' . "\r\n";
        $headers .= 'From: Holy Trinity <'. Configure::read('SMPT.email'.$in) .'>' . "\r\n";
        $email = '';

        mail('', 'New Post', $text,$headers);
return true;

    }
}?>