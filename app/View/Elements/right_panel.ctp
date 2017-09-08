
<div class="padding10 fs14 Bmargin20 txtC">

		<div class ="Bmargin10 fs13 C1" style="font-size: 13px;"><label for="subInput"><?php echo __("Կայքին բաժանորդագրվելու համար մուտքագրեք ձեր Էլեկտրոնային հասցեն"); ?></label></div>
		<?php	echo $this->Form->create('Subscribe',array('action'=>'add', 'class'=>array('Lmargin0')));
			echo $this->Form->input('email',array('label'=>false, "id"=>'subInput', 'type'=>'text') );
			echo $this->Form->submit(__('Բաժանորդագրվել'),array('class'=>'button'));
	 		echo $this->Form->end(); 
		?>
	</div>
	<div class="bg3 fcwhite  categories" >
		Հարց Քահանային
	</div>
	
	<div class=" smallposttext  padding10 fs14" id="slideshow"  style="height: 200px;">
	
	<ul class='slideshow'> 
		<li> <?php  echo $this->Html->link($this->Html->image('question/harc11.jpg',array('width'=>'200px','height'=>'200px')),"/questions/add",array('escape'=>false)) ?>  </li>
		<li> <?php  echo $this->Html->link($this->Html->image('question/harc22.jpg',array('width'=>'200px','height'=>'200px')),"/questions/add",array('escape'=>false)) ?></li>	
		<li> <?php  echo $this->Html->link($this->Html->image('question/harc33.jpg',array('width'=>'200px','height'=>'200px')),"/questions/add",array('escape'=>false)) ?>  </li>
		<li> <?php  echo $this->Html->link($this->Html->image('question/harc44.jpg',array('width'=>'200px','height'=>'200px')),"/questions/add",array('escape'=>false)) ?></li>	
	</ul>
		
				
	</div>
<?php if (isset($right_menus)): foreach ($right_menus as $right_menu):?>
	<div class="bg3 fcwhite  categories" >
		<?php echo $right_menu['Menu']['name']?>
	</div>
	
	<div class=" smallposttext  padding10 fs14" >
		<?php if(!empty($right_menu['Children'])) {
				foreach ($right_menu['Children'] as $menu){?>
					<div class="txtL Bpadding10 " >
						<?php echo $this->Html->link(__($menu['name']),"/menus/view/".$menu['id'],array('class'=>'C1'))?>
					</div>
			
		<?php } }?>
		<?php foreach ($right_menu['Post'] as $post):?>	
				<div class="txtL Bpadding10 " >
					<?php echo $this->Html->link(__($post['name']),"/posts/view/".$post['id'],array('class'=>'C1'))?>
				</div>
		<?php endforeach;?>
	</div>
<?php endforeach; endif;?>			
<div class="clear"></div>
<div class="bg3 categories fcwhite Bmargin20 Tmargin20"> Լսել քարոզներ</div>
<div class=" smallposttext  padding10 fs14" >
	<?php if (isset($right_medias)): foreach ($right_medias as $post):?>	
			<div class="txtL Bpadding10 " >
				<?php echo $this->Html->link($this->Html->image('home/mp3.png'),"/posts/view/".$post['Post']['id'],array('escape'=>false,'class'=>"floatL"));;
				echo $this->Html->link(__($post['Post']['name']),"/posts/view/".$post['Post']['id'],array('class'=>'C1 Tmargin5','target'=>'_blank'))?>
			</div>
			<div class="clear Bmargin10"></div>
	<?php endforeach; endif;?>
</div>
<div class="clear"></div>
<div class="bg3 categories fcwhite Bmargin20 Tmargin20"> Հղումներ հոգևոր էջեր</div>
<div class=" smallposttext  padding10 fs14" >
	<div class="txtL Bpadding10 " >
		<div class="floatL Bmargin10">
		<div  class="floatL" style="width: 60px"> 
		<?php echo $this->Html->link($this->Html->image('home/ej.jpg'),"http://www.armenianchurch.org/",array('escape'=>false,'class'=>'floatL','target'=>'_blank')) ?>
		 </div><div  class="floatL" style="margin-top: -3px;"> 
		<?php echo $this->Html->link(__("Մայր Աթոռ Սուրբ Էջմիածին"),"http://www.armenianchurch.org/",array('class'=>'C1 lghref floatL','target'=>'_blank'))?>
		</div>
		</div>
		<div class="clear"></div>
		<div class="floatL Bmargin10">
		<div  class="floatL" style="width: 60px">
		<?php echo $this->Html->link($this->Html->image('home/at.jpg'),"http://www.araratian-tem.am/",array('escape'=>false,'class'=>'floatL','target'=>'_blank')) ?>
		</div><div  class="floatL" style="margin-top: -4px;"> 
		<?php echo $this->Html->link(__("Արարատյան Հայրապետական Թեմ"),"http://www.araratian-tem.am/",array('class'=>'C1 lghref floatL','target'=>'_blank'))?>
		</div>
		</div>
		<div class="clear "></div>
		<div class="floatL ">
		<div class="floatL" style="width: 60px">
		<?php echo $this->Html->link($this->Html->image('home/astlog.png',array('width'=>'60px')),"http://www.biblesociety.am/main.php?lang=a&page-id=1",array('escape'=>false,'class'=>'floatL','target'=>'_blank')) ?>
		</div>
		
		</div><div class="floatL" style="margin-top: -8px;"> 
		<?php echo $this->Html->link(__("Հայաստանի Աստվածաշնչյան Ընկերություն"),"http://www.biblesociety.am/main.php?lang=a&page-id=1",array('class'=>'C1 lghref floatL','target'=>'_blank'))?>
		</div>
		<div class="clear"></div>
		<div class="clear "></div>
		<div class="floatL ">
			<div class="floatL" style="width: 60px">
				<?php echo $this->Html->link($this->Html->image('home/armgen2.png',array('width'=>'60px')),"http://armeniangenocide100.org",array('escape'=>false,'class'=>'floatL','target'=>'_blank')) ?>
			</div>
		</div>
		<div class="floatL" style="margin-top: -8px;"> 
			<?php echo $this->Html->link(__("1915 - 2015 ՀԱՅՈՑ ՑԵՂԱՍՊԱՆՈՒԹՅԱՆ 100-րդ ՏԱՐԵԼԻՑ"),"http://armeniangenocide100.org",array('class'=>'C1 lghref floatL','target'=>'_blank'))?>
		</div>
		<div class="clear"></div>
		<div class="clear"></div>
		<div class="floatL ">
			<div class="floatL" style="width: 60px">
				<?php echo $this->Html->link($this->Html->image('home/zu.jpg',array('width'=>'60px')),"http://www.armchaplain.org",array('escape'=>false,'class'=>'floatL','target'=>'_blank')) ?>
			</div>
		</div>
		<div class="floatL" style="margin-top: -8px;"> 
			<?php echo $this->Html->link(__("ՀՀ ԶՈՒ Հոգևոր Առաջնորդություն"),"http://www.armchaplain.org",array('class'=>'C1 lghref floatL','target'=>'_blank'))?>
		</div>
		<div class="clear"></div>
		<div class="clear"></div>
	</div>
</div>
<div class="clear"></div>
<div class="bg3 categories fcwhite Bmargin20"> Ընթերցել նաև</div>
<div class=" smallposttext  padding10 fs14" >
	<?php  if (isset($right_posts)): foreach ($right_posts as $post):?>	
			<div class="txtL Bpadding10 " >
				<?php echo $this->Html->link(__($post['Post']['name']),"/posts/view/".$post['Post']['id'],array('class'=>'C1'))?>
			</div>
	<?php endforeach; endif;?>
</div>
<div class="Vmargin20 Hmargin10">
<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FFr.Isaiah&amp;width=200&amp;height=335&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px; height:335px;" allowTransparency="true"></iframe>
</div>
<style type="text/css">




ul.slideshow li {
    display: inline;
    position: absolute;
   
}
.slideshow {
    list-style: none outside none;
}
ul.slideshow li.show {
    z-index: 500;

}
#subInput {
	width: 200px;
	background: white;
}
.ui-datepicker {
    display: none;
    padding: 0.2em 0.2em 0;
    width: 212px;
}
.ui-datepicker table {
    border-collapse: collapse;
    font-size: 11px;
}
</style>
<script type="text/javascript">
var fadeDuration=10000;
var slideDuration=10000;	
var currentIndex=1;
var nextIndex=1;

$(document).ready(function()
		{
	 $('ul.slideshow li');
	 $('ul.slideshow li').css({opacity: 0.0});
	 $("'ul.slideshow li:nth-child("+nextIndex+")'").addClass('show').animate({opacity: 1.0}, fadeDuration);
	 var timer = setInterval('nextSlide()',slideDuration);
	})

function nextSlide(){
	nextIndex =currentIndex+1;
	if(nextIndex> $('ul.slideshow li').length)
		{
		 nextIndex =1;
		}
		 $("'ul.slideshow li:nth-child("+nextIndex+")'").addClass('show').animate({opacity: 1.0}, fadeDuration);
         $("'ul.slideshow li:nth-child("+currentIndex+")'").animate({opacity: 0.0}, fadeDuration).removeClass('show');
		 currentIndex = nextIndex;
		}
</script>
