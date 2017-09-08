<?php echo $this->Html->css('jcrop/jquery.Jcrop')?>
<?php echo $this->Html->css('jcrop/demos')?>
<?php echo $this->Html->css('jquery-ui-timepicker-addon')?>
<?php echo $this->Html->script('jcrop/crop')?>
<?php echo $this->Html->script('jcrop/jquery.Jcrop')?>
<?php echo $this->Html->script('lib/ajaxfileupload/ajaxfileupload'); ?>
<?php echo $this->Html->script('timepiker/jquery-ui-timepicker-addon')?>
<?php echo $this->Html->script('timepiker/localization/jquery-ui-timepicker-ru')?>
<?php echo $this->Html->script('generic')?>
<?php echo $this->Html->script('post/post')?>
<?php echo $this->Html->script('ckeditor/ckeditor')?>
<?php echo $this->Html->script('styles/style')?>
<div class="bg C1">
		<h3 class="text_header bg Hmargin20 padding5 txtC">Փոփոխել նյութը</h3>
	</div>
<div class="posts form Lmargin20">
<?php echo $this->Form->create('Post');?>
	<div class='menu_path Bmargin20 displayN Lmargin50'>
	</div>	  ​
	<?php
		echo $this->Form->input('Post.menu_id.1',array('label'=>'Մենյու','empty'=>'------------','type'=>'select','options'=>$menus,'class'=>'parmenu'));
		echo $this->Form->input('Post.menu_id.2',array('label'=>'Մենյու','empty'=>'------------','type'=>'select','options'=>$menus,'class'=>'parmenu'));
		echo $this->Form->input('Post.menu_id.3',array('label'=>'Մենյու','empty'=>'------------','type'=>'select','options'=>$menus,'class'=>'parmenu'));
		echo $this->Form->input('Post.menu_id.4',array('label'=>'Մենյու','empty'=>'------------','type'=>'select','options'=>$menus,'class'=>'parmenu'));
		echo $this->Form->input('Menu.parent.1',array('type'=>'hidden','class'=>'parhid'));
		echo $this->Form->input('Menu.parent.2',array('type'=>'hidden','class'=>'parhid'));
		echo $this->Form->input('Menu.parent.3',array('type'=>'hidden','class'=>'parhid'));
		echo $this->Form->input('Menu.parent.4',array('type'=>'hidden','class'=>'parhid'));  
		echo $this->Form->input('name',array('label'=>'Անունը հայերեն','type'=>"text"));
		echo $this->Form->input('name_ru',array('label'=>'Անունը ռուսերեն','type'=>"text"));
		echo $this->Form->input('name_en',array('label'=>'Անունը անգլերեն','type'=>"text"));
		echo $this->Form->input('Post.text', array( 
            'label'=>'Տեքստը հայերեն </br>', 
            'class'=>'ckeditor'
        )); 
        echo $this->Form->input('Post.text_ru', array( 
            'label'=>'Տեքստը ռուսերեն', 
            'class'=>'ckeditor'
        ));
         echo $this->Form->input('Post.text_en', array( 
            'label'=>'Տեքստը անգլերեն', 
            'class'=>'ckeditor'
        ));  
		echo $this->Form->input('created',array('class'=>'time','type'=>"text",'label'=>'Հրապարակման ժամանակը'));
		echo $this->Form->input('imagepath',array('type'=>'file','class'=>'imageCrop','name'=>'fileToUpload', 'id'=>'fileToUpload','label'=>'Նկարը')); ?>
			<div class='left ml30 mb10 upload'>
				<?php echo $this->Html->image('upload/loading.gif',array( 'id'=>'upload', 'class'=>'displayN' ));?>
			</div>
			<?php if (!empty($this->request->data['Post']['imgpath'])):?>
			<div class='image ml30 mb20'>
				<?php echo $this->Html->image('upload/'.$this->request->data['Post']['imgpath'],array('id'=>'cropbox','class'=>'Bmargin20'))?>
			 </div>
			 <?php endif;?>
			<?php echo $this->Form->input('imgpath',array('type'=>'hidden','id'=>'path')); ?>
			<input type="hidden" id="x" name="x"  value="none"/>
			<input type="hidden" id="y" name="y" value="none"/>
			<input type="hidden" id="w" name="w" value="none"/>
			<input type="hidden" id="h" name="h" value="none"/>
	<?php 
		echo $this->Form->input('img_name',array('label'=>'Գլխավոր նկարի անունը','type'=>"text"));
		echo $this->Form->input('home_page',array('type'=>'checkbox','default'=>'1','label'=>'Գլխավոր էջում '));
		echo $this->Form->input('stick',array('type'=>'checkbox','default'=>'0','label'=>' Ստիկ  Նյութ'));
		echo $this->Form->input('read',array('type'=>'checkbox','default'=>'1','label'=>'Ընթերցել գրառումը'));?>
	<div class="clear"></div>	
	<?php	echo $this->Form->input('read_all',array('type'=>'checkbox','default'=>'0', 'label'=>'Նյութը ամբողջությամբ'));?>
	<div class="clear"></div>	
	<?php 	echo $this->Form->input('path',array('label'=>'Ճանապարհը','type'=>'select','options'=>$medias,'empty'=>'--------'));
		echo $this->Form->input('type',array('label'=>'Տեսակը','type'=>'select', 'options'=>$types,'empty'=>'--------'));
	?>
<?php echo $this->Form->submit(__('Ավելացնել'),array('class'=>'button Lmargin150'));
	  echo $this->Form->end();	?>
</div>

