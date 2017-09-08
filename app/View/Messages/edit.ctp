<div class="messages form">
<?php echo $this->Form->create('Message');?>
	<?php
		echo $this->Form->input('subject',array('label'=>'Թեման','readonly'=>'readonly'));
		echo $this->Form->input('mail',array('label'=>'Էլ հասցեն','readonly'=>'readonly'));
		echo $this->Form->input('text',array('label'=>'Բովանդակությունը','readonly'=>'readonly'));
		echo $this->Form->input('ans',array('label'=>'Պատասխանը','type'=>'textarea'));
	?>

<?php echo $this->Form->submit(__('Պատասխանել'),array('class'=>'button Lmargin150'));
	  echo $this->Form->end();	?>
</div>
