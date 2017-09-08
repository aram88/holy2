<?php echo $this->Html->css('jcrop/jquery.Jcrop')?>
<?php echo $this->Html->css('jcrop/demos')?>
<?php echo $this->Html->css('jquery-ui-timepicker-addon')?>
<?php echo $this->Html->script('jcrop/crop')?>
<?php echo $this->Html->script('jcrop/jquery.Jcrop')?>
<?php echo $this->Html->script('lib/ajaxfileupload/ajaxfileupload'); ?>
<?php echo $this->Html->script('timepiker/jquery-ui-timepicker-addon')?>
<?php echo $this->Html->script('timepiker/localization/jquery-ui-timepicker-ru')?>
<?php echo $this->Html->script('generic')?>
<div class="bg C1">
		<h3 class="text_header bg Hmargin20 padding5 txtC">Փոխել նկարների խումբը</h3>
</div>
<div class="galleryGroups form Lmargin50">
<?php echo $this->Form->create('GalleryGroup');?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label'=>"Անուն"));
		echo $this->Form->input('image',array('type'=>'hidden'));
	?>
	
	<div class="input text">
			<label> Ընթացիկ Նկարը</label>
			<?php if (!empty($this->request->data['GalleryGroup']['image'])){ echo $this->Html->image('/img/gallery_group/'.$this->request->data['GalleryGroup']['image'],array('escape'=>false,array('class'=>'Vmargin30')));} ?>
		</div>
		<div class="clear Bmargin20"></div>
        <?php  
		echo $this->Form->input('img',array('type'=>'file','class'=>'imageCrop','name'=>'fileToUpload', 'id'=>'fileToUpload', 'label'=>__('Նկարը'))); ?> 
			<div class='upload Bmargin20'>
				<?php echo $this->Html->image('upload/loading.gif',array( 'id'=>'upload', 'class'=>'displayN' ));?>
			</div>
			<?php if (!empty($this->request->data['GalleryGroup']['imgpath'])):?>
			<div class='image Bmargin20'>
				<?php echo $this->Html->image('uploads/'.$this->request->data['GalleryGroup']['imgpath'],array('id'=>'cropbox'))?>
			 </div>
			 <?php endif;?>
			<?php echo $this->Form->input('imgpath',array('type'=>'hidden','id'=>'path')); ?>
			<input type="hidden" id="x" name="x"  value="none"/>
			<input type="hidden" id="y" name="y" value="none"/>
			<input type="hidden" id="w" name="w" value="none"/>
			<input type="hidden" id="h" name="h" value="none"/>
	
<?php 
      echo $this->Form->input('created',array('label'=>'Ժամանակը','type'=>'text','class'=>'time'));
	  echo $this->Form->submit(__('Փոփոխել'),array('class'=>'button Lmargin150'));
	  echo $this->Form->end();	?>

<div class="actions Tmargin25">
	<?php echo $this->Form->postLink(__('Ջնջել'), array('action' => 'delete', $this->Form->value('GalleryGroup.id')),array('class'=>'button'), __('Դուք համոզված եք դուք ցանկանւոն եք ջնջել # %s նկարների խումբը', $this->Form->value('GalleryGroup.name'))); ?></li>
	<?php echo $this->Html->link(__('Նկարների խմբերի ցուցակ'), array('action' => 'index'),array('class'=>'button Lmargin25'));?>
	<?php echo $this->Html->link(__('Նկարների ցուցակ'), array('controller' => 'galleries', 'action' => 'index'),array('class'=>'button Lmargin25')); ?> 
	<?php echo $this->Html->link(__('Ավելացնել Նոր նկար'), array('controller' => 'galleries', 'action' => 'add'),array('class'=>'button Lmargin25')); ?> 
</div>
</div>