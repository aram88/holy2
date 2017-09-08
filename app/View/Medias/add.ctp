<?php echo $this->Html->script('lib/ajaxfileupload/ajaxfileupload'); ?>
<?php echo $this->Html->script('media/add'); ?>
<div class="bg C1">
		<h3 class="text_header bg Hmargin20 padding5 txtC">Ավելացնել մեդիա</h3>
</div>
<div class="media form">
<?php echo $this->Form->create('Media');?>
		<?php
		echo $this->Form->input('name',array('label'=>'Անունը'));
		echo $this->Form->input('path',array('type'=>'hidden'));
		echo $this->Form->input('file',array('label'=>'Մեդիան','type'=>'file','class'=>'file','name'=>'fileToUpload', 'id'=>'fileToUpload'));
	?>	
	<div class='Vmargin10 upload'>
		<?php echo $this->Html->image('upload/loading.gif',array( 'id'=>'upload', 'class'=>'displayN Lmargin50 Lpadding20' ));?>
	</div>
	<div class="Lmargin50 Tmargin10">
		<a href="#" id="aUp" class="button pointer Lmargin50 Lpadding50 diaplayB Tmargin30">Բեռնել սերվեռ </a>
	</div>

	
<?php echo $this->Form->submit(__('Ավելացնել'),array('class'=>'button Lmargin150 displayN'));
	  echo $this->Form->end();	?>
<div class="actions Tmargin30 Lmargin50">
	<?php echo $this->Html->link(__('Մեդիաների ցուցակ'), '/media/index',array('class'=>'button'));?>
</div>
</div>

