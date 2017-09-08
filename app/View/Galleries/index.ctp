<div class="bg">
        <h3 class="text_header Hmargin20 padding5 txtC"><?php echo __('Նկարներ');?></h3>
</div>
<div class="actions margin30">
	<?php echo $this->Html->link(__('Ավելացնել նոր նկար'), array('action' => 'add'),array('class'=>'button')); ?>
	<?php echo $this->Html->link(__('Նկարների խմբերի ցուցակ '), array('controller' => 'gallery_groups', 'action' => 'index'),array('class'=>'button Lmargin25')); ?>
	<?php echo $this->Html->link(__('Ավելացնել Նոր խմբի ցուցակ'), array('controller' => 'gallery_groups', 'action' => 'add'),array('class'=>'button Lmargin25')); ?>
</div>
<div class="galleries index Lmargin25" >
	<?php if (!empty($galleries )){?>
	<table cellpadding="5px" cellspacing="0" class="Bmargin25">
	<tr>
			<th><?php echo $this->Paginator->sort('gallery_group_id','Նկարների խումբը',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('name', 'Անունը',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('image', 'Նկարը',array('class'=>'C1'));?></th>
			<th class="actions"><?php echo __('Գործողութոյունները');?></th>
	</tr>
	<?php $i= 2;
	foreach ($galleries as $gallery): ?>
	<tr class=" <?php if ((($i++)%2 == 1)) {echo "bg";} ?>">
		<td>
			<?php echo $this->Html->link($gallery['GalleryGroup']['name'], array('controller' => 'gallery_groups', 'action' => 'view', $gallery['GalleryGroup']['id']),array('class'=>'C1')); ?>
		</td>
		<td><?php echo h($gallery['Gallery']['name']); ?>&nbsp;</td>
		<td><?php echo $this->Html->image("/img/gallery/sm".$gallery['Gallery']['image'], array('height'=>'50px')); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Փոփոխել'), array('action' => 'edit', $gallery['Gallery']['id']),array('class'=>'C1')); ?>
			<?php echo $this->Form->postLink(__('Ջնջել'), array('action' => 'delete', $gallery['Gallery']['id']),array('class'=>'C1'), __('Դուք համոզվաց եք դուք ցանկանում եք ջնջել %s նկարը', $gallery['Gallery']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
<?php }else{?>
	<div class="Bmargin30">Դեռևս նկարներ չկան ավելացված</div>
<?php }?>
<div class="clear"></div>

   <?php echo $this->element('pagination');?>
</div>