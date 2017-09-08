<div class="galleries view">
<h2><?php  echo __('Gallery');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gallery['Gallery']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gallery Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gallery['GalleryGroup']['name'], array('controller' => 'gallery_groups', 'action' => 'view', $gallery['GalleryGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($gallery['Gallery']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($gallery['Gallery']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($gallery['Gallery']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Gallery'), array('action' => 'edit', $gallery['Gallery']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Gallery'), array('action' => 'delete', $gallery['Gallery']['id']), null, __('Are you sure you want to delete # %s?', $gallery['Gallery']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Galleries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gallery'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gallery Groups'), array('controller' => 'gallery_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gallery Group'), array('controller' => 'gallery_groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
