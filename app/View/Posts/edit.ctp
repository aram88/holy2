<?php echo $this->Html->css('jcrop/jquery.Jcrop')?>
<?php echo $this->Html->css('jcrop/demos')?>
<?php echo $this->Html->css('jquery-ui-timepicker-addon')?>
<?php echo $this->Html->script('jcrop/crop')?>
<?php echo $this->Html->script('jcrop/jquery.Jcrop')?>
<?php echo $this->Html->script('lib/ajaxfileupload/ajaxfileupload'); ?>
<?php echo $this->Html->script('timepiker/jquery-ui-timepicker-addon')?>
<?php echo $this->Html->script('timepiker/localization/jquery-ui-timepicker-ru')?>
<?php echo $this->Html->script('generic')?>
<?php echo $this->Html->script('styles/style')?>
<?php echo $this->Html->script('ckeditor/ckeditor')?>
<?php echo $this->Html->script('post/change')?>
<div class="bg C1">
		<h3 class="text_header bg Hmargin20 padding5 txtC">Փոփոխել նյութը</h3>
</div>
<div class="posts form Lmargin50">
<div class="actions margin30 ">
	<?php echo $this->Form->postLink(__('Ջնջել'), array('action' => 'delete', $this->Form->value('Post.id')), array('class'=>'Lmargin25 button'), __('Դուք ցանկանում եք ջնջել %s պոստը', $this->Form->value('Post.name'))); ?>
	<?php echo $this->Html->link(__('Պոստերի ցուցակ'), array('action' => 'index'),array('class'=>'Lmargin25 button'));?>
	<?php echo $this->Html->link(__('Մնյուների ցուցակ'), array('controller' => 'menus', 'action' => 'index'),array('class'=>'Lmargin25 button')); ?>
	<?php echo $this->Html->link(__('Ավելացնել նոր մենյու'), array('controller' => 'menus', 'action' => 'add'),array('class'=>'Lmargin25 button')); ?>
</div>
<?php echo $this->Form->create('Post');?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('menu_id', array('label'=>'Մենյու', 'empty'=>'---------'));
		echo $this->Form->input('Nost.parent.1',array('label'=>'Մենյու','empty'=>'------------','type'=>'select','options'=>$menus,'class'=>'parmenu'));
		echo $this->Form->input('Nost.parent.2',array('label'=>'Մենյու','empty'=>'------------','type'=>'select','options'=>$menus,'class'=>'parmenu'));
		echo $this->Form->input('Nost.parent.3',array('label'=>'Մենյու','empty'=>'------------','type'=>'select','options'=>$menus,'class'=>'parmenu'));
		echo $this->Form->input('name',array('label'=>'Անունը հայերեն'));
		echo $this->Form->input('name_ru',array('label'=>'Անունը ոուսերեն'));
		echo $this->Form->input('name_en',array('label'=>'Անունը անգլերեն'));
		echo $this->Form->input('img',array('type'=>'hidden'));
		echo $this->Form->input('Change.yes',array('type'=>'hidden', 'class'=>'hidechange'));
		?>
		<div class="input text">
			<label> Ընթացիկ Նկարը</label>
			<?php if (!empty($this->request->data['Post']['img'])){ echo $this->Html->image('/img/post/'.$this->request->data['Post']['img'],array('escape'=>false,array('class'=>'Vmargin30')));} ?>
		</div>
		<div class="clear Bmargin20"></div><div class="clear"></div><div class="clear"></div>
	<?php	echo $this->Form->input('imge',array('type'=>'file','class'=>'imageCrop','name'=>'fileToUpload', 'id'=>'fileToUpload', 'label'=>__('Նկարը'))); ?> 
			<div class='upload Bmargin20'>
				<?php echo $this->Html->image('upload/loading.gif',array( 'id'=>'upload', 'class'=>'displayN' ));?>
			</div>
			<?php if (!empty($this->request->data['Post']['imgpath'])):?>
			<div class='image Bmargin20'>
				<?php echo $this->Html->image('uploads/'.$this->request->data['Post']['imgpath'],array('id'=>'cropbox'))?>
			 </div>
			 <?php endif;?>
			<?php echo $this->Form->input('imgpath',array('type'=>'hidden','id'=>'path')); ?>
			<input type="hidden" id="x" name="x"  value="none"/>
			<input type="hidden" id="y" name="y" value="none"/>
			<input type="hidden" id="w" name="w" value="none"/>
			<input type="hidden" id="h" name="h" value="none"/>
	<?php 
		echo $this->Form->input('img_name',array('label'=>'Գլխավոր նկարի անունը'));
		echo $this->Form->input('text',array( 
            'label'=>'Տեքստը հայերեն', 
            'class'=>'ckeditor'
        ));
        echo $this->Form->input('text_ru',array( 
            'label'=>'Տեքստը  ռուսերեն', 
            'class'=>'ckeditor'
        ));
        echo $this->Form->input('text_en',array( 
            'label'=>'Տեքստը անգլերեն', 
            'class'=>'ckeditor'
        ));
        echo $this->Form->input('created',array('class'=>'time','type'=>"text",'label'=>'Հրապարակման ժամանակը'));
		echo $this->Form->input('visible',array('label'=>'Տեսանելի','type'=>'checkbox'));
		echo $this->Form->input('home_page',array('type'=>'checkbox','label'=>'Գլխավոր էջում '));
		echo $this->Form->input('read',array('type'=>'checkbox','default'=>'1','label'=>'Ընթերցել գրառումը'));?>
		<div class="clear"></div>
		<?php echo $this->Form->input('stick',array('type'=>'checkbox','default'=>'0','label'=>' Ստիկ  Նյութ'));	
		?>
			
	<div class="clear"></div>	
	<?php	echo $this->Form->input('read_all',array('type'=>'checkbox','default'=>'0', 'label'=>'Նյութը ամբողջությամբ'));?>
	<div class="clear"></div>	
	<?php 	echo $this->Form->input('path',array('label'=>'Ճանապարհը'));
		echo $this->Form->input('type',array('label'=>'Տեսակը','type'=>'select', 'options'=>$types,'empty'=>'--------'));
	?>

<?php echo $this->Form->submit(__('Փոփոխել'),array('class'=>'button Lmargin150'));
	  echo $this->Form->end();	?>
</div>

