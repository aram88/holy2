<div class="bg">
        <h3 class="text_header Hmargin20 padding5 txtC"><?php echo __('Հարցերի խումբ');?></h3>
</div>
<div class="actions margin30">
	<?php echo $this->Html->link(__("Ավելացներր նոր խումբ"), array('action' => 'add'),array('class'=>'button Lmargin25')); ?>
	<?php echo $this->Html->link(__('Հարցերի խումբ'), array('controller' => 'questions', 'action' => 'index'),array('class'=>'button Lmargin25')); ?>
</div>
<div class="qgroups index Lmargin50">
	<table cellpadding="10px" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name','Անունը',array('class'=>'C1'));?></th>
			<th class="actions"><?php echo __('Գործողություններ');?></th>
	</tr>
	<?php $i=2;
	foreach ($qgroups as $qgroup): ?>
	<tr class="<?php if (($i++)%2 == 1){echo "bg";} ?>">
		<td><?php echo h($qgroup['Qgroup']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__("Դիտել"), array('action' => 'view', $qgroup['Qgroup']['id']),array('class'=>'C1')); ?>
			<?php echo $this->Html->link(__("Փոփոխել"), array('action' => 'edit', $qgroup['Qgroup']['id']),array('class'=>'C1')); ?>
			<?php echo $this->Form->postLink(__("Ջնջել"), array('action' => 'delete', $qgroup['Qgroup']['id']),array('class'=>'C1'), __('Are you sure you want to delete # %s?', $qgroup['Qgroup']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	  <?php echo $this->element('pagination');?>


</div>
