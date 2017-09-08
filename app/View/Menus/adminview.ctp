<?php echo $this->Html->script('post/auto') ?>
<div class="posts index">
	<div class="bg">
        <h3 class="text_header Hmargin20 padding5 txtC"><?php echo __('Նյութեր');?></h3>
	</div>
	<div class ="floatL">
			<?php echo $this->Form->create('Menu',array('action'=>'search'))?>
			<?php echo $this->Form->input('search', array('type'=>'text','label' => false,'autocomplete'=>'off'))?>
			<?php echo $this->Form->submit(__('Որոնել Մենյու'),array('class'=>'button floatL Lmargin10'));
				  echo $this->Form->end();	?>
	</div>
	
	<div class ="floatR Rmargin20">
			<?php echo $this->Form->create('Post',array('action'=>'search'))?>
			<?php echo $this->Form->input('search', array('type'=>'text','label' => false,'autocomplete'=>'off'))?>
			<?php echo $this->Form->submit(__('Որոնել Նյութ'),array('class'=>'button floatR Lmargin10'));
				  echo $this->Form->end();	?>
	</div>
	<div class="clear"></div>
	<div class="Lmargin50">	
		<table cellpadding="10px" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('name','Անունը',array('class'=>'C1'));?></th>
				<th><?php echo $this->Paginator->sort('stick','Ստիկ',array('class'=>'C1'));?></th>
				<th><?php echo $this->Paginator->sort('created','Հրապ. ժամանակը',array('class'=>'C1'));?></th>
				<th class="actions"><?php echo __('Գործողություններ');?></th>
		</tr>
		<?php $i=1;
		foreach ($posts as $post): ?>
		<tr class= "<?php  if (($i++)%2 == 1){ echo 'bg';}?>">
			<td><?php echo h($post['Post']['name']); ?>&nbsp;</td>
			<td><?php echo h($stick[$post['Post']['stick']]); ?>&nbsp;</td>
			<td><?php echo h($post['Post']['created']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('Դիտել'), "/posts/view/".$post['Post']['id'],array('class'=>'C1')); ?>
				<?php echo $this->Html->link(__('Փոփոխել'), '/posts/edit/'.$post['Post']['id'],array('class'=>'C1')); ?>
				<?php echo $this->Form->postLink(__('Ջնջել'),'/posts/delete/'. $post['Post']['id'],array('class'=>'C1'), __('Դուք համոզված եք դուք ցանկանւմ եք ջնջել %s Նյութը', $post['Post']['name'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</table>        
	    <?php echo $this->element('pagination');?>
		<div class="actions Tmargin20">
			<?php echo $this->Html->link(__('Ավելացնել նոր Նյութ'), array('action' => 'add'),array('class'=>'button')); ?>
			<?php echo $this->Html->link(__('Մենյուների ցուցակ'), array('controller' => 'menus', 'action' => 'index'),array('class'=>'button Lmargin25')); ?>
			<?php echo $this->Html->link(__('Ավելացնել նոր Մենյու'), array('controller' => 'menus', 'action' => 'add'),array('class'=>'button Lmargin25')); ?>
		</div>
	</div>
</div>