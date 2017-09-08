<?php echo $this->Html->css('search');?>   
<div class="bg">
	<h3 class="text_header bg Hmargin20 padding5 txtC"><?php echo __('Որոնել'); ?></h3>
</div>
<!-- Put the following javascript before the closing </head> tag. -->
<div>
<script>
  (function() {
    var cx = '003338492447050159057:pkbxftcwor0';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
</div>     
<?php echo $this->Html->script('search/search');?>      