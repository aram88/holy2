<div class="bg C1">
		<h3 class="text_header bg Hmargin20 padding5 txtC">Փոփոխել հարցերի խումբը</h3>
</div>
<div class="qgroups form Lmargin50">
<?php echo $this->Form->create('Qgroup');?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label'=>'Անունը'));
	?>
<?php echo $this->Form->submit(__('Փոփոխել'),array('class'=>'button Lmargin50'));
	  echo $this->Form->end();	?>
<div class="actions Tmargin30">
	<?php echo $this->Form->postLink(__('Ջնջել'), array('action' => 'delete', $this->Form->value('Qgroup.id')), array('class'=>'button'), __('Are you sure you want to delete # %s?', $this->Form->value('Qgroup.id'))); ?></li>
	<?php echo $this->Html->link(__('Հարցերի խումբի ցուցակ'), array('action' => 'index'), array('class'=>'button Lmargin25'));?>
	<?php echo $this->Html->link(__('Հարցերի ցուցակ'), array('controller' => 'questions', 'action' => 'index'), array('class'=>'button Lmargin25')); ?>
</div>
</div>