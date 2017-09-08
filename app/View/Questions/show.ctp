

	<div class="crumb Hmargin20 Tmargin15">
		<?php   
				$this->Html->addCrumb('Հարց քահանային','/questions/add',array('class' => 'Lpadding5 Bpadding5')) ;
				$this->Html->addCrumb($question['Qgroup']['name'],'/qgroups/view/'.$question['Qgroup']['id'],array('class' => 'Lpadding5 Bpadding5')) ;
				$this->Html->addCrumb('','') ;
            	echo $this->Html->getCrumbs('>','Գլխավոր', array('class' => ''));
			
		?>
			<span class=" Lpadding5 ft-size"><?php echo  $question['Question']['text'];?></span>
	</div>	

<div class="bg">
		<h3 class="text_header bg Hmargin20 padding5 txtC"><?php  echo $question['Question']['text'];?></h3>
</div>
<div class="questions lh24 Hmargin25 Vmargin30 txtJ">
		<?php echo $question['Question']['ans_text']?>
</div>
<div class="clear Bmargin15 "></div>
<div class="Hmargin20"> <?php echo $this->element('share')?></div>