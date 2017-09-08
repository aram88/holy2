<?php echo $this->Html->script('timepiker/jquery-ui-timepicker-addon')?>
<?php echo $this->Html->script('timepiker/localization/jquery-ui-timepicker-ru')?>
<?php echo $this->Html->script('generic')?>
<?php echo $this->Html->script('styles/style')?>
<div class="bg C1">
		<h3 class="text_header bg Hmargin20 padding5 txtC">Ավելացնել ներ օր</h3>
</div>
<div class="days form Lmargin50">
<?php echo $this->Form->create('Day');?>
	<?php
		echo $this->Form->input('name',array('label'=>'Անունը','type'=>'text'));
	?>
<?php 
      echo $this->Form->input('created',array('label'=>'Ժամանակը','type'=>'text','class'=>'time'));
	  echo $this->Form->submit(__('Ավելացնելլ'),array('class'=>'button Lmargin150'));
	  echo $this->Form->end();	?>
<div class="actions Tmargin30">
	<?php echo $this->Html->link(__('Օրերի ցուցակ'), array('action' => 'index'),array('class'=>'button'));?>
	<?php echo $this->Html->link(__('Իրադարձությունների ցուցակ'), array('controller' => 'events', 'action' => 'index'),array('class'=>'button Lmargin25')); ?> 
	<?php echo $this->Html->link(__('Ավելացբել նոր իրադարձություն'), array('controller' => 'events', 'action' => 'add'),array('class'=>'button Lmargin25')); ?> 
	<?php echo $this->Html->link(__('Ընթերցվածքների ցուցակ'), array('controller' => 'readings', 'action' => 'index'),array('class'=>'button Lmargin25')); ?>
	<?php echo $this->Html->link(__('Ավելացնել նոր ընթերցվածք'), array('controller' => 'readings', 'action' => 'add'),array('class'=>'button Lmargin25')); ?> 
</div>
</div>