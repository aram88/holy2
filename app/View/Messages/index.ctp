<div class="bg C1">
		<h3 class="text_header bg Hmargin20 padding5 txtC"><?php echo __('Նամկներ');?></h3>
</div>
<div class="messages index">
	<table cellpadding="10" cellspacing="">
	<tr>
			<th><?php echo $this->Paginator->sort('subject','Թեման' ,array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('mail','Էլ. հասցեն' ,array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('text','Բովանդակությունը' ,array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('created','Հրապարակման Ժամանակը' ,array('class'=>'C1'));?></th>
			<th class="actions"><?php echo __('Գործողություններ');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($messages as $message): ?>
	<tr class="<?php if ($i++ % 2 == 0){echo "bg";}?>">
		<td><?php echo h($message['Message']['subject']); ?>&nbsp;</td>
		<td><?php echo h($message['Message']['mail']); ?>&nbsp;</td>
		<td><?php echo h($message['Message']['text']); ?>&nbsp;</td>
		<td><?php echo h($message['Message']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Պատասխանել'), array('action' => 'edit', $message['Message']['id']),array('class'=>'C1 Rmargin5')); ?>
			<?php echo $this->Form->postLink(__('Ջնջել'), array('action' => 'delete', $message['Message']['id']), array('class'=>'C1'), __('Դուքհամոզված եք դուք ցանկանում եք ջնջել  %s նամակը', $message['Message']['subject'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
