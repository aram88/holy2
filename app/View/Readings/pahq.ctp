<?php echo $this->Html->script('readings/auto') ?>
<?php echo $this->Html->script('timepiker/jquery-ui-timepicker-addon')?>
<?php echo $this->Html->script('timepiker/localization/jquery-ui-timepicker-ru')?>
<?php echo $this->Html->script('generic')?>
<?php echo $this->Html->script('styles/style')?>
<div class="clear Tmargin20"></div>
<?php
		echo $this->Form->create('Day',array('action'=>'pahqrepeat'));
		echo $this->Form->input('created',array('label'=>'Սկզբի օրը','type'=>'text','class'=>'time'));
		echo $this->Form->submit(__('Ավելացնել'),array('class'=>'button Lmargin150'));
	  	echo $this->Form->end();	?>

