<?php echo $this->Html->script('readings/auto') ?>
<?php echo $this->Html->script('timepiker/jquery-ui-timepicker-addon')?>
<?php echo $this->Html->script('timepiker/localization/jquery-ui-timepicker-ru')?>
<?php echo $this->Html->script('generic')?>
<?php echo $this->Html->script('styles/style')?>
<div class="days form Lmargin50 Tmargin20" >
			<?php echo $this->Form->create('Reading',array('action'=>'search'))?>
			<?php echo $this->Form->input('search', array('type'=>'text','label' => 'Իրադարձություն','autocomplete'=>'off'))?>
			<?php echo $this->Form->input('read', array('type'=>'text','label' => 'Ընթերցվածք','autocomplete'=>'off'))?>
			<?php echo $this->Form->submit(__('Փնտրել'),array('class'=>'button floatL Lmargin10'));
				  echo $this->Form->end();	?>
	</div>
<br/>
<br/>
<br/>	
<div class="claer"></div>	
<div id = "cont">
</div>
<br/>
<br/>
<div class="clear"></div>
<div id="form" class = "displayN">
<?php
		echo $this->Form->create('Day',array('action'=>'create'));
		echo $this->Form->input('name',array('label'=>'Անունը','type'=>'text'));
	    echo $this->Form->input('created',array('label'=>'Ժամանակը','type'=>'text','class'=>'time'));
	    echo $this->Form->input('old_day',array('type'=>'hidden','class'=>'time','value'=>'0'));
		echo $this->Form->submit(__('Ավելացնել'),array('class'=>'button Lmargin150'));
	  	echo $this->Form->end();	?>
</div>
