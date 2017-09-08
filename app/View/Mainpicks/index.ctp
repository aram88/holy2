<div class="mainpicks index">
	<h2><?php echo __('Mainpicks');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('position');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('img');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($mainpicks as $mainpick): ?>
	<tr>
		<td><?php echo h($mainpick['Mainpick']['id']); ?>&nbsp;</td>
		<td><?php echo h($mainpick['Mainpick']['position']); ?>&nbsp;</td>
		<td><?php echo h($mainpick['Mainpick']['name']); ?>&nbsp;</td>
		<td><?php echo h($mainpick['Mainpick']['img']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $mainpick['Mainpick']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mainpick['Mainpick']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $mainpick['Mainpick']['id']), null, __('Are you sure you want to delete # %s?', $mainpick['Mainpick']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Mainpick'), array('action' => 'add')); ?></li>
	</ul>
</div>
