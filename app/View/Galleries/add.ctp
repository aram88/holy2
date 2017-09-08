<?php echo $this->Html->css('jcrop/jquery.Jcrop')?>
<?php echo $this->Html->css('jcrop/demos')?>
<?php echo $this->Html->css('jquery-ui-timepicker-addon')?>
<?php echo $this->Html->script('jcrop/crop')?>
<?php echo $this->Html->script('jcrop/jquery.Jcrop')?>
<?php echo $this->Html->script('lib/ajaxfileupload/ajaxfileupload'); ?>
<?php echo $this->Html->script('timepiker/jquery-ui-timepicker-addon')?>
<?php echo $this->Html->script('timepiker/localization/jquery-ui-timepicker-ru')?>
<?php echo $this->Html->script('generic')?>

<div class="bg">
		<h3 class="text_header bg Hmargin20 padding5 txtC">Ավելացնել նկար</h3>
</div>
<div class="galleries form Lmargin50">
<?php echo $this->Form->create('Gallery');?>
	<?php
		echo $this->Form->input('gallery_group_id', array('label'=>'Նկարների խումբը'));
		echo $this->Form->input('name',array('label'=>'Անունը'));
		echo $this->Form->input('image',array('label'=>'Նկարը','type'=>'file', 'class'=>'imageCrop','name'=>'fileToUpload', 'id'=>'fileToUpload'));
	?>
	<div class='left ml30 mb10 upload'>
		<?php echo $this->Html->image('upload/loading.gif',array( 'id'=>'upload', 'class'=>'displayN' ));?>
	</div>
	<?php if (!empty($this->request->data['Gallery']['image'])):?>
	<div class='image ml30 mb20'>
		<?php echo $this->Html->image('upload/'.$this->request->data['Gallery']['image'],array('id'=>'cropbox','class'=>'Bmargin20'))?>
	 </div>
	 <?php endif;?>
	<?php echo $this->Form->input('image',array('type'=>'hidden','id'=>'path')); ?>
	<input type="hidden" id="x" name="x"  value="none"/>
	<input type="hidden" id="y" name="y" value="none"/>
	<input type="hidden" id="w" name="w" value="none"/>
	<input type="hidden" id="h" name="h" value="none"/>

<?php echo $this->Form->submit(__('Ավելացնել'),array('class'=>'button Lmargin150'));
	  echo $this->Form->end();	?>

<div class="actions Tmargin30">
	<?php echo $this->Html->link(__('Նկարների ցուցակ'), array('action' => 'index', 'class'=>'button'),array( 'class'=>' button'));?>
	<?php echo $this->Html->link(__('Նկարների խմբի ցուցակ'), array('controller' => 'gallery_groups', 'action' => 'admin'),array( 'class'=>'Lmargin25 button')); ?> 
	<?php echo $this->Html->link(__('Նոր նկարների ցուցակ'), array('controller' => 'gallery_groups', 'action' => 'add'),array( 'class'=>'Lmargin25 button')); ?> 
</div>
</div>
