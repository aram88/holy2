	<div class="crumb Hmargin20">
		<?php   
				$this->Html->addCrumb('Հարց քահանային ','/questions/add',array('class' => 'Lpadding5 Bpadding5')) ;
				$this->Html->addCrumb('','') ;
            	echo $this->Html->getCrumbs('>','Գլխավոր', array('class' => ''));
			
		?>
			<span class=" Lpadding5 ft-size"><?php echo  $qgroup['Qgroup']['name'];?></span>
	</div>	

<div class="bg">
		<h3 class="text_header bg Hmargin20 padding5 txtC"><?php  echo $qgroup['Qgroup']['name'];?></h3>
</div>
<div class="qgroups view Hmargin25 ">
	<?php
		$i = 0;
		foreach ($qgroup['Question'] as $question): ?>
			<div class="Bmargin20"><?php echo $this->Html->image('home/hands.png', array('class'=>'floatL Rmargin10'));?> <?php echo $this->Html->link($question['text'],"/questions/show/".$question['id'],array('class'=>'C1'));?></div>
	<?php endforeach; ?>
</div>
