<?php
App::uses('AppController', 'Controller');
App::import('Controller', 'Days'); // mention at top
/**
 * Posts Controller
 *
 * @property Post $Post
 */
class PostsController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view');
         $this->Auth->allow('foo');
    }
    private $parents= array();
    /** find parrent */
    public $i = 0;
    public function getParent($chid=NULL){
        $this->Menu->recursive = 0;
        $parent=$this->Menu->find('first', array(
                'conditions'=>array('Menu.id'=>$chid),
                'fields'=>array('Menu.id,Menu.menu_id,Menu.name')
            )
        );
        $this->parents[$this->i]['name']=$parent['Menu']['name'];
        $this->parents[$this->i]['id']=$parent['Menu']['id'];
        $this->i++;

        if ($parent['Menu']['menu_id']!=NULL){
            $this->getParent($parent['Menu']['menu_id']);
        }else {
            return ;
        }
    }
    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->layout= "admin";
        $this->paginate=array( "Post"=>array(
            'order'=>'Post.created DESC',
            'fields'=>array('Post.id,Post.created,Post.name,Post.img,Post.stick'),
            'limit'=>20,
            'contain'=>array('Menu'=>array(
                'fields'=>array('Menu.id,Menu.name')
            )
            )

        ));
        $posts = $this->paginate('Post');
        $stick = array('0'=>'Ոչ','1'=>'Այո');
        $this->set(compact('stick'));
        $this->set(compact('posts'));
        $this->set('title_for_layout','Նյութերի ցուցակ');

    }
    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!is_numeric($id)){
            $this->Session->setFlash(__("Նշված հասցեով նյութ գոյություն չունի",true),'flash_error');
            $this->redirect('/');
        }
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            $this->Session->setFlash(__("Նշված հասցեով նյութ գոյություն չունի",true),'flash_error');
            $this->redirect('/');
        }
        $post=$this->Post->read(null, $id);

        $ping =  $post['Post']['ping'] +1;
        $this->Post->set('ping',$ping);
        $this->Post->save();

        $post['Post']['created'] = date("Y.m.d ", strtotime($post['Post']['created']));
        $this->getParent($post['Post']['menu_id']);
        if (!empty($this->parents)){
            $this->parents=array_reverse($this->parents);
            $this->set('parents',$this->parents);
        }
        $this->set('title_for_layout',$post['Post']['name']);
        $this->set(compact('post' ));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        ini_set("max_execution_time",0);
        ini_set("max_input_time", '-1');


        $this->layout="admin";
        $types = array('0'=>'pdf ֆորմատ','1'=>'աուդիո ֆորմատ');
        $media = $this->Media->find('all',array('limit'=>10,'order'=>'created DESC' ,'fields'=>array('Media.path')));
        $medias = array();
        foreach ($media as $med){
            $medias[$med['Media']['path']]= $med['Media']['path'];
        }

        $this->set(compact('types','medias'));
        if ($this->request->is('post')) {
            $this->Post->set( $this->request->data );
            if ($this->Post->validates()){
                $count=0;
                unset($this->request->data['Post']['menu_id']);
                foreach ($this->request->data['Menu']['parent'] as $parent){
                    if (!empty($parent)){
                        if (!empty($this->request->data['Post']['imgpath'])){
                            if ($this->request->data['x']!= 'none' && $this->request->data['y']!='none' && $this->request->data['h']!='none' && $this->request->data['w']!='none'){
                                $destination = WWW_ROOT."img".DS."upload";
                                // grab the file
                                $file = $this->request->data['Post']['imgpath'];
                                $size =  array($this->request->data['w'],$this->request->data['h'],$this->request->data['x'],$this->request->data['y']);
                                $this->Crop->image($file, $destination,NULL,$size,NULL);
                                $res=$this->Crop->result;
                                $imgPath = 'upload'.DS.$res;
                                $destination = WWW_ROOT."img".DS."upload";
                                // grab the file
                                $file = $res;
                                $realpath = "post";
                                $type = 'resizecrop';
                                $a = $this->request->data['w']/$this->request->data['h'];
                                $w1 = 250;
                                $h1 = ceil( 250/$a);
                                if ($h1 <200){
                                    $h1 = 200;
                                }
                                $w2 = 150;
                                $h2 = ceil( 150/$a);
                                $w3 = 60;
                                $h3 = ceil( 60/$a);
                                $x = 0; $y = 0;
                                $IMAGE_DIMENSIONS = array(
                                    'mt'=>array($w1,$h1,$x,$y),
                                    'st'=>array($w2,$h2,$x,$y),
                                    'sm'=>array($w3,$h3,$x,$y),
                                );
                                foreach ($IMAGE_DIMENSIONS as $prefix => $size) {
                                    if ($prefix == 'mt'){
                                        $this->Crop->image($file, $destination,$type,$size,$realpath);
                                    } else {
                                        $this->Crop->image($file, $destination,$type,$size,$realpath,$prefix);
                                    }
                                    $results[$prefix] = $this->Crop->result;
                                    if (is_array($this->Crop->errors)){
                                        $errors_img = implode("<br />", $this->Crop->errors);
                                        break;
                                    }
                                }
                                if (!empty($imgPath)){
                                 //   $file = new File(WWW_ROOT ."img".DS.$imgPath);
                                  //  $file->delete();
                                }

                            } else {
                                $destination = WWW_ROOT."img".DS."upload";
                                // grab the file
                                $file = $this->request->data['Post']['imgpath'];
                                $realpath = "post";
                                $type = 'resizecrop';
                                $w1 = 250;
                                $h1 = 200;
                                $w2 = 150;
                                $h2 = 116;
                                $w3 = 60;
                                $h3 = 46;
                                $x = 0; $y = 0;
                                $IMAGE_DIMENSIONS = array(
                                    'mt'=>array($w1,$h1,$x,$y),
                                    'st'=>array($w2,$h2,$x,$y),
                                    'sm'=>array($w3,$h3,$x,$y),
                                );
                                foreach ($IMAGE_DIMENSIONS as $prefix => $size) {
                                    if ($prefix == 'mt'){
                                        $this->Crop->image($file, $destination,$type,$size,$realpath);
                                    } else {
                                        $this->Crop->image($file, $destination,$type,$size,$realpath,$prefix);
                                    }
                                    $results[$prefix] = $this->Crop->result;
                                    if (is_array($this->Crop->errors)){
                                        $errors_img = implode("<br />", $this->Crop->errors);
                                        break;
                                    }
                                }

                            }
                        } else {
                            if (!empty($errors_img)){
                                $img_error = "Error";
                            }
                        }
                        if (empty($img_error)){
                            $this->Post->create();
                            $this->request->data['Post']['img']= @$results['mt'];
                            $this->request->data['Post']['menu_id'] = $parent;/////ssssssssss
                            if (!empty($this->request->data['Post']['created'])){
                                $this->request->data['Post']['created']= date("Y-m-d H:i", strtotime($this->request->data['Post']['created']));
                            } else {
                                $this->request->data['Post']['created']= date("Y-m-d H:i");
                            }
                            unset($this->request->data['Post']['parent']);
                            if ($this->Post->save($this->request->data)) {  if(isset($this->request->data['Post']['home_page'])){unset($this->request->data['Post']['home_page']);}

                                if ($this->request->data['Post']['type']){

                                    $xmldoc = new DOMDocument();
                                    $xmldoc->load(WWW_ROOT.DS.'dewplayer'.DS.'playlist.xml');

                                    $xpath = new DOMXPath($xmldoc);
                                    $query = $xpath->query('/playlist/trackList[@id = "1"]');
                                    $item = $xmldoc->createElement('track');
                                    $create_new_node = true;
                                    $id = $xmldoc->createElement('id', $this->Post->id );
                                    $item->appendChild($id);
                                    $title= $xmldoc->createElement('title', $this->request->data['Post']['name'] );
                                    $item->appendChild($title);
                                    $title= $xmldoc->createElement('location', "/media/".$this->request->data['Post']['path'] );
                                    $item->appendChild($title);


                                    if($create_new_node)
                                    {
                                        $xmldoc->getElementsByTagName('trackList')->item(0)->appendChild($item);
                                    }


                                    $xmldoc->save(WWW_ROOT.DS.'dewplayer'.DS.'playlist.xml');

                                }
                                $this->General->create();
                                $general['General']['post_id']=$this->Post->id;
                                $general['General']['created']=$this->request->data['Post']['created'];
                                $this->General->save($general);
                                if ($count == 0 ){
                                    $post_id = $this->Post->id;
                                    $post_text = substr($this->request->data['Post']['text'], '0', '450');
                                    $post_name = $this->request->data['Post']['name'];
                                }
                                $count=$count+1;
                            } else {
                                $this->Session->setFlash(__("Նյութը չի պահպանվել, խնդրում ենք նորից փորձել ",true),'flash_error');
                            }
                        }
                    }
                }
               // @$file = new File(WWW_ROOT ."img".DS."upload".DS. $this->request->data['Post']['imgpath']);
               // @$file->delete();
                if ($count==0){

                    if (!empty($this->request->data['Post']['imgpath'])){
                        if ($this->request->data['x']!= 'none' && $this->request->data['y']!='none' && $this->request->data['h']!='none' && $this->request->data['w']!='none'){
                            $destination = WWW_ROOT."img".DS."upload";
                            // grab the file
                            $file = $this->request->data['Post']['imgpath'];
                            $size =  array($this->request->data['w'],$this->request->data['h'],$this->request->data['x'],$this->request->data['y']);
                            $this->Crop->image($file, $destination,NULL,$size,NULL);
                            $res=$this->Crop->result;
                            $imgPath = 'upload'.DS.$res;
                            $destination = WWW_ROOT."img".DS."upload";
                            // grab the file
                            $file = $res;
                            $realpath = "post";
                            $type = 'resizecrop';
                            $a = $this->request->data['w']/$this->request->data['h'];
                            $w1 = 250;
                            $h1 = ceil( 250/$a);
                            if ($h1 < 200){
                                $h1 = 200;
                            }
                            $w2 = 150;
                            $h2 = ceil( 150/$a);
                            $w3 = 60;
                            $h3 = ceil( 60/$a);
                            $x = 0; $y = 0;
                            $IMAGE_DIMENSIONS = array(
                                'mt'=>array($w1,$h1,$x,$y),
                                'st'=>array($w2,$h2,$x,$y),
                                'sm'=>array($w3,$h3,$x,$y),
                            );
                            foreach ($IMAGE_DIMENSIONS as $prefix => $size) {
                                if ($prefix == 'mt'){
                                    $this->Crop->image($file, $destination,$type,$size,$realpath);
                                } else {
                                    $this->Crop->image($file, $destination,$type,$size,$realpath,$prefix);
                                }
                                $results[$prefix] = $this->Crop->result;
                                if (is_array($this->Crop->errors)){
                                    $errors_img = implode("<br />", $this->Crop->errors);
                                    break;
                                }
                            }
                            if (!empty($imgPath)){
                               // $file = new File(WWW_ROOT ."img".DS.$imgPath);
                                //$file->delete();
                            }
                            //$file = new File(WWW_ROOT ."img".DS."upload".DS. $this->request->data['Post']['imgpath']);
                          //  $file->delete();
                        } else {
                            $destination = WWW_ROOT."img".DS."upload";
                            // grab the file
                            $file = $this->request->data['Post']['imgpath'];
                            $realpath = "post";
                            $type = 'resizecrop';
                            $w1 = 250;
                            $h1 = 200;
                            $w2 = 150;
                            $h2 = 116;
                            $w3 = 60;
                            $h3 = 46;
                            $x = 0; $y = 0;
                            $IMAGE_DIMENSIONS = array(
                                'mt'=>array($w1,$h1,$x,$y),
                                'st'=>array($w2,$h2,$x,$y),
                                'sm'=>array($w3,$h3,$x,$y),
                            );
                            foreach ($IMAGE_DIMENSIONS as $prefix => $size) {
                                if ($prefix == 'mt'){
                                    $this->Crop->image($file, $destination,$type,$size,$realpath);
                                } else {
                                    $this->Crop->image($file, $destination,$type,$size,$realpath,$prefix);
                                }
                                $results[$prefix] = $this->Crop->result;
                                if (is_array($this->Crop->errors)){
                                    $errors_img = implode("<br />", $this->Crop->errors);
                                    break;
                                }
                            }
                           // $file = new File(WWW_ROOT ."img".DS."upload".DS. $this->request->data['Post']['imgpath']);
                            //$file->delete();
                        }
                    } else {
                        if (!empty($errors_img)){
                            $img_error = "Error";
                        }
                    }
                    if (empty($img_error)){
                        $this->Post->create();
                        $this->request->data['Post']['img']= @$results['mt'];
                        if (!empty($this->request->data['Post']['created'])){
                            $this->request->data['Post']['created']= date("Y-m-d H:i", strtotime($this->request->data['Post']['created']));
                        } else {
                            $this->request->data['Post']['created']= date("Y-m-d H:i");
                        }
                        unset($this->request->data['Post']['parent']);
                        if ($this->Post->save($this->request->data)) {
                            if ($this->request->data['Post']['type']){

                                $xmldoc = new DOMDocument();
                                $xmldoc->load(WWW_ROOT.DS.'dewplayer'.DS.'playlist.xml');

                                $xpath = new DOMXPath($xmldoc);
                                $query = $xpath->query('/playlist/trackList[@id = "1"]');
                                $item = $xmldoc->createElement('track');
                                $create_new_node = true;
                                $id = $xmldoc->createElement('id', $this->Post->id );
                                $item->appendChild($id);
                                $title= $xmldoc->createElement('title', $this->request->data['Post']['name']);
                                $item->appendChild($title);
                                $title= $xmldoc->createElement('location', "/media/".$this->request->data['Post']['path'] );
                                $item->appendChild($title);


                                if($create_new_node)
                                {
                                    $xmldoc->getElementsByTagName('trackList')->item(0)->appendChild($item);
                                }

                                echo $xmldoc->saveXML();
                                $xmldoc->save(WWW_ROOT.DS.'dewplayer'.DS.'playlist.xml');

                            }
                            $this->General->create();
                            $general['General']['post_id']=$this->Post->id;
                            $general['General']['created']=$this->Post->created;
                            $this->General->save($general);
                            if ($count == 0 ){
                                $post_id = $this->Post->id;
                                $post_text = substr($this->request->data['Post']['text'], '0', '450');
                                $post_name = $this->request->data['Post']['name'];
                            }
                            $count=$count+1;

                        } else {
                            $this->Session->setFlash(__("Նյութը չի պահպանվել, խնդրում ենք նորից փորձել ",true),'flash_error');
                        }
                    }
                }
                if ($count !=0 ){


                    $mails= $this->Subscribe->find('all',array('fields'=>array('Subscribe.email'),'order'=>'Subscribe.id ASC'));


                    ini_set("max_execution_time",0);
                    ini_set("max_input_time", '-1');
                    $this->sendPostMail2($post_text,$mails,$post_name,$post_id);
                   
                    $this->Session->setFlash(__("Նյութը հաջողությամբ պահպանվեց ",true),'flash_success');
                    $this->redirect('index');
                }else {
                    $this->Session->setFlash(__("Նյութը չի պահպանվել, խնդրում ենք նորից փորձել ",true),'flash_error');
                }




            } else {
                $this->Session->setFlash(__("Նյութը չի պահպանվել, խնդրում ենք նորից փորձել ",true),'flash_error');
            }
        }
        $menus = $this->Post->Menu->find('list',array('conditions'=>array('Menu.menu_id'=>NULL)));
        $this->set(compact('menus'));
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {



        $this->layout="admin";
        $types = array('0'=>'pdf ֆորմատ','1'=>'աուդիո ֆորմատ');
        $this->set(compact('types'));
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            $this->Session->setFlash(__("Նշված հասցեով նյութ գոյություն չունի",true),'flash_error');
            $this->redirect('index');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Post->set($this->request->data);
            if (empty($this->request->data['Post']['imgpath'])){
                $empty_img = true;
            }else {
                $empty_img = false;
                if ($this->Post->validates()){
                    if ($this->request->data['x']!= 'none' && $this->request->data['y']!='none' && $this->request->data['h']!='none' && $this->request->data['w']!='none'){
                        $destination = WWW_ROOT."img".DS."upload";
                        // grab the file
                        $file = $this->request->data['Post']['imgpath'];
                        $size =  array($this->request->data['w'],$this->request->data['h'],$this->request->data['x'],$this->request->data['y']);
                        $this->Crop->image($file, $destination,NULL,$size,NULL);
                        $res=$this->Crop->result;
                        $imgPath = 'upload'.DS.$res;
                        $destination = WWW_ROOT."img".DS."upload";
                        // grab the file
                        $file = $res;
                        $realpath = "post";
                        $type = 'resizecrop';
                        $a = $this->request->data['w']/$this->request->data['h'];
                        $w1 = 250;
                        $h1 = ceil( 250/$a);
                        if ($h1 <200){
                            $h1 =200;
                        }
                        $w2 = 150;
                        $h2 = ceil( 150/$a);
                        $w3 = 60;
                        $h3 = ceil( 60/$a);
                        $x = 0; $y = 0;
                        $IMAGE_DIMENSIONS = array(
                            'mt'=>array($w1,$h1,$x,$y),
                            'st'=>array($w2,$h2,$x,$y),
                            'sm'=>array($w3,$h3,$x,$y),
                        );
                        foreach ($IMAGE_DIMENSIONS as $prefix => $size) {
                            if ($prefix == 'mt'){
                                $this->Crop->image($file, $destination,$type,$size,$realpath);
                            } else {
                                $this->Crop->image($file, $destination,$type,$size,$realpath,$prefix);
                            }
                            $results[$prefix] = $this->Crop->result;
                            if (is_array($this->Crop->errors)){
                                $errors_img = implode("<br />", $this->Crop->errors);
                                break;
                            }
                        }
                        if (!empty($imgPath)){
                            $file = new File(WWW_ROOT ."img".DS.$imgPath);
                            $file->delete();
                        }
                        $file = new File(WWW_ROOT ."img".DS."upload".DS. $this->request->data['Post']['imgpath']);
                        $file->delete();
                    } else {
                        $destination = WWW_ROOT."img".DS."upload";
                        // grab the file
                        $file = $this->request->data['Post']['imgpath'];
                        $realpath = "post";
                        $type = 'resizecrop';
                        $w1 = 250;
                        $h1 = 200;
                        $w2 = 150;
                        $h2 = 116;
                        $w3 = 60;
                        $h3 = 46;
                        $x = 0; $y = 0;
                        $IMAGE_DIMENSIONS = array(
                            'mt'=>array($w1,$h1,$x,$y),
                            'st'=>array($w2,$h2,$x,$y),
                            'sm'=>array($w3,$h3,$x,$y),
                        );
                        foreach ($IMAGE_DIMENSIONS as $prefix => $size) {
                            if ($prefix == 'mt'){
                                $this->Crop->image($file, $destination,$type,$size,$realpath);
                            } else {
                                $this->Crop->image($file, $destination,$type,$size,$realpath,$prefix);
                            }
                            $results[$prefix] = $this->Crop->result;
                            if (is_array($this->Crop->errors)){
                                $errors_img = implode("<br />", $this->Crop->errors);
                                break;
                            }
                        }
                        $file = new File(WWW_ROOT ."img".DS."upload".DS. $this->request->data['Post']['imgpath']);
                        $file->delete();
                    }
                    $image = $this->Post->find ('first',array('conditions' => array('Post.id'=>$id)));
                    if ( $empty_img == false){
                        @$file = new File(WWW_ROOT ."img".DS."post".DS.$image['Post']['img']);
                        @$file->delete();
                        @$file = new File(WWW_ROOT ."img".DS."post".DS."sm".$image['Post']['img']);
                        @$file->delete();
                        @$file = new File(WWW_ROOT ."img".DS."post".DS."st".$image['Post']['img']);
                        @$file->delete();
                        $this->request->data['Post']['img'] =  $results['mt'];
                    } else {
                        $this->request->data['Post']['img'] =  $image['Post']['img'];
                    }
                }

            }
            $this->request->data['Post']['created']= date("Y-m-d H:i", strtotime($this->request->data['Post']['created']));
            if ($this->Post->save($this->request->data)) {
                if (!empty($this->request->data['Change']['yes'])){
                    unset($this->request->data['Post']['home_page']);

                    $img=$this->Post->find('first',array('conditions'=>array('Post.id'=>$id),
                        'fields'=>array('Post.img')));

                    foreach($this->request->data['Nost']['parent'] as $id){
                        unset($this->request->data['Post']['menu_id']);
                        unset($this->request->data['Post']['id']);
                        if (!empty($id)){
                            if (!empty($img['Post']['img'])){
                                $a = $this->Random->randomString();
                                $or= WWW_ROOT."img".DS."post".DS.$img['Post']['img'];
                                $sm= WWW_ROOT."img".DS."post".DS."sm".$img['Post']['img'];
                                $st= WWW_ROOT."img".DS."post".DS."st".$img['Post']['img'];
                                $nor= WWW_ROOT."img".DS."post".DS.$a.'jpg';
                                $nsm= WWW_ROOT."img".DS."post".DS."sm".$a.'jpg';
                                $nst= WWW_ROOT."img".DS."post".DS."st".$a.'jpg';
                                copy($or, $nor);
                                copy($sm, $nsm);
                                copy($st, $nst);
                                $this->request->data['Post']['img']= $a.'jpg';
                            }

                            $this->request->data['Post']['menu_id']=$id;
                            $this->Post->create();
                            if ($this->Post->save($this->request->data['Post'])){
                            }else{
                            }
                        }
                    }
                }
                $this->Session->setFlash(__("Նյութը հաջողությամբ պահպանվել է",true),'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__("Նյութը չի պահպանվել, խնդրում ենք նորից փորձել",true),'flash_error');
            }
        } else {
            $this->request->data = $this->Post->read(null, $id);
            $this->request->data['Post']['image']=$this->request->data['Post']['img'];
        }
        $menus = $this->Post->Menu->find('list');
        $this->set(compact('menus'));
    }

    /**
     * delete method
    return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            $this->Session->setFlash(__("Մութքագրված է սխալ նյութի հասցե",true),'flash_error');
            $this->redirect('index');
        }
        $image = $this->Post->find ('first',array('conditions' => array('Post.id'=>$id)));
        @$file = new File(WWW_ROOT ."img".DS."post".DS.$image['Post']['img']);
        @$file->delete();
        @$file = new File(WWW_ROOT ."img".DS."post".DS."sm".$image['Post']['img']);
        @$file->delete();
        @$file = new File(WWW_ROOT ."img".DS."post".DS."st".$image['Post']['img']);
        @$file->delete();
        if ($this->Post->delete($id,$caskade=true)) {
            $this->Session->setFlash(__("Նյութը հաջողությամբ ջնջվել է",true),'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__("Չհաջողվեց ջնջել նյութը, խնդրում ենք նորից փորձել",true),'flash_error');
        $this->redirect(array('action' => 'index'));
    }
    public function autocomplete () {
        $this->autoRender = false;
        $query = $_GET['term'];
        $result = $this->User->query("SELECT  posts.id, posts.name
										FROM posts 
										WHERE
										posts.name LIKE  '%".$query."%'");
        $array = array();
        foreach ($result as $v){
            $row_array['id'] =$v['posts']['id'];
            $row_array['value'] = $v['posts']['name'];
            array_push($array, $row_array);
        }

        echo json_encode($array);
        exit();

    }
    public function search ($name = NULL ) {
        $this->autoRender = false;
        $name =$this->request->data['name'];
        $result = $this->User->query("SELECT  posts.id, posts.name
										FROM posts 
										WHERE
										posts.name LIKE  '%".$name."%'");
        $array = array();
        foreach ($result as $v){
            $row_array['id'] =$v['posts']['id'];
            $row_array['name'] = $v['posts']['name'];
            array_push($array, $row_array);
        }

        echo json_encode($array);
        exit();

    }
    public function sendPostMail2 ($text,$emails, $name,$id){
        $text = "Բարև ձեզ  մեր կայքում ավելացել է նոր նյութ։
                     <br/> <br/><b>".$name
            ."</b><br/> <br/>".$text
            ."<br/><br/> Որին կարող եք ծանոթանալ հետևյալ հասցեով <a href=".'http://holytrinity.am'."/posts/view/".$id.">".'http://holytrinity.am'."/post/view/".$id."<a/>";
        $subject = "New Post ";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";


        $mailsArray = array();
        $i = 0;
        foreach ($emails as $email){
            if ($i == 15) {
                $i=0;
                $headers .= "From:  Holy Trinity Church <info@holytrinity.am>". "\r\n" . 'content-type:text/html' . "\r\n";
                $headers .= 'BCC: '. implode(",", $mailsArray) . "\r\n";
                mail('no-replay@holytrinity.am', $subject, $text,$headers);
                $mailsArray =array();
            }
            $mailsArray[] =$email['Subscribe']['email'];
            $i++;

        }
        if (!empty($mailsArray ) ) {
            $headers = "From:  Holy Trinity Church <info@holytrinity.am>". "\r\n" . 'content-type:text/html' . "\r\n";
            $headers .= 'BCC: '. implode(",", $mailsArray) . "\r\n";
            mail('no-replay@holytrinity.am', $subject, $text,$headers);

        }

    }

    public function foo(){
     $Products = new DaysController;
// Call a method from
$Products->foo();
    }
}?>