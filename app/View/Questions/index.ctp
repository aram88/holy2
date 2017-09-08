<div class="bg C1">
		<h3 class="text_header bg Hmargin20 padding5 txtC"><?php echo __('Հարցերի  ցուցակ');?></h3>
</div>
<div class="questions index">
	<table cellpadding="10" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('qgroup_id','Խումբը' ,array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('first_name','Անուն' , array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('text','Հարցը' ,array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('publish','Հրապարակվի' , array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('created', 'Ժամանակը' ,array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('ans_text','Պատասխանը' , array('class'=>'C1'));?></th>
			<th class="actions"><?php echo __('Գործողությունները');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($questions as $question): ?>
	<tr class="<?php if ($i++ % 2 == 0){echo "bg";}?>" >
		<td>
			<?php echo $question['Qgroup']['name']; ?>
		</td>
		<td><?php echo h($question['Question']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['text']); ?>&nbsp;</td>
		<td><?php echo h($type[$question['Question']['publish']]); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['created']); ?>&nbsp;</td>
		<td><?php echo strip_tags($question['Question']['ans_text']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Կարդալ'), array('action' => 'view', $question['Question']['id']),array('class'=>"C1")); ?>
			<?php echo $this->Html->link(__('Պատասխանել'), array('action' => 'edit', $question['Question']['id']),array('class'=>"C1")); ?>
			<?php echo $this->Form->postLink(__('Ջնջել'), array('action' => 'delete', $question['Question']['id']),array('class'=>"C1"), __('Դուք համոզված եք դուք ուզում եք ջնջել %s հարցը ', $question['Question']['text'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
		<?php echo $this->element('pagination');?>
</div>	
