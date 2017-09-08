<div class="bg C1">
		<h3 class="text_header bg Hmargin20 padding5 txtC">Մեդիաների ցուցակ</h3>
</div>
<div class="media index Lmargin20">
	<?php if (!empty($media['0']['Media'])){?>
	<table cellpadding="10" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name','Անոնը',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('path','Ճանապարհը',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('created','Հրապ. ժամանկը',array('class'=>'C1'));?></th>
			<th class="actions"><?php echo __('Գործողություններ');?></th>
	</tr>
	<?php $i=1;
	foreach ($media as $media): ?>
	<tr class="<?php if (($i++)%2==0){ echo "bg";}?>">
		<td><?php echo h($media['Media']['name']); ?>&nbsp;</td>
		<td><?php echo h($media['Media']['path']); ?>&nbsp;</td>
		<td><?php echo h($media['Media']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Form->postLink(__('Ջնջել'), array('action' => 'delete', $media['Media']['id']), array('class'=>'C1'), __('Դուք համոզված եք դուք ցանկանում եք ջնջել # %s մեդիան', $media['Media']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="clear Vmargin25">
		<?php echo $this->element('pagination')?>
	</div>
<?php } else {?>
	<span> Դեռևս նեդիաներ չկան ավելացված չկան ավելացրած</span>
<?php }?>	
</div>
<div class="actions Tmargin30 Lmargin50">
	<?php echo $this->Html->link(__('Ավելացնել նոր մեդիա'), array('action' => 'add'),array('class'=>'button')); ?>
</div>
