<div class="bg">
	<h3 class="text_header bg Hmargin20 padding5 txtC"><?php echo __('Հետադարձ Կապ'); ?></h3>
</div>
<div class ="margin20 txtC">
	<p>Երևանի Սուրբ Երրորդություն Եկեղեցի</p>
	<p>Հասցե ` Երևան, ՀԱԹ, Րաֆֆու փողոց</p>	
	<p>Հեռ.  010 72 60 70</p>
	<p>Էլ. փոստ `  info@holytrinity.am</p>
	<p><a href="http://www.facebook.com/Fr.Isaiah" class="C1" target="_blank">http://www.facebook.com/Fr.Isaiah</a></p>
</div>
<div class="messages form">
<?php echo $this->Form->create('Message');?>
	<?php
		echo $this->Form->input('subject',array('label'=>'Թեման') );
		echo $this->Form->input('mail',array('label'=>'Էլեկտրոնային հասցեն'));
		echo $this->Form->input('text',array('label'=>'Բովանդակությունը'));
	?>
<?php
		echo $this->Form->submit(__('Ուղարկել'),array('class'=>'button Lmargin150','label'=>'  ')); 
		echo $this->Form->end();?>
</div>
