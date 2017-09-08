<div class="staticPages index">
	<h2><?php echo __('Static Pages');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('text');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($staticPages as $staticPage): ?>
	<tr>
		<td><?php echo h($staticPage['StaticPage']['id']); ?>&nbsp;</td>
		<td><?php echo h($staticPage['StaticPage']['name']); ?>&nbsp;</td>
		<td><?php echo h($staticPage['StaticPage']['text']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $staticPage['StaticPage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $staticPage['StaticPage']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $staticPage['StaticPage']['id']), null, __('Are you sure you want to delete # %s?', $staticPage['StaticPage']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Static Page'), array('action' => 'add')); ?></li>
	</ul>
</div>
