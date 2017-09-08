<div class="bg C1">
		<h3 class="text_header bg Hmargin20 padding5 txtC">Օրերի ցուցակ</h3>
</div>
<div class="actions margin30 Lmargin50">
		<?php echo $this->Html->link(__('Ավելացնել ներ օր'), array('action' => 'add'),array('class'=>'button')); ?>
		<?php echo $this->Html->link(__('Իրադարձությունների ցուցակ'), array('controller' => 'events', 'action' => 'index'),array('class'=>'button Lmargin25')); ?>
		<?php echo $this->Html->link(__('Ավելացնել ներ իրադարձություն'), array('controller' => 'events', 'action' => 'add'),array('class'=>'button Lmargin25')); ?>
		<?php echo $this->Html->link(__('Ընթերցվածքների ցուցակ'), array('controller' => 'readings', 'action' => 'index'),array('class'=>'button Lmargin25')); ?>
		<?php echo $this->Html->link(__('Ավելացնել նոր ընթերցվածք'), array('controller' => 'readings', 'action' => 'add'),array('class'=>'button Lmargin25')); ?>
	</div>
<div class="days index Lmargin50" >
	<table cellpadding="10px" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('name','Անունը',array('class'=>'C1'));?></th>
		<th><?php echo $this->Paginator->sort('created','Հրապարակման ժամանակը',array('class'=>'C1'));?></th>
		<th class="actions"><?php echo __('Գործողություններ');?></th>
	</tr>
	<?php $i = 2;
	foreach ($days as $day): ?>
	<tr class="<?php if (($i++)%2==1){echo "bg";} ?>">
		<td><?php echo h($day['Day']['name']); ?>&nbsp;</td>
		<td><?php echo h($day['Day']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Դիտել'), array('action' => 'view', $day['Day']['id']),array('class'=>'C1')); ?>
			<?php echo $this->Html->link(__('Փոփոխել'), array('action' => 'edit', $day['Day']['id']),array('class'=>'C1')); ?>
			<?php echo $this->Form->postLink(__('Ջնջել'), array('action' => 'delete', $day['Day']['id']), array('class'=>'C1'), __('Դուք համոզված եք դուք ցանկանւմ  եք ջնջել %s ', $day['Day']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="clear Vamrgin25">
	<?php echo $this->element('pagination')?>
	</div>

</div>