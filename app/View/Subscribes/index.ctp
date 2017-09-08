<?php echo $this->Html->script('post/auto') ?>
<div class="posts index">
	<div class="bg">
        <h3 class="text_header Hmargin20 padding5 txtC"><?php echo __('Բաժանորդագրվողներ');?></h3>
	</div>
	<div class="actions margin20 Lmargin30">
			<?php echo $this->Html->link(__('Ուղարկել նամակ բոլորին'), array('action' => 'view'),array('class'=>'button')); ?>
		</div>

	<div class="clear"></div>
	
	<div class="Lmargin50">	
		<table cellpadding="10px" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('email','Անունը',array('class'=>'C1'));?></th>
				<th class="actions"><?php echo __('Գործողություններ');?></th>
		</tr>
		<?php $i=1;
		foreach ($subscribes as $subscribe): ?>
		<tr class= "<?php  if (($i++)%2 == 1){ echo 'bg';}?>">
			
			<td><?php echo h($subscribe['Subscribe']['email']); ?>&nbsp;</td>
			
			<td class="actions">
				<?php echo $this->Html->link(__('Դիտել'), array('action' => 'view', $subscribe['Subscribe']['id']),array('class'=>'C1')); ?>
				<?php echo $this->Html->link(__('Ուղարկել նամակ'), array('action' => 'edit', $subscribe['Subscribe']['id']),array('class'=>'C1')); ?>
				<?php echo $this->Form->postLink(__('Ջնջել'), array('action' => 'delete', $subscribe['Subscribe']['id']),array('class'=>'C1'), __('Դուք համոզված եք դուք ցանկանւմ եք ջնջել %s բաժամորդին', $subscribe['Subscribe']['email'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</table>        
	    <?php echo $this->element('pagination');?>
		
	</div>
</div>