<div class="staticPages form">
<?php echo $this->Form->create('StaticPage');?>
	<fieldset>
		<legend><?php echo __('Add Static Page'); ?></legend>
	<?php
		echo $this->Form->input('name');
		  echo $this->Tinymce->input('StaticPage.text', array( 
            'label' => 'text' 
            ),array( 
                'language'=>'en' 
            ), 
            'full' 
        ); 
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Static Pages'), array('action' => 'index'));?></li>
	</ul>
</div>
