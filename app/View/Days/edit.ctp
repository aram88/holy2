<?php echo $this->Html->script('timepiker/jquery-ui-timepicker-addon')?>
<?php echo $this->Html->script('timepiker/localization/jquery-ui-timepicker-ru')?>
<?php echo $this->Html->script('generic')?>
<?php echo $this->Html->script('styles/style')?>
<div class="bg C1">
		<h3 class="text_header bg Hmargin20 padding5 txtC">Փոփոխել օրը</h3>
</div>
<div class="actions margin30 Lmargin50">
	<?php echo $this->Form->postLink(__('Ջնջել'), array('action' => 'delete', $this->Form->value('Day.id')),array('class'=>'button') , __('Դուք համոզված եք դուք ցանկանում եք ջնջել %s օրը', $this->Form->value('Day.name'))); ?>
	<?php echo $this->Html->link(__('Օրերի ցուցակ'), array('action' => 'index'),array('class'=>'button Lmargin25'));?>
	<?php echo $this->Html->link(__('Իրադարձությունների ցուցակ'), array('controller' => 'events', 'action' => 'index'),array('class'=>'button Lmargin25')); ?> 
	<?php echo $this->Html->link(__('Ավելացնել նոր իրադարձություն'), array('controller' => 'events', 'action' => 'add'),array('class'=>'button Lmargin25')); ?> 
	<?php echo $this->Html->link(__('Ընթերցվածքների ցուցակ'), array('controller' => 'readings', 'action' => 'index'),array('class'=>'button Lmargin25')); ?> 
	<?php echo $this->Html->link(__('Ավելացնել նոր ընթերցվածք'), array('controller' => 'readings', 'action' => 'add'),array('class'=>'button Lmargin25')); ?> 
</div>
<div class="days form Lmargin50">
<?php echo $this->Form->create('Day');?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label'=>'Անունը','type'=>'text'));
	?>
<?php 
      echo $this->Form->input('created',array('label'=>'Ժամանակը','type'=>'text','class'=>'time'));
	  echo $this->Form->submit(__('Փոփոխել'),array('class'=>'button Lmargin150'));
	  echo $this->Form->end();	?>

</div>