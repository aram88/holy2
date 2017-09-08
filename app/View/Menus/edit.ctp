<?php echo $this->Html->css('jcrop/jquery.Jcrop')?>
<?php echo $this->Html->css('jcrop/demos')?>
<?php echo $this->Html->script('jcrop/crop')?>
<?php echo $this->Html->script('jcrop/jquery.Jcrop')?>
<?php echo $this->Html->script('lib/ajaxfileupload/ajaxfileupload'); ?>
<?php echo $this->Html->script('styles/style')?>
<?php echo $this->Html->script('ckeditor/ckeditor')?>
<div class="bg C1">
		<h3 class="text_header bg Hmargin20 padding5 txtC">Փոփոխել մենյուն</h3>
</div>
<div class="menus form Lmargin50">
<?php echo $this->Form->create('Menu');?>
	<?php
		echo $this->Form->input('name', array('label' => __("Անունը հայերեն"),'type'=>'text'));
	  	echo $this->Form->input('menu_id',array('type'=>'select', 'empty'=> '---------', 'label'=>__('Ծնող մենյուն')));
	  	echo $this->Form->input('sub_show',array('type'=>'checkbox','label'=>'Սուբմենյուն երևա'));
	  	echo $this->Form->input('main_show',array('type'=>'checkbox','label'=>'Սուբմենյուն երևա մենուների ցուցակում '));  ?>
	  	<div class="clear"></div>
	<?php 	echo $this->Form->input('name_ru', array('label' => __("Անունը ռուսերեն"),'type'=>'text'));
		echo $this->Form->input('name_en', array('label' => __("Անունը անգլերեն"),'type'=>'text')); 
		echo $this->Form->input('text', array( 
            'label'=>'Տեքատը հայերեն </br>', 
            'class'=>'ckeditor'
        )); 
        echo $this->Form->input('text_ru', array( 
            'label'=>'Տեքատը ռուսերեն', 
            'class'=>'ckeditor'
        ));
         echo $this->Form->input('text_en', array( 
            'label'=>'Տեքատը անգլերեն', 
            'class'=>'ckeditor'
        ));?>  
        <div class="input text">
			<label> Ընթացիկ Նկարը</label>
			<?php if (!empty($this->request->data['Menu']['image'])){ echo $this->Html->image('/img/menu/'.$this->request->data['Menu']['image'],array('escape'=>false,array('class'=>'Vmargin30')));} ?>
		</div>
		<div class="clear Bmargin20"></div>
        <?php  
		echo $this->Form->input('img',array('type'=>'file','class'=>'imageCrop','name'=>'fileToUpload', 'id'=>'fileToUpload', 'label'=>__('Նկարը'))); ?> 
			<div class='upload Bmargin20'>
				<?php echo $this->Html->image('upload/loading.gif',array( 'id'=>'upload', 'class'=>'displayN' ));?>
			</div>
			<?php if (!empty($this->request->data['Menu']['imgpath'])):?>
			<div class='image Bmargin20'>
				<?php echo $this->Html->image('uploads/'.$this->request->data['Menu']['imgpath'],array('id'=>'cropbox'))?>
			 </div>
			 <?php endif;?>
			<?php echo $this->Form->input('imgpath',array('type'=>'hidden','id'=>'path')); ?>
			<input type="hidden" id="x" name="x"  value="none"/>
			<input type="hidden" id="y" name="y" value="none"/>
			<input type="hidden" id="w" name="w" value="none"/>
			<input type="hidden" id="h" name="h" value="none"/>
	<?php 
		echo $this->Form->input('img_name',array('label'=>'Գլխավոր նկարի անունը' ,'type'=>'text'));
		echo $this->Form->input('position', array('label'=>__('Դիրքը')));?>
		<div class='menu_path Bmargin20 displayN Lmargin50'>
		</div>
	<?php
	  
	    echo $this->Form->input('parent',array('type'=>'hidden'));  
		echo $this->Form->input('location',array('type'=>'select', 'options'=>$locations, 'empty'=> '---------', 'label'=>__('Վայրը')));  
	?>
	
<?php echo $this->Form->submit(__('Փոփոխել'),array('class'=>'button Lmargin50'));
	  echo $this->Form->end();	?>
<div class="actions Tmargin30">
	<?php echo $this->Form->postLink(__("Ջնջել"), array('action' => 'delete', $this->Form->value('Menu.id')),array('class'=>'button Lmargin25'), __('Are you sure you want to delete # %s?', $this->Form->value('Menu.id'))); ?>
	<?php echo $this->Html->link(__("Մենյուների ցուցակ"), array('controller' => 'menus', 'action' => 'index'),array('class'=>'button Lmargin25')); ?>
	<?php echo $this->Html->link(__("Ավելացնել նոր մենյու"), array('controller' => 'menus', 'action' => 'add'),array('class'=>'button Lmargin25')); ?>
	<?php echo $this->Html->link(__("Նյութերի ցուցակ"), array('controller' => 'posts', 'action' => 'index'),array('class'=>'button Lmargin25')); ?>
	<?php echo $this->Html->link(__("Ավելացնել նոր նյութ"), array('controller' => 'posts', 'action' => 'add'),array('class'=>'button Lmargin25')); ?>
</div>
</div>