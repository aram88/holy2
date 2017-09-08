<?php $yesNo = array('0'=>'Ոչ','1'=>'Այո');?>
<div class="helps index">
	<div class="bg">
<h3 class="text_header Hmargin20 padding5 txtC">Հրավեր ծառայության</h3>
</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th><?php echo $this->Paginator->sort('name','Անուն',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('last_name','Ազգանուն',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('surname','Հայրանուն',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('email','Էլ. Հասցե',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('home_tell','Հեռ.',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('work_tell','Աշխ. Հեռ.',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('mobile_tell','Բջջ. Հեռ.',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('age','Ծննդյան օր. Ամիս. Տարի',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('vichaky','Ընտանեկան կարգավիճակը',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('have_childe','Եթե կան երեխաներ,նշել անուն/երը/տարիքը ',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('why_help','Ինչու՞ եք որոշել դառնալ կամավոր',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('help_all','Բոլորին ովքեր օգնության կարիք ունեն',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('help_ald_and_ill',"Տարեցների և հաշմանդամների խնամք
					 (փոքր վերանորոգում, խոհարարություն, մաքրություն)",array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('ill_childe','Հաշմանդամ երեխաներին',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('new_born','Նորածիններին` իրենց  տներում',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('have_no_home','Անօթևաններին 
						(ապահովել հագուստով, օգնել վերականգնել փաստաթղթերը, գտնել հարազատներին  և այլն)',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('havy_ill','Ծանր հիվանդներին',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('litle_ill','Թեթև հիվանդներին',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('big_family','Բազմանդամ ընտանիքներին',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('alone_man','Միայնակ մարդկանց',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('other_help_1','Այլ ծառայություններ',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('have_helth_problem','Եթե ունեք որեւէ սահմանափակումներ առողջության/եթե այո նշեք դրանք',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('clean_home','Մաքրել տունը,լվանալ հատակը,պատուհանները',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('cook','Ուտելիք պատրաստել',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('by_food','Գնել սնունդ, հագուստ, դեղորայք',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('walk_with_childe','Զբոսնել երեխայի հետ, օգնել դասերը սովորել',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('walk_with_ill','Զբոսնել հիվանդի կամ հաշմանդամի հետ',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('take_care','Խնամք(լողացնել,կտրելեղունգները,փոխել տեղաշորը կամ տակդիրը)',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('care_if_teach','Պատրաստ եմ օգնել, խնամել,եթե սովորեցնեն ոնց և ինչպես անել',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('help_on_retulgy','Օգնել արարողությունների ժամանակ (կնունքներ,բարեգործություններ, կատարել զանգեր,ինտերնետային շնորհավորանքներ)',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('psychological','Հոգեբանական աջակցություն',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('treatment','Բուժօգնություն',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('drive_to_church','Ուղեկցել եկեղեցի ավոտոմեքենայով<',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('visit','Հյուրընկալել / հյուր գնալ` գիրք կարդալ,զրույցել',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('to_write','Օգնել լրացնել փաստաթղթեր, տեղեկանքներ',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('christian_romance','Քրիստոնեական զրույցներ',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('clothes_distributed','Հագուստ բաժանել կարիքավորներին /մեքենայով կամ  առանց  դրա/',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('talk_by_phone','Զրուցել հեռախոսով',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('build_home','Կատարել փոքրիկ վերանորոգում(նշել  ինչպիսի)',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('call_wanthers','Զանգահարել  կամավորներին, օգնել գործակատարներին',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('legal_advice','Իրավաբանական խորհրդատվություն',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('financial_aid','Ֆինանսական օգնություն',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('church_work','Կարող եմ ինձ փորձել որպես համակարգող, պատասխանատւ լինել եկեղեցական գործունեության յուրաքանչուր  ուղղություններով (նշել   ինչ  ուղղություններով)',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('profecion_advice','Տալ մասնագիտական խորհրդատվություն (անհատական, hեռ.-ով, e-mail-ով,  ինտեր.կայքում.  /հստակ նշել ինչպիսի)',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('other_help','Այլ ծառայություններ',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('one_day_month_work','Ամիսը մեկ անգամ Աշխ.  օրեր',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('one_day_month_holy','Ամիսը մեկ անգամ  Հանգստյան օրեր',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('two_day_month_work','Ամիսը մեկ անգամ Աշխ.  օրեր',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('two_day_month_holy','Ամիսը մեկ անգամ Հանգստյան օրեր ',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('one_day_week_work','Շաբաթը մեկ օր /նշել օրը/ Աշխ.  օրեր',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('one_day_week_holy','Շաբաթը մեկ օր /նշել օրը/ Հանգստյան օրեր',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('many_day_week_work','Շաբաթը մեկ օրից ավել /նշել որ օրերը/  Աշխ.  օրեր',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('many_day_week_holy','Շաբաթը մեկ օրից ավել /նշել որ օրերը/ Հանգստյան օրեր ',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('every_day_work','Ամեն օր Աշխ.  օրեր',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('every_day_holy','Ամեն օր Հանգստյան օրեր',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('help_every_afternoon','Դուք կարո՞ղ եք օգնել աշխատանքային օրերին` ցերեկը',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('holy_born','Մկրտվա՞ծ եք (եթե այո նշել որ եկեղեցում)',array('class'=>'C1'));?></th>
			<th><?php echo $this->Paginator->sort('created','Հրապ. Ժամ.',array('class'=>'C1'));?></th>
			<th class="actions"><?php echo __('Գործողություններ');?></th>
	</tr>
	<?php
	foreach ($helpes as $help): ?>
	<tr>
		<td><?php echo h($help['Helpe']['name']); ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['surname']); ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['email']); ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['home_tell']); ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['work_tell']); ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['mobile_tell']); ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['age']); ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['vichaky']); ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['have_childe']); ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['why_help']); ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['help_all']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['help_ald_and_ill']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['ill_childe']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['new_born']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['have_no_home']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['havy_ill']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['litle_ill']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['big_family']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['alone_man']]; ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['other_help_1']); ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['have_helth_problem']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['clean_home']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['cook']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['by_food']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['walk_with_childe']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['walk_with_ill']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['take_care']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['care_if_teach']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['help_on_retulgy']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['psychological']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['treatment']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['drive_to_church']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['visit']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['to_write']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['christian_romance']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['clothes_distributed']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['talk_by_phone']]; ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['build_home']); ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['call_wanthers']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['legal_advice']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['financial_aid']]; ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['church_work']); ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['profecion_advice']); ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['other_help']); ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['one_day_month_work']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['one_day_month_holy']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['two_day_month_work']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['two_day_month_holy']]; ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['one_day_week_work']); ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['one_day_week_holy']]; ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['many_day_week_work']); ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['many_day_week_holy']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['every_day_work']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['every_day_holy']]; ?>&nbsp;</td>
		<td><?php echo $yesNo[$help['Helpe']['help_every_afternoon']]; ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['holy_born']); ?>&nbsp;</td>
		<td><?php echo h($help['Helpe']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Դիտել'), array('action' => 'view', $help['Helpe']['id'])); ?>
			<?php echo $this->Html->link(__('Փոփոխել'), array('action' => 'edit', $help['Helpe']['id'])); ?>
			<?php echo $this->Form->postLink(__('Ջնջել'), array('action' => 'delete', $help['Helpe']['id']), null, __('Դուք համոզված եք դու ցանկանոմ եք ջնջել # %s թերթիկը', $help['Helpe']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	
</div>

