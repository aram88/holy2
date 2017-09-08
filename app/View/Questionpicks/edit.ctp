<div class="questionpicks form">
<?php echo $this->Form->create('Questionpick');?>
	<fieldset>
		<legend><?php echo __('Edit Questionpick'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('position');
		echo $this->Form->input('name');
		echo $this->Form->input('img');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Questionpick.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Questionpick.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Questionpicks'), array('action' => 'index'));?></li>
	</ul>
</div>
