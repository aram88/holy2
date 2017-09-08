<style type="text/css"">
div.error div.error-message {
    color: red;
    font-size: 11px;
    margin-left: 173px;
}
td div.input {
	width: 5px;
	padding-bottom: 0px;
	
}
td div.input  input{
	width: auto;
	
}
td {text-align: left;}
.firsttd{
	width: 225px;
}
textarea {
	width: 285px; 
	height: 50px;
}

div.input label {
    float: left;
    font-size: 12px;
    margin: 1px 10px 0 0;
    padding: 5px;
    text-align: right;
    width: 154px;
}
div.required label {
    background: url("../img/components/star.png") no-repeat scroll 158px 4px transparent;
}
div.input input {
    border: medium none;
    width: 290px;
}
</style>

<div class="bg">
<h3 class="text_header Hmargin20 padding5 txtC">Հրավեր ծառայության</h3>
</div>
<div class="post lh24 txtJ  Hmargin25 Vmargin30 ">



 

Սիրելի հավատացյաներ, Քրիստոս Իր երկրային կյանքի ավարտին պատգամեց. «Սիրեցեք միմյանց»: Ավետարանական այս պատգամն իրական է մեր կյանքում միայն ծառայությամբ և դիմացինի ցավին ու դժվարություններին արձագանքելով:  Ամեն օր մենք ստանում ենք աստվածային հրավերը` ծառայելու մարդկանց: Իսկ ծառայության լավագույն օրինակը տվեց Քրիստոս, Ով եկավ ոչ թե ծառայություն ընդունելու, այլ` ծառայելու: Աստվածային այս հրավերին ընդառաջ, կոչ ենք անում բոլոր ցանկացողներին միանալու մեզ` օգնելու կարիքավորներին, հաշմանդամներին, անտուններին, որբերին ու ծերերին և ծառայությամբ փաստելու, որ Աստված հավատում է մեզ, մենք էլ` գթառատ մեր Տիրոջը:

Ովքեր ցանկանում են արձագանքել «Հրավեր ծառայության» ծրագրին, խնդրում ենք լրացնել հայտը:   

 
<div></div>
<?php echo $this->Form->create('Helpe');?>
	
	<?php
		echo $this->Form->input('name',array('label'=>'Անուն'));
		echo $this->Form->input('last_name',array('label'=>'Ազգանուն'));
		echo $this->Form->input('surname',array('label'=>'Հայրանուն'));
		echo $this->Form->input('email',array('label'=>'Էլ. Հասցե'));
		echo $this->Form->input('home_tell',array('label'=>'Հեռ.', 'type'=>'text'));
		echo $this->Form->input('work_tell',array('label'=>'Աշխ. Հեռ.', 'type'=>'text'));
		echo $this->Form->input('mobile_tell',array('label'=>'Բջջ. Հեռ.', 'type'=>'text'));
		echo $this->Form->input('age',array('label'=>'Ծննդյան օր. Ամիս. Տարի','dateFormat' => 'DMY',
												    'minYear' => date('Y') - 70,
												    'maxYear' => date('Y') - 13,'monthNames' => false ));
		echo $this->Form->input('vichaky',array('label'=>'Ընտանեկան կարգավիճակը','type'=>'text'));?>
		<div class="clear"></div>
		<?php 
		echo $this->Form->input('have_childe',array('label'=>'Եթե կան երեխաներ,նշել անուն/երը/տարիքը '));?>
		<div class="clear"></div>
		<?php 
		echo $this->Form->input('why_help',array('label'=>'Ինչու՞եք որոշել դառնալ կամավոր'));?>
		<div class="clear"></div>
		<div class="bold fs14" > Ու՞մ կցանկանաիք օգնել</div>
		
		<table cellpadding="10px" style="margin-left: -40px;">
			<tr>
				<td class="firsttd">Բոլորին ովքեր օգնության կարիք ունեն</td>
				<td ><?php echo $this->Form->input('help_all',array('type'=>'checkbox','label'=>false));?></td>
				<td >Ծանր հիվանդներին</td>
				<td ><?php echo $this->Form->input('havy_ill',array('type'=>'checkbox','label'=>false));?></td>
			</tr>
			
			<tr>
				<td class="firsttd"> Տարեցների և հաշմանդամների խնամք
					 <br/><sub>(փոքր վերանորոգում, խոհարարություն, մաքրություն)</sub>
				</td>
				<td><?php echo $this->Form->input('help_ald_and_ill',array('type'=>'checkbox','label'=>false));?></td>
				<td>Թեթև հիվանդներին</td>
				<td><?php echo $this->Form->input('litle_ill',array('type'=>'checkbox','label'=>false)); ?></td>
			</tr>
			<tr>
				<td class="firsttd">Հաշմանդամ երեխաներին</td>
				<td><?php echo $this->Form->input('ill_childe',array('type'=>'checkbox','label'=>false));?></td>
				<td>Բազմանդամ ընտանիքներին</td>
				<td><?php echo $this->Form->input('big_family',array('type'=>'checkbox','label'=>false));?></td>
			</tr>
			<tr>
				<td class="firsttd">Նորածիններին` իրենց  տներում</td>
				<td><?php echo $this->Form->input('new_born',array('type'=>'checkbox','label'=>false));?></td>
				<td>Միայնակ մարդկանց</td>
				<td><?php 	echo $this->Form->input('alone_man',array('type'=>'checkbox','label'=>false));?></td>
			</tr>
			<tr>
				<td class="firsttd">Անօթևաններին <br/><sub>
						(ապահովել հագուստով, օգնել վերականգնել փաստաթղթերը, գտնել հարազատներին  և այլն)</sub>
				</td>
				<td><?php 	echo $this->Form->input('have_no_home',array('type'=>'checkbox','label'=>false));
		?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td class="firsttd">Այլ ծառայություններ
				</td>
				<td colspan="3"><?php 	echo $this->Form->input('other_help_1',array('label'=>false));
		?></td>
				
			</tr>
			<tr>
				<td class="firsttd">Եթե ունեք որեւէ սահմանափակումներ առողջության/եթե այո նշեք դրանք
				</td>
				<td colspan="3"><?php echo $this->Form->input('have_helth_probl',array('label'=>false,'type'=>'textarea'));
		?></td>
				
			</tr>
		</table>
		<div class="clear">	</div>
		<div class="bold fs14" > Ի՞նչպիսի օգնություն կարող եք առաջարկել</div>
		<table cellpadding="10px" style="margin-left: -40px;">
			<tr>
				<td  class="firsttd">Մաքրել տունը,լվանալ հատակը,պատուհանները</td>
				<td><?php echo $this->Form->input('clean_home',array('type'=>'checkbox','label'=>false));?></td>
				<td class="firsttd"> Ուղեկցել եկեղեցի ավոտոմեքենայով</td>
				<td ><?php echo $this->Form->input('drive_to_church',array('type'=>'checkbox','label'=>false));?></td>
			</tr>
			
			<tr>
				<td  class="firsttd">Ուտելիք պատրաստել</td>
				<td><?php echo $this->Form->input('cook',array('type'=>'checkbox','label'=>false));?></td>
				<td class="firsttd">Հյուրընկալել / հյուր գնալ` գիրք կարդալ,զրույցել</td>
				<td ><?php echo $this->Form->input('visit',array('type'=>'checkbox','label'=>false));?></td>
			</tr>
			<tr>
				<td  class="firsttd">Գնել սնունդ, հագուստ, դեղորայք</td>
				<td><?php echo $this->Form->input('by_food',array('type'=>'checkbox','label'=>false));?></td>
				<td class="firsttd">Օգնել լրացնել փաստաթղթեր, տեղեկանքներ</td>
				<td><?php echo $this->Form->input('to_write',array('type'=>'checkbox','label'=>false));?></td>
			</tr>
			<tr>
				<td  class="firsttd">Զբոսնել երեխայի հետ, օգնել դասերը սովորել</td>
				<td><?php echo $this->Form->input('walk_with_childe',array('type'=>'checkbox','label'=>false));?></td>
				<td class="firsttd">Քրիստոնեական զրույցներ</td>
				<td ><?php echo $this->Form->input('christian_romance',array('type'=>'checkbox','label'=>false));?></td>
			</tr>
			<tr>
				<td  class="firsttd"> Զբոսնել հիվանդի կամ հաշմանդամի հետ</td>
				<td><?php 	echo $this->Form->input('walk_with_ill',array('type'=>'checkbox','label'=>false)); ?></td>
				<td class="firsttd">Հագուստ բաժանել կարիքավորներին <sub>/մեքենայով կամ  առանց  դրա/</sub></td>
				<td ><?php echo $this->Form->input('clothes_distributed',array('type'=>'checkbox','label'=>false));?></td>
			</tr><tr>
				<td  class="firsttd">Խնամք <br/> <sub>(լողացնել,կտրելեղունգները,փոխել տեղաշորը կամ տակդիրը)</sub></td>
				<td><?php echo $this->Form->input('take_care',array('type'=>'checkbox','label'=>false));?></td>
				<td class="firsttd">Զրուցել հեռախոսով</td>
				<td ><?php 	echo $this->Form->input('talk_by_phone',array('type'=>'checkbox','label'=>false));?></td>
			</tr><tr>
				<td>Պատրաստ եմ օգնել, խնամել,եթե սովորեցնեն ոնց և ինչպես անել</td>
				<td><?php echo $this->Form->input('care_if_teach',array('type'=>'checkbox','label'=>false));?></td>
				<td class="firsttd">Զանգահարել  կամավորներին, օգնել գործակատարներին</td>
				<td ><?php echo $this->Form->input('call_wanthers',array('type'=>'checkbox','label'=>false)); ?></td>
			</tr>
			<tr>
				<td  class="firsttd">Օգնել արարողությունների ժամանակ <br/><sub>(կնունքներ,բարեգործություններ, կատարել զանգեր,ինտերնետային շնորհավորանքներ)</sub> </td>
				<td><?php echo $this->Form->input('help_on_retulgy',array('type'=>'checkbox','label'=>false));?></td>
				<td class="firsttd">Իրավաբանական խորհրդատվություն</td>
				<td ><?php echo $this->Form->input('legal_advice',array('type'=>'checkbox','label'=>false));?></td>
			</tr>
			<tr>
				<td  class="firsttd">Հոգեբանական աջակցություն</td>
				<td><?php echo $this->Form->input('psychological',array('type'=>'checkbox','label'=>''));?></td>
				<td class="firsttd">Ֆինանսական օգնություն</td>
				<td ><?php echo $this->Form->input('financial_aid',array('type'=>'checkbox','label'=>''));?></td>
			</tr>
			<tr>
				<td>Բուժօգնություն</td>
				<td><?php echo $this->Form->input('treatment',array('type'=>'checkbox','label'=>''));?></td>
				<td class="firsttd"></td>
				<td ></td>
			</tr>
			<tr>
				<td>Կատարել փոքրիկ վերանորոգում
				<br/><sub>(նշել  ինչպիսի) 
				</sub></td>
				<td colspan="3"><?php echo $this->Form->input('build_home',array('label'=>''));?></td>
			</tr>
			<tr>
				<td>
					Կարող եմ ինձ փորձել որպես համակարգող, պատասխանատւ լինել եկեղեցական գործունեության յուրաքանչուր  ուղղություններով <br/>  <sub> (նշել   ինչ  ուղղություններով)</sub>
				</td>
				<td colspan="3">
					<?php echo $this->Form->input('church_work',array('label'=>''));?>
				</td>
			</tr>
			<tr>
				<td>
				Տալ մասնագիտական խորհրդատվություն<br/>    <sub>(անհատական, hեռ.-ով, e-mail-ով,  ինտեր.կայքում.  /հստակ նշել ինչպիսի)</sub>
				
				</td>
				<td colspan="3">
					<?php echo $this->Form->input('profecion_advice',array('label'=>''));?>
				</td>
			</tr>
			<tr>
				<td>
				Այլ ծառայություններ
				</td>
				<td colspan="3">
					<?php echo $this->Form->input('other_help',array('label'=>''));?>
				</td>
			</tr>
			
			
			
			
		</table>
		<div class="clear"></div>
		<div class="bold fs14" >  Ի՞նչ պարբերությամբ կարողեք օգնել</div>
		
		<table cellpadding="10px" style="margin-left: -40px;">
			<tr>
				<td style="width: 150px" >
				</td>
				<td style="width: 140px">Աշխատանքային օրեր
				</td>
				<td>Հանգստյան օրեր</td>
			</tr>
			<tr>
				<td style="width: 150px" >
				Ամիսը մեկ անգամ
				</td>
				<td><?php echo $this->Form->input('one_day_month_work',array('label'=>'', 'type'=>'checkbox', 'div'=>array( 'class'=>'HmarginA input checkbox')));?></td>
				<td> <?php echo $this->Form->input('one_day_month_holy',array('label'=>'','type'=>'checkbox', 'div'=>array( 'class'=>'HmarginA input checkbox')));?></td>
			</tr>
			<tr>
				<td style="width: 150px" >
				Ամիսը երկու անգամ
				</td>
				<td><?php 	echo $this->Form->input('two_day_month_work',array('label'=>'','type'=>'checkbox', 'div'=>array( 'class'=>'HmarginA input checkbox')));?></td>
				<td><?php echo $this->Form->input('two_day_month_holy',array('label'=>'','type'=>'checkbox', 'div'=>array( 'class'=>'HmarginA input checkbox')));?></td>
			</tr>
			<tr>
				<td style="width: 150px" >
				Շաբաթը մեկ օր /նշել օրը/ 
				</td>
				<td><?php echo $this->Form->input('one_day_week_work',array('label'=>'','type'=>'text'));?></td>
				<td><?php echo $this->Form->input('one_day_week_holy',array('label'=>'','type'=>'checkbox','div'=>array( 'class'=>'HmarginA input checkbox')));?></td>
			</tr>
			<tr>
				<td style="width: 150px" >
				Շաբաթը մեկ օրից ավել /նշել որ օրերը/ 
				</td>
				<td><?php echo $this->Form->input('many_day_week_work',array('label'=>'','type'=>'text'));?></td>
				<td><?php echo $this->Form->input('many_day_week_holy',array('label'=>'','type'=>'checkbox','div'=>array( 'class'=>'HmarginA input checkbox')));?></td>
			</tr>
			<tr>
				<td  style="width: 150px">
				Ամեն օր
				</td>
				<td><?php echo $this->Form->input('every_day_work',array('label'=>'','type'=>'checkbox', 'div'=>array( 'class'=>'HmarginA input checkbox')));?></td>
				<td><?php echo $this->Form->input('every_day_holy',array('label'=>'','type'=>'checkbox', 'div'=>array( 'class'=>'HmarginA input checkbox')));?></td>
			</tr>
			<tr>
				<td style="width: 150px" >
				Դուք կարո՞ղ եք օգնել աշխատանքային օրերին` ցերեկը
				</td>
				<td colspan="1"><?php echo $this->Form->input('help_every_afternoon',array('label'=>'','type'=>'checkbox', 'div'=>array( 'class'=>'HmarginA input checkbox')));?></td>
				<td></td>
			</tr>
			<tr>
				<td style="width: 150px" >
				Մկրտվա՞ծ եք (եթե այո նշել որ եկեղեցում)
				</td>
				<td colspan="2"><?php 	echo $this->Form->input('holy_born',array('label'=>'','type'=>'text'));?></td>
				
			</tr>
		</table>

<?php
		echo $this->Form->submit(__('Ուղարկել հայտը'),array('class'=>'button Lmargin150 Bmargin20','label'=>'  ')); 
		echo $this->Form->end();?>
		<div class="clear"></div> <div class="clear"></div> <div class="clear"></div> 
		Ձեր նշած տվյալները  (Էլեկտրոնային հասցեն, անունը ...)  չեն հրապարակվի:<div class="clear"></div> Դուք կարող եք հայտը լրացնել նաև բեռնելով հարցաթերթը և ուղարկել մեր Էլ. Հասցեին <span class="C1"> info@holytrinity.am </span>:  
		<?php echo $this->Html->link('Բեռնել','/media/harc.doc',array('escape'=>false,'title'=>'Հարցաթերթ','target'=>'_blank'));?>
		<div class="clear"></div>
		<div class="floatL W200 Tmargin10"><?php  echo $this->element('share');?></div>
</div>

