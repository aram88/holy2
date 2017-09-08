<?php echo $this->Html->script('post/auto') ?>
<div class="bg">
        <h3 class="text_header Hmargin20 padding5 txtC"><?php echo __("Մենյուներ");?></h3>
</div>
<div class="actions Vmargin30 Lmargin20">
    <?php echo $this->Html->link(__("Ավելացնել նոր մենյու"), array('action' => 'add'),array('class'=>'button Lmargin20')); ?>
    <?php echo $this->Html->link(__("Նյութերի ցուցակ"), array('controller' => 'posts', 'action' => 'index'),array('class'=>'button Lmargin20')); ?> 
    <?php echo $this->Html->link(__("Ավելացնել նոր նյութ"), array('controller' => 'posts', 'action' => 'add'),array('class'=>'button Lmargin20')); ?> 

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
<div class="menus index Lmargin50">
	
<div class="txtC HmarginA Tmargin20">
	<table cellpadding="10px" cellspacing="0" class="txtC HmariginA">
	<tr>
			<th><?php echo $this->Paginator->sort('name',"Անուն",array('class'=>"C1"));?></th>
			<th><?php echo $this->Paginator->sort('visible',"Տեսանելիություն",array('class'=>"C1"));?></th>
			<th><?php echo $this->Paginator->sort('position',"Դիրքը",array('class'=>"C1"));?></th>
			<th><?php echo $this->Paginator->sort('location',"Վայրը",array('class'=>"C1"));?></th>
			<th><?php echo $this->Paginator->sort('sub_show',"Սուբ մենյուն երևա",array('class'=>"C1"));?></th>
			<th><?php echo $this->Paginator->sort('main_show',"Սուբ մենյուն երևա մենուների ցուցակում",array('class'=>"C1"));?></th>
			<th class="actions"><?php echo __("Գործողություններ");?></th>
	</tr>
	<?php $i = 1;
	foreach ($menues as $menu): ?>
	<tr <?php if (($i++ % 2)== 1){ echo "class='bg'";}?>>
		<td>
			<?php echo $this->Html->link($menu['Menu']['name'], array('controller' => 'menus', 'action' => 'adminview', $menu['Menu']['id']), array('class'=>'C1')); ?>
		</td>
		<td><?php echo $yes[$menu['Menu']['visible']]; ?>&nbsp;</td>
		<td><?php echo $menu['Menu']['position']; ?>&nbsp;</td>
		<td><?php echo $location[$menu['Menu']['location']]; ?>&nbsp;</td>
		<td><?php echo $yes[$menu['Menu']['sub_show']]; ?>&nbsp;</td>
		<td><?php echo $yes[$menu['Menu']['main_show']]; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__("Դիտել"), array('action' => 'view', $menu['Menu']['id']),array('class'=>"C1")); ?>
			<?php echo $this->Html->link(__("Փոփոխոլ"), array('action' => 'edit', $menu['Menu']['id']),array('class'=>"C1")); ?>
			<?php echo $this->Form->postLink(__("Ջնջել"), array('action' => 'delete', $menu['Menu']['id']),array('class'=>"C1"), __('Դուք համոզված եք դուք ուզում եք ջնջել  %s մենյուն և դրան պատկանող նյութերը', $menu['Menu']['name'])); ?>
		</td>
	</tr>
	 <?php echo $this->element('pagination');?>
<?php endforeach; ?>
	</table>
    
</div>	
 
</div>

	
