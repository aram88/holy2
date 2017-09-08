<?php echo $this->Html->script('ckeditor/ckeditor')?>
	<div class="bg">
			<h3 class="text_header bg Hmargin20 padding5 txtC"><?php  echo __('Պատասխանել');?></h3>
	</div>
<div class="questions form  Lmargin50">
<div class="clear"></div>

<?php echo $this->Form->create('Question');
		echo $this->Form->input('id');
		echo $this->Form->input('qgroup_id',array('label'=>'Խումբ','empty'=>'-----'));
		echo $this->Form->input('first_name',array('label'=>'Անունը', 'readonly'=>'readonly'));
		echo $this->Form->input('mail',array('label'=>'Էլ. Հասցեն', 'readonly'=>'readonly'));
		echo $this->Form->input('text',array('label'=>'Հարցը'));
		echo $this->Form->input('ans_text',array('label'=>'Պատասխանը','class'=>'ckeditor') );
		echo $this->Form->submit(__('Պատասխանել'),array('class'=>'button Lmargin150 '));
		echo $this->Form->end();	?>
</div>
<div class="actions Tmargin50 Lmargin50">
		<?php echo $this->Form->postLink(__('Ջնջել'), array('action' => 'delete', $this->Form->value('Question.id')),array('class'=>'button Lmargin25'), __('Դուք համոզված եք դուք ուզում եք ջնջել %s հարցը ', $this->Form->value('Question.text'))); ?>
		<?php echo $this->Html->link(__('Հարցերի ցուցակ'), array('action' => 'index'),array('class'=>'button  Lmargin25'));?>
		<?php echo $this->Html->link(__('Խմբերի ցուցակ'), array('controller' => 'qgroups', 'action' => 'index'),array('class'=>'button  Lmargin25')); ?>
		<?php echo $this->Html->link(__('Ավելացնել Խումբ'), array('controller' => 'qgroups', 'action' => 'add'),array('class'=>'button  Lmargin25')); ?>
</div>
