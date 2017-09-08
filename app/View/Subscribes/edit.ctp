
<?php echo $this->Html->script('styles/style')?>
<?php echo $this->Html->script('ckeditor/ckeditor')?>

<div class="bg C1">
		<h3 class="text_header bg Hmargin20 padding5 txtC">Ուղարկել Նամակ</h3>
</div>
<div class="posts form Lmargin50">

<?php echo $this->Form->create('Subscribe');?>
	<?php 
		echo $this->Form->input('email',array( 
            'label'=>'Էլ. հասցեն', 'readonly'=>'readonly', 
           
        ));
        echo $this->Form->input('subject',array( 
            'label'=>'Թեման', 
           
        ));
		echo $this->Form->input('text',array( 
            'label'=>'Նամակի պարունակությունը', 'type'=>'textarea', 
            'class'=>'ckeditor'
        ));
        ?>
<?php echo $this->Form->submit(__('Ուղարկել'),array('class'=>'button Lmargin150'));
	  echo $this->Form->end();	?>
</div>

