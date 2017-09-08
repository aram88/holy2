<?php echo $this->Html->css('gallery/style')?>
<div class="bg">
		<h3 class="text_header bg Hmargin20 padding5 txtC">Նկարներ</h3>
</div>
<div class="actions margin30">
	<?php echo $this->Html->link(__("Ավելացնել նոր խումբ"), array('action' => 'add'),array('class'=>'button Lmargin25')); ?>
	<?php echo $this->Html->link(__('Նկարների ցուցակ'), array('controller' => 'galleries', 'action' => 'index'),array('class'=>'button Lmargin25')); ?>
	<?php echo $this->Html->link(__("Ավելացնել նոր նկար"), array('controller' => 'galleries', 'action' => 'add'),array('class'=>'button Lmargin25')); ?>
</div>

<div class="Rmargin30 Lmargin50">
		<?php if (isset($galleries)){?>
		<table cellpadding="10px" cellspacing="0" class="txtC HmariginA">
		<tr>
			<th><?php echo $this->Paginator->sort('name',"Անուն",array('class'=>"C1"));?></th>
			<th><?php echo $this->Paginator->sort('image',"Նկար",array('class'=>"C1"));?></th>
			<th><?php echo $this->Paginator->sort('created',"Հրապ. ժամանակը",array('class'=>"C1"));?></th>
			<th class="actions"><?php echo __("Գործողություններ");?></th>
		</tr>
	<?php $i=2;	foreach ($galleries as $gallery): ?>
			<tr <?php if (($i++ % 2)== 1){ echo "class='bg'";}?>>
				<td>
					<?php echo $this->Html->link($gallery['GalleryGroup']['name'], "#", array('class'=>'C1')); ?>
				</td>
				<td><?php echo $this->Html->image("/img/gallery_group/".$gallery['GalleryGroup']['image'],array('height'=>'50px')); ?></td>
				<td><?php echo $gallery['GalleryGroup']['created']; ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__("Դիտել"), array('action' => 'view', $gallery['GalleryGroup']['id']),array('class'=>"C1")); ?>
					<?php echo $this->Html->link(__("Փոփոխոլ"), array('action' => 'edit', $gallery['GalleryGroup']['id']),array('class'=>"C1")); ?>
					<?php echo $this->Form->postLink(__("Ջնջել"), array('action' => 'delete', $gallery['GalleryGroup']['id']),array('class'=>"C1"), __('Դուք համոզված եք դուք ուզում եք ջնջել  %s մենյուն և դրան պատկանող նյութերը', $gallery['GalleryGroup']['name'])); ?>
				</td>
			</tr>
			
		<?php endforeach; ?>	
		
		</table>
		 <?php echo $this->element('pagination');?>
		<?php } else { ?>
		<span>
			Դեռևս նկարներ չեն ավելացվել:
		</span>
		<?php }?>
		
</div>
<div class="clear"></div>


