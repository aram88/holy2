<div class="mainpicks view">
<h2><?php  echo __('Mainpick');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mainpick['Mainpick']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($mainpick['Mainpick']['position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($mainpick['Mainpick']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img'); ?></dt>
		<dd>
			<?php echo h($mainpick['Mainpick']['img']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mainpick'), array('action' => 'edit', $mainpick['Mainpick']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mainpick'), array('action' => 'delete', $mainpick['Mainpick']['id']), null, __('Are you sure you want to delete # %s?', $mainpick['Mainpick']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mainpicks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mainpick'), array('action' => 'add')); ?> </li>
	</ul>
</div>
