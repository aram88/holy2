<div class="bg C1">
		<h3 class="text_header bg Hmargin20 padding5 txtC">Ընթերցվածքներ</h3>
</div>
<div class="actions margin30 Lmargin50">
	<?php echo $this->Html->link(__('Ավելացնել նոր ընթերցվածք'), array('action' => 'add'),array('class'=>'button')); ?>
	<?php echo $this->Html->link(__('Օրերի ցուցակ'), array('controller' => 'days', 'action' => 'index'),array('class'=>'button Lmargin25')); ?> 
	<?php echo $this->Html->link(__('Ավելացնել նոր օր'), array('controller' => 'days', 'action' => 'add'),array('class'=>'button Lmargin25')); ?> 
</div>
<div class="readings index Lmargin50">
	<?php if(!empty($readings)){ ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('day_id','Օրը',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('name','Անունը',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('text','Տեքստը',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('created','Հրապ. ժամանկը',array('class'=>'C1'));?></th>
			<th class="actions"><?php echo __('Գործողություններ');?></th>
	</tr>
	<?php $i=2;
	foreach ($readings as $reading): ?>
	<tr class="<?php if (($i++)%2 == 1 ){ echo "bg";}?>">
		<td>
			<?php echo $this->Html->link($reading['Day']['name'], array('controller' => 'days', 'action' => 'view', $reading['Day']['id']),array('class'=>'C1')); ?>
		</td>
		<td><?php echo $reading['Reading']['name']; ?>&nbsp;</td>
		<td><?php echo $reading['Reading']['text']; ?>&nbsp;</td>
		<td><?php echo $reading['Reading']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Դիտել'), array('action' => 'view', $reading['Reading']['id']),array('class'=>'C1')); ?>
			<?php echo $this->Html->link(__('Փոփոխել'), array('action' => 'edit', $reading['Reading']['id']),array('class'=>'C1')); ?>
			<?php echo $this->Form->postLink(__('Ջնջել'), array('action' => 'delete', $reading['Reading']['id']),array('class'=>'C1'), __('Դուք համոզված եք դուք ցանկանում եք ջնջել  %s ընթերցվածքը', $reading['Reading']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="clear Vmargin25">
		<?php echo $this->element('pagination');?>
	</div>
<?php } else {?>
	<span> Դեռևս ընթերցվածքներ չկան ավելացված</span>	
<?php }?>


</div>