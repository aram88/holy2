<div class="bg C1">
		<h3 class="text_header bg Hmargin20 padding5 txtC">Ավելացնել հարցերի խումբ</h3>
</div>
<div class="qgroups form">
<?php echo $this->Form->create('Qgroup');?>
	<?php
		echo $this->Form->input('name',array('label'=>"Անուն"));
	?>
	
<?php echo $this->Form->submit(__('Ավելացնել'),array('class'=>'button Lmargin50'));
	  echo $this->Form->end();	?>
</div>
