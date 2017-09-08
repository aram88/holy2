<?php echo $this->Html->css('jcrop/jquery.Jcrop')?>
<?php echo $this->Html->css('jcrop/demos')?>
<?php echo $this->Html->css('jquery-ui-timepicker-addon')?>
<?php echo $this->Html->script('jcrop/cropa')?>
<?php echo $this->Html->script('jcrop/jquery.Jcrop')?>
<?php echo $this->Html->script('lib/ajaxfileupload/ajaxfileupload'); ?>
<?php echo $this->Html->script('timepiker/jquery-ui-timepicker-addon')?>
<?php echo $this->Html->script('timepiker/localization/jquery-ui-timepicker-ru')?>
<?php echo $this->Html->script('generic')?>


<div class="galleryGroups form">
<div class="clear"></div>
	<div class="bg">
			<h3 class="text_header bg Hmargin20 padding5 txtC"><?php  echo __('Ավելացնել նկարների խումբ');?></h3>
	</div>
<?php echo $this->Form->create('GalleryGroup');?>
 	<?php
		echo $this->Form->input('name', array('label'=>'Անունը'));
		echo $this->Form->input('image',array('type'=>'file','class'=>'imageCrop','name'=>'fileToUpload', 'id'=>'fileToUpload','label'=>'Նկարը'));
		?>
		<div class='left ml30 mb10 upload'>
				<?php echo $this->Html->image('upload/loading.gif',array( 'id'=>'upload', 'class'=>'displayN' ));?>
			</div>
			<?php if (!empty($this->request->data['GalleryGroup']['image'])):?>
			<div class='image ml30 mb20'>
				<?php echo $this->Html->image('upload/'.$this->request->data['GalleryGroup']['image'],array('id'=>'cropbox','class'=>'Bmargin20'))?>
			 </div>
			 <?php endif;?>
			<?php echo $this->Form->input('image',array('type'=>'hidden','id'=>'path')); ?>
			<input type="hidden" id="x" name="x"  value="none"/>
			<input type="hidden" id="y" name="y" value="none"/>
			<input type="hidden" id="w" name="w" value="none"/>
			<input type="hidden" id="h" name="h" value="none"/>
	<?php 
	    echo $this->Form->input('created',array('label'=>'Ժամանակը','type'=>'text','class'=>'time'));
	    echo $this->Form->submit(__('Ավելացնել'),array('class'=>'button Lmargin150'));
		echo $this->Form->end();	
	?>
</div>
<div class="actions Tmargin50 Lmargin30">
		<?php echo $this->Html->link(__('Նկարների խմբերի ցուցակ'), array('action' => 'index'),array('class'=>'button'));?>
		<?php echo $this->Html->link(__('Նկարների  ցուցակ'), array('controller' => 'galleries', 'action' => 'index'),array('class'=>'button Lmargin25')); ?>
		<?php echo $this->Html->link(__('Ավելացնել նոր նկար'), array('controller' => 'galleries', 'action' => 'add'),array('class'=>'button Lmargin25')); ?>
</div>
