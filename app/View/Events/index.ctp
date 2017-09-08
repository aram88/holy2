<div class="bg C1">
		<h3 class="text_header bg Hmargin20 padding5 txtC">Իրադարձություններ</h3>
</div>
<div class="actions margin30 Lmargin50">
	<?php echo $this->Html->link(__('Ավելացնել նոր իրադարձություն'), array('action' => 'add'),array('class'=>'button')); ?>
	<?php echo $this->Html->link(__('Օրերի ցուցակ'), array('controller' => 'days', 'action' => 'index'),array('class'=>'button Lmargin25')); ?> 
	<?php echo $this->Html->link(__('Ավելացնել նոր օր'), array('controller' => 'days', 'action' => 'add'),array('class'=>'button Lmargin25')); ?> 
</div>
<div class="events index Lmargin50">
	<?php if (!empty($events['0']['Event'])){?>
	<table cellpadding="10px" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name','Անունը',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('text','Տեքստը',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('day_id','Օրը',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('created','Հրապ. ժամանկը',array('class'=>'C1'));?></th>
			<th class="actions"><?php echo __('Գործողություններ');?></th>
	</tr>
	<?php $i=2;
	foreach ($events as $event): ?>
	<tr class="<?php if(($i++)%2==1){echo "bg";}?>">
		<td><?php echo $event['Event']['name']; ?>&nbsp;</td>
		<td><?php echo $event['Event']['text']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($event['Day']['name'], array('controller' => 'days', 'action' => 'view', $event['Day']['id']),array('class'=>'C1')); ?>
		</td>
		<td><?php echo $event['Event']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Դիտել'), array('action' => 'view', $event['Event']['id']),array('class'=>'C1')); ?>
			<?php echo $this->Html->link(__('Փոփոխել'), array('action' => 'edit', $event['Event']['id']),array('class'=>'C1')); ?>
			<?php echo $this->Form->postLink(__('Ջնջել'), array('action' => 'delete', $event['Event']['id']),array('class'=>'C1'), __('Դուք համոզվաց եք դուք ցանկանում եք ջնջել %s իրադարձությունը', $event['Event']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="clear Vmargin25">
		<?php echo $this->element('pagination')?>
	</div>
<?php } else {?>
	<span> Դեռևս իրադարձություններ չկան ավելացրած</span>
<?php }?>

</div>