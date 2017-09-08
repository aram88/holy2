<ul class="head_images">
	<!--<li><?php echo $this->Html->image('home/BANNER-1.jpg');?></li>-->
		<li><?php echo $this->Html->image('home/main.jpg');?></li>
	<!--<li><?php echo $this->Html->image('home/BANNER-2.jpg');?></li>-->
	<li><?php echo $this->Html->image('home/head2.jpg');?></li>
	<!--<li><?php echo $this->Html->image('home/BANNER-1.jpg');?></li>-->
	<li><?php echo $this->Html->image('home/head3.jpg');?></li>
	<!--<li><?php echo $this->Html->image('home/BANNER-2.jpg');?></li>-->
	<li><?php echo $this->Html->image('home/head4.jpg');?></li>
	<!--<li><?php echo $this->Html->image('home/BANNER-1.jpg');?></li>-->
</ul>
<style type="text/css">

ul.head_images li {
    display: inline;
    position: absolute;
   
}
.head_images {
    list-style: none outside none;
}
li.show {
    z-index: 500;

}

</style>
<script type="text/javascript">
var fadeDuration1=7000;
var slideDuration1=11000;	
var currentIndex1=1;
var nextIndex1=1;

$(document).ready(function()
		{
	 $('ul.head_images li');
	 $('ul.head_images li').css({opacity: 0.0});
	 $("'ul.head_images li:nth-child("+nextIndex1+")'").addClass('show').animate({opacity: 1.0}, fadeDuration1);
	 var timer = setInterval('nextSlide1()',slideDuration1);
	})

function nextSlide1(){
	nextIndex1 =currentIndex1+1;
	if(nextIndex1> $('ul.head_images li').length)
		{
		 nextIndex1 =1;
		}
		 $("'ul.head_images li:nth-child("+nextIndex1+")'").addClass('show').animate({opacity: 1.0}, fadeDuration1);
         $("'ul.head_images li:nth-child("+currentIndex1+")'").animate({opacity: 0.0}, fadeDuration1).removeClass('show');
		 currentIndex1 = nextIndex1;
		}
</script>		