<?php echo $this->Html->link(__('Ավելացնել նոր նյութ'),array('controller' => 'posts','action'=>'add'),array('class'=>'button floatL Tmargin20 Lmargin25'));?>
<?php echo $this->Html->link(__('Ավելացնել նոր մենյու'),array('controller' => 'menus','action'=>'add'),array('class'=>'button floatL Tmargin20 Lmargin25'));?>
<?php echo $this->Html->link(__('Ավելացնել նոր իրադարձություն'),array('controller' => 'events','action'=>'add'),array('class'=>'button floatL Tmargin20 Lmargin25'));?>
<?php echo $this->Html->link(__('Ավելացնել նոր օր'),array('controller' => 'days','action'=>'add'),array('class'=>'button floatL Tmargin20 Lmargin25'));?>
<?php echo $this->Html->link(__('Ավելացնել նոր ընթերցվածք'),array('controller' => 'readings','action'=>'add'),array('class'=>'button floatL Tmargin20 Lmargin25'));?>
<?php echo $this->Html->link(__('Կրկնել ընթերցվածքը'),array('controller' => 'readings','action'=>'repeat'),array('class'=>'button floatL Tmargin20 Lmargin25'));?>
<div class="clear"></div>
<div>
Տեր Հայր նոր հատկություն է, կրկնում է ամբողջ պահք անցացծ տարվա նման: 
Տեր Հայր տեսա, որ մինչև մարտի 6 լրացրել եք:
Պահքի սկզբի օրը մարտի 7-ը դրեք:  
</div>
<?php echo $this->Html->link(__('Կրկնել Մեծ Պահքը ամբողջությամբ'),array('controller' => 'readings','action'=>'pahq'),array('class'=>'button floatL Tmargin20 Lmargin25'));?>
