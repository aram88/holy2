<div class="staticPages form">
<?php echo $this->Form->create('StaticPage');?>
	<fieldset>
		<legend><?php echo __('Edit Static Page'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('text');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('StaticPage.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('StaticPage.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Static Pages'), array('action' => 'index'));?></li>
	</ul>
</div>