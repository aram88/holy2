<?php echo $this->Html->script('questions/add')?>
<div class="bg">
	<h3 class="text_header bg Hmargin20 padding5 txtC"><?php echo __('Հարց Քահանային'); ?></h3>
</div>
<div class="clear"></div>
<div class="Qgroups Hmargin20 lh24 txtJ">
	<div>
		Ստորև ներկայացված են հոգևորականին հաճախակի տրվող հարցերն ու դրանց պատասխանները:
		 Հարցերը դասակարգված են ըստ թեմաների:
		  Ձեզ հուզող հարցերը կարող եք ուղղել քահանային ներքևում տեղադրված վանդակի միջոցով: 
		  Նախապես ծանոթացեք ենթաբաժիններին և նրանց մեջ տեղադրված հարցերին, որտեղ հավանական է, որ կգտնեք ձեզ հուզող շատ հարցերի պատասխաններ: 
		  Սիրով սպասում ենք Ձեր նամակներին և հարցերին:
	</div>
	<div class="clear Bmargin15"></div>
	<?php  foreach ($qgroups as $id=>$name):?>
		<div class="Bmargin15 Lmargin20">
			<span class="C1 pointer fs14 fwb question" id="<?php echo $id?>"><?php echo $this->Html->image('home/hands.png', array('class'=>'floatL Rmargin10'));?> <?php echo $name?></span>
			<input type="hidden" value="0" id="<?php echo $name?>"/> 
		</div>
	<?php endforeach; ?>
</div>
<div class="clear"></div>
<div class="Vmargin15 Hmargin20 Tmargin30 lh24 txtJ"> Եթե չեք գտել ձեզ հուզող հարցի պատասխանը, լրացրեք ձեր հարցը վանդակի մեջ և սեղմեք կոճակը:</div>
<div class="clear"></div>
<div class="questions form">
<div class="txtC">
	<h3 class="text_header  Hmargin20 padding5 txtC"><?php echo __('Ձևակերպել հարցը'); ?></h3>
</div>
<?php
	 echo $this->Form->create('Question');?>
	<?php
		echo $this->Form->input('first_name',array('label'=>'Անուն'));
		echo $this->Form->input('mail',array('label'=>'Էլ. հասցեն'));
		echo $this->Form->input('text',array('label'=>'Հարցի բովանդակություն'));
		echo $this->Form->input('publish',array('label'=>'Ձեր հարցը չհրապարակվի՞', 'type'=>'checkbox', 'class'=>'Awidth Tmargin10'));
	?>
	<div class=" Lmargin150">
		Մեր խնդրանքն է հարցը գրել հայերեն տառերով: Ձեր նշած Էլեկտրոնային հասցեն և անունը  չեն հրապարակվի: 
	</div>
	<div class="clear Bmargin10"></div>
	<?php
		echo $this->Form->submit(__('Ուղարկել հարցը'),array('class'=>'button Lmargin150','label'=>'  ')); 
		echo $this->Form->end();?>
</div>
