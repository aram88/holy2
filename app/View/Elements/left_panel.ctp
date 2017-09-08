<div class="  txtC Tpadding20 Bpadding20">
<?php if (isset($readings)):?>
<div class="bg3 categories ">
	<?php echo $this->Html->link($readings['Day']['name'],'/days/view/'.$readings['Day']['id']);?>
</div>	
	<?php if (!empty($readings['Event']['0'])){?>
		<ul class=" txtL Vmargin10 fs12 ">
			<?php $i=2; foreach ($readings['Event'] as $event){?>
			<li class="  Hpadding10  Vpadding5 <?php if (($i++)%2==1){echo "bg1";}?>"> 
				<?php echo $this->Html->link($event['name'],'/events/view/'.$event['id'],array('class'=>'C1'));?>
			</li>
			<?php }?>
		</ul>
	<?php }?>

	<?php if (!empty($readings['Reading']['0'])){?>
		<ul class=" txtL fs12  Tmargin20 ">
			<?php $i=3; foreach ($readings['Reading'] as $reading){?>
			<li class="lh2  Hpadding10  <?php if (($i++)%2==1){echo "bg1";}?>"> 
				<?php echo $this->Html->link($reading['name'],'/readings/view/'.$reading['id'],array('class'=>'C1'));?>
			</li>
			<?php }?>
		</ul>
	<?php }?>	
	
	 <div class="txtR Rmargin5 Tmargin10"><?php echo $this->Html->link("Բոլոր օրերի գրառումները >>",'/days/all/',array('class'=>'C1 fs12')) ?></div>
<?php endif;?>	 
</div>
<div class="time12"></div>
<div class="clear"></div>
<div class="bg3 fcwhite categories Vmargin20"> <?php echo $this->Html->link(" Սբ. Երրորդություն Եկեղեցի","/menus/view/77", array("escape"=>false,'title'=>' Սբ. Երրորդություն Եկեղեցի','alt'=>' Սբ. Երրորդություն Եկեղեցի'))?></div>
<div class="clear"></div>
<iframe width="220" height="200" src="http://www.youtube.com/embed/7LRjpgNSIMM" frameborder="0" allowfullscreen></iframe>
<div class="clear"></div>
<ul class="leftul Tmargin15">
	<?php if (isset($left_menus)): $j=0;  $i=2; foreach ($left_menus as $menu):?>
		<?php //if($menu['Menu']['name']=="Սբ. Երրորդություն Եկեղեցի" || $menu['Menu']['id']==77){continue;} ?>
		<li class="<?php if ($i% 2 == 0){echo "bg1";}?> menu"> <?php echo $this->Html->image('home/hands.png', array('class'=>'floatL Rmargin5'));?>
            <?php if ($menu['Menu']['id']==134){echo $this->Html->link($menu['Menu']['name'],'/d.c', array('class'=>'C1'));}else{ echo $this->Html->link($menu['Menu']['name'],"/menus/view/".$menu['Menu']['id'], array('class'=>'C1'));}?>
			<ul class="Tmargin10 Lmargin10 <?php if (($i%2) == 0){echo "sub1";} else {echo "sub";}?>">
				<?php foreach ($menu['Children'] as $children):?>
					<li class='child_menu'> <?php echo $this->Html->link($children['name'],"/menus/view/".$children['id']);?> </li>
				<?php  endforeach;?>
			</ul>
		</li>
	<?php $j++; $i++; if ($j==7){
			break;
		} endforeach; endif;
		
	?>
</ul>
<div class="clear"></div>
<?php echo $this->Html->link($this->Html->image('home/seem.png'),"/menus/view/9", array("escape"=>false,'title'=>'ՍԵԵՄ','alt'=>'ՍԵԵՄ'))?>
<ul class="leftul">
	<?php if (isset($left_menus)):  $m=3; for ($k=7;$k < count($left_menus);$k++){?>
		<li class="<?php if ($m % 2 == 1){echo "bg1";}?> menu"> <?php echo $this->Html->image('home/hands.png', array('class'=>'floatL Rmargin5'));?>
            <?php echo $this->Html->link($left_menus["$k"]['Menu']['name'],"/menus/view/".$left_menus["$k"]['Menu']['id'], array('class'=>'C1'))?>
			<ul class="Tmargin15 Lmargin10 <?php if (($m%2) == 0){echo "sub1";} else {echo "sub";}?>">
				<?php foreach ($left_menus[$k]['Children'] as $children):?>
					<li class='child_menu'> <?php echo $this->Html->link($children['name'],"/menus/view/".$children['id']);?> </li>
				<?php  endforeach;?>
			</ul>
		</li>
	<?php  $m++; } endif;
		
	?>
</ul> 
<div class="clear"></div>
	
<div class="Vmargin10 Hmargin10">
		<?php echo $this->Html->link($this->Html->image('home/bararan.jpg', array('width'=>'200px')),'/media/bararan.pdf',array('escape'=>false,'title'=>'Ժեստերի լեզվի հոգևոր բառարան','alt'=>'Ժեստերի լեզվի հոգևոր բառարան','target'=>'_blank'));?>
</div>
<div class="clear"></div>
<div class="bg3 categories fcwhite Bmargin20"> Ընթերցանություն</div>
<div class=" smallposttext  padding10 fs14" >
	<?php if (isset($left_books)): foreach ($left_books as $post):?>	
			<div class="txtL Bpadding10 " >
				<?php echo $this->Html->link(__($post['Post']['name']),"/media/".$post['Post']['path'],array('class'=>'C1','target'=>'_blank'))?>
			</div>
	<?php endforeach; endif;?>
</div>
