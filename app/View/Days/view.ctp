<div class="days view">
<div class="bg">
		<h3 class='text_header  Hmargin20 padding5 txtC'><?php  echo $day['Day']['name'];?></h3>
</div>

<ul class="Hmargin20 ListStyleN">
	<?php	foreach ($day['Event'] as $event): ?>
		<li class="Bpadding20 fs16"> <?php echo $this->Html->image('home/hands.png', array('class'=>'floatL Rmargin10'));?><?php echo $this->Html->link($event['name'],'/events/view/'.$event['id'],array('class'=>'C1')) ?>
		</li>
	<?php endforeach; ?>
	<?php	foreach ($day['Reading'] as $reading): ?>
		<li class="Bpadding20 fs16"> <?php echo $this->Html->image('home/hands.png', array('class'=>'floatL Rmargin10'));?><?php echo $this->Html->link($reading['name'],'/readings/view/'.$reading['id'],array('class'=>'C1')) ?>
		</li>
	<?php endforeach; ?>	
	
</ul>

</div>


