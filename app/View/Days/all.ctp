<div class="days view">
<div class="bg">
		<h3 class='text_header  Hmargin20 padding5 txtC'>Բոլոր օրերի գրառումները</h3>
</div>

<ul class="Hmargin20">
	<?php	foreach ($days as $day): ?>
		<li class="Bpadding20 fs16  ListStyleN"> <?php echo $this->Html->image('home/hands.png', array('class'=>'floatL Rmargin10'));?> <?php echo $this->Html->link($day['Day']['name'],'/days/view/'.$day['Day']['id'],array('class'=>'C1')) ?>
				<ul class="Hmargin50  ListStyleN fs14">
					<?php	foreach ($day['Event'] as $event): ?>
						<li class=" Tpadding10"> <?php echo $this->Html->link($event['name'],'/events/view/'.$event['id'],array('class'=>'C1')) ?>
						</li>
					<?php endforeach; ?>
					<?php	foreach ($day['Reading'] as $reading): ?>
						<li class="Tpadding10"> <?php echo $this->Html->link($reading['name'],'/readings/view/'.$reading['id'],array('class'=>'C1')) ?>
						</li>
					<?php endforeach; ?>
				</ul>
						
		</li>
	<?php endforeach; ?>
</ul>
<div class="clear"></div>
<div class="txtC"><?php echo $this->element('pagination');?> </div>
</div>


