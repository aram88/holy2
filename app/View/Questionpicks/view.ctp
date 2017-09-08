<div class="questionpicks view">
<h2><?php  echo __('Questionpick');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($questionpick['Questionpick']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($questionpick['Questionpick']['position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($questionpick['Questionpick']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img'); ?></dt>
		<dd>
			<?php echo h($questionpick['Questionpick']['img']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Questionpick'), array('action' => 'edit', $questionpick['Questionpick']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Questionpick'), array('action' => 'delete', $questionpick['Questionpick']['id']), null, __('Are you sure you want to delete # %s?', $questionpick['Questionpick']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionpicks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionpick'), array('action' => 'add')); ?> </li>
	</ul>
</div>
