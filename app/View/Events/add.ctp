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
<div class="bg C1">
		<h3 class="text_header bg Hmargin20 padding5 txtC">Ավելացնել իրադարձություն</h3>
</div>
<div class="events form Lmargin50">
<?php echo $this->Form->create('Event');?>
	<?php
		echo $this->Form->input('day_id',array('label'=>'Օրը'));
		echo $this->Form->input('name',array('label'=>'Անունը','type'=>"text"));
		echo $this->Form->input('text', array( 
            'label'=>'Տեքատը  </br>', 
            'class'=>'ckeditor'
        ));  
	?>
<?php 	echo $this->Form->input('created',array('class'=>'time','type'=>"text",'label'=>'Հրապարակման ժամանակը'));?>
<?php echo $this->Form->submit(__('Ավելացնել'),array('class'=>'button Lmargin150'));
	  echo $this->Form->end();	?>
<div class="actions Tmargin30">
	<?php echo $this->Html->link(__('Իրադարձությունների ցուցակ'), array('action' => 'index'),array('class'=>'button'));?>
	<?php echo $this->Html->link(__('Օրերի ցուցակ'), array('controller' => 'days', 'action' => 'index'),array('class'=>'button Lmargin25')); ?> 
	<?php echo $this->Html->link(__('Ավելացնել նոր օր'), array('controller' => 'days', 'action' => 'add'),array('class'=>'button Lmargin25')); ?> 
</div>
</div>