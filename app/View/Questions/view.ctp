<div class="bg">
		<h3 class="text_header bg Hmargin20 padding5 txtC"><?php  echo __('Հարց');?></h3>
	</div>
<div class="questions view Lmargin50">
	
<table>
	<tr>
		<td class='txtL'>Խումբը</td>
		<td><?php echo $question['Qgroup']['name']?></td>
	</tr>
	<?php if (!empty($question['Question']['first_name'])):?>
	<tr>
		<td class='txtL'>Անունը</td>
		<td><?php echo $question['Question']['first_name']?></td>
	</tr>
	<?php endif; ?>
	
	<tr>
		<td class='txtL'>Հարցը</td>
		<td><?php echo $question['Question']['text']?></td>
	</tr>
	<tr>
		<td class='txtL'>Պատասխանը</td>
		<td><?php echo $question['Question']['ans_text']?></td>
	</tr>
	<tr>
		<td class='txtL'>Ժամանակը</td>
		<td><?php echo $question['Question']['created']?></td>
	</tr>
</table>
	
<div class="actions Tmargin30">
		<?php echo $this->Html->link(__('Պատասխանել'), array('action' => 'edit', $question['Question']['id']),array('class'=>'button Lmargin25')); ?>
		<?php echo $this->Form->postLink(__('Ջնջել'), array('action' => 'delete', $question['Question']['id']), array('class'=>'button Lmargin25'), __('Դուք համոզված եք դուք ուզում եք ջնջել %s հարցը ', $question['Question']['text'])); ?>
		<?php echo $this->Html->link(__('Հարցերի ցուցակ'), array('action' => 'index'),array('class'=>'button Lmargin25')); ?>
		<?php echo $this->Html->link(__('Խմբերի ցուցակ'), array('controller' => 'qgroups', 'action' => 'index'),array('class'=>'button Lmargin25')); ?>
		<?php echo $this->Html->link(__('Ավելացնել Խումբ'), array('controller' => 'qgroups', 'action' => 'add'),array('class'=>'button Lmargin25')); ?>
</div>
</div>