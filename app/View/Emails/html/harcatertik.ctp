<?php $yesNo = array('0'=>'Ոչ','1'=>'Այո');?>

<?php if(isset($data)){?>
<table >
	<tr>
		<td>Անուն</td>
		<td><?php echo $data['name']; ?></td>
	</tr>
	<tr>
		<td>Ազգանուն</td>
		<td><?php echo $data['last_name']; ?></td>
	</tr>
	<tr>
		<td>Հայրանուն</td>
		<td><?php echo $data['surname']; ?></td>
	</tr>
	<tr>
		<td>Էլ. Հասցե</td>
		<td><?php echo $data['email']; ?></td>
	</tr>
	<tr>
		<td>Հեռ.</td>
		<td><?php echo $data['home_tell']; ?></td>
	</tr>
	<tr>
		<td>Աշխ. Հեռ</td>
		<td><?php echo $data['work_tell']; ?></td>
	</tr>
	<tr>
		<td>Բջջ. Հեռ.</td>
		<td><?php echo $data['mobile_tell']; ?></td>
	</tr>
	<tr>
		<td>Ծննդյան օր. Ամիս. Տարի</td>
		<td><?php echo date("d.m.Y ", strtotime($data['age']))?></td>
	</tr>
	<tr>
		<td>Ընտանեկան կարգավիճակը</td>
		<td><?php echo $data['vichaky']; ?></td>
	</tr>
	<tr>
		<td>Եթե կան երեխաներ,նշել անուն/երը/տարիքը</td>
		<td><?php echo $data['have_childe']; ?></td>
	</tr>
	<tr>
		<td>Ինչու՞եք որոշել դառնալ կամավոր</td>
		<td><?php echo $data['why_help']; ?></td>
	</tr>
	
</table>	
	
		<br/>
		<div style = "font-weight: 700"> Ու՞մ կցանկանաիք օգնել</div>
		
		<table cellpadding="10px" >
			<tr>
				<td class="firsttd">Բոլորին ովքեր օգնության կարիք ունեն</td>
				<td ><?php echo $yesNo[$data['help_all']];?></td>
				<td >Ծանր հիվանդներին</td>
				<td ><?php echo $yesNo[$data['havy_ill']];?></td>
			</tr>
			
			<tr>
				<td class="firsttd"> Տարեցների և հաշմանդամների խնամք
					 <br/><sub>(փոքր վերանորոգում, խոհարարություն, մաքրություն)</sub>
				</td>
				<td><?php echo $yesNo[$data['help_ald_and_ill']];?></td>
				<td>Թեթև հիվանդներին</td>
				<td><?php echo $yesNo[$data['litle_ill']]; ?></td>
			</tr>
			<tr>
				<td class="firsttd">Հաշմանդամ երեխաներին</td>
				<td><?php echo $yesNo[$data['ill_childe']];?></td>
				<td>Բազմանդամ ընտանիքներին</td>
				<td><?php echo $yesNo[$data['big_family']];?></td>
			</tr>
			<tr>
				<td class="firsttd">Նորածիններին` իրենց  տներում</td>
				<td><?php echo $yesNo[$data['new_born']];?></td>
				<td>Միայնակ մարդկանց</td>
				<td><?php 	echo $yesNo[$data['alone_man']];?></td>
			</tr>
			<tr>
				<td class="firsttd">Անօթևաններին <br/><sub>
						(ապահովել հագուստով, օգնել վերականգնել փաստաթղթերը, գտնել հարազատներին  և այլն)</sub>
				</td>
				<td><?php 	echo  $yesNo[$data['have_no_home']];?></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td class="firsttd">Այլ ծառայություններ
				</td>
				<td colspan="3"><?php 	echo $data['other_help_1'];?></td>
				
			</tr>
			<tr>
				<td class="firsttd">Եթե ունեք որեւէ սահմանափակումներ առողջության/եթե այո նշեք դրանք
				</td>
				<td colspan="3"><?php echo $data['have_helth_probl'];?></td>
				
			</tr>
		</table>
		<div class="clear">	</div>
		<div class="bold fs14" style = "font-weight: 700" > Ի՞նչպիսի օգնություն կարող եք առաջարկել</div>
		<table cellpadding="10px" >
			<tr>
				<td  class="firsttd">Մաքրել տունը,լվանալ հատակը,պատուհանները</td>
				<td><?php echo $yesNo[$data['clean_home']];?></td>
				<td class="firsttd"> Ուղեկցել եկեղեցի ավոտոմեքենայով</td>
				<td ><?php echo $yesNo[$data['drive_to_church']];?></td>
			</tr>
			
			<tr>
				<td  class="firsttd">Ուտելիք պատրաստել</td>
				<td><?php echo $yesNo[$data['cook']];?></td>
				<td class="firsttd">Հյուրնկալել / հյուր գնալ` գիրք կարդալ,զրույցել</td>
				<td ><?php echo $yesNo[$data['visit']];?></td>
			</tr>
			<tr>
				<td  class="firsttd">Գնել սնունդ, հագուստ, դեղորայք</td>
				<td><?php echo $yesNo[$data['by_food']];?></td>
				<td class="firsttd">Օգնել լրացնել փաստաթղթեր, տեղեկանքներ</td>
				<td><?php echo $yesNo[$data['to_write']];?></td>
			</tr>
			<tr>
				<td  class="firsttd">Զբոսնել երեխայի հետ, օգնել դասերը սովորել</td>
				<td><?php echo $yesNo[$data['walk_with_childe']];?></td>
				<td class="firsttd">Քրիստոնեական զրույցներ</td>
				<td ><?php echo $yesNo[$data['christian_romance']];?></td>
			</tr>
			<tr>
				<td  class="firsttd"> Զբոսնել հիվանդի կամ հաշմանդամի հետ</td>
				<td><?php 	echo $yesNo[$data['walk_with_ill']];?></td>
				<td class="firsttd">Հագուստ բաժանել կարիքավորներին <sub>/մեքենայով կամ  առանց  դրա/</sub></td>
				<td ><?php echo $yesNo[$data['clothes_distributed']];?></td>
			</tr><tr>
				<td  class="firsttd">Խնամք <br/> <sub>(լողացնել,կտրելեղունգները,փոխել տեղաշորը կամ տակդիրը)</sub></td>
				<td><?php echo $yesNo[$data['take_care']];?></td>
				<td class="firsttd">Զրուցել հեռախոսով</td>
				<td ><?php 	echo $yesNo[$data['talk_by_phone']];?></td>
			</tr><tr>
				<td>Պատրաստ եմ օգնել, խնամել,եթե սովորեցնեն ոնց և ինչպես անել</td>
				<td><?php echo  $yesNo[$data['care_if_teach']];?></td>
				<td class="firsttd">Զանգահարել  կամավորներին, օգնել գործակատարներին</td>
				<td ><?php echo $yesNo[$data['call_wanthers']]; ?></td>
			</tr>
			<tr>
				<td  class="firsttd">Օգնել արարողությունների ժամանակ <br/><sub>(կնունքներ,բարեգործություններ, կատարել զանգեր,ինտերնետային շնորհավորանքներ)</sub> </td>
				<td><?php echo $yesNo[$data['help_on_retulgy']];?></td>
				<td class="firsttd">Իրավաբանական խորհրդատվություն</td>
				<td ><?php echo $yesNo[$data['legal_advice']];?></td>
			</tr>
			<tr>
				<td  class="firsttd">Հոգեբանական աջակցություն</td>
				<td><?php echo $yesNo[$data['psychological']];?></td>
				<td class="firsttd">Ֆինանսական օգնություն</td>
				<td ><?php echo $yesNo[$data['financial_aid']];?></td>
			</tr>
			<tr>
				<td>Բուժօգնություն</td>
				<td><?php echo $yesNo[$data['treatment']];?></td>
				<td class="firsttd"></td>
				<td ></td>
			</tr>
			<tr>
				<td>Կատարել փոքրիկ վերանորոգում
				<br/><sub>(նշել  ինչպիսի) 
				</sub></td>
				<td colspan="3"><?php echo $data['build_home'];?></td>
			</tr>
			<tr>
				<td>
					Կարող եմ ինձ փորձել որպես համակարգող, պատասխանատւ լինել եկեղեցական գործունեության յուրաքանչուր  ուղղություններով <br/>  <sub> (նշել   ինչ  ուղղություններով)</sub>
				</td>
				<td colspan="3">
					<?php echo $data['church_work'];?>
				</td>
			</tr>
			<tr>
				<td>
				Տալ մասնագիտական խորհրդատվություն<br/>    <sub>(անհատական, hեռ.-ով, e-mail-ով,  ինտեր.կայքում.  /հստակ նշել ինչպիսի)</sub>
				
				</td>
				<td colspan="3">
					<?php echo $data['profecion_advice'];?>
				</td>
			</tr>
			<tr>
				<td>
				Այլ ծառայություններ
				</td>
				<td colspan="3">
					<?php echo $data['other_help'];?>
				</td>
			</tr>
			
			
			
			
		</table>
		<div class="clear"></div>
		<div class="bold fs14" style = "font-weight: 700" >  Ի՞նչ պարբերությամբ կարողեք օգնել</div>
		
		<table cellpadding="10px" >
			<tr>
				<td style="width: 150px" >
				</td>
				<td>Աշխատանքային օրեր
				</td>
				<td>Հանգստյան օրեր</td>
			</tr>
			<tr>
				<td style="width: 150px" >
				Ամիսը մեկ անգամ
				</td>
				<td><?php echo $yesNo[$data['one_day_month_work']];?></td>
				<td> <?php echo $yesNo[$data['one_day_month_holy']];?></td>
			</tr>
			<tr>
				<td style="width: 150px" >
				Ամիսը երկու անգամ
				</td>
				<td><?php echo $yesNo[$data['two_day_month_work']];?></td>
				<td><?php echo $yesNo[$data['two_day_month_holy']];?></td>
			</tr>
			<tr>
				<td style="width: 150px" >
				Շաբաթը մեկ օր /նշել օրը/ 
				</td>
				<td><?php echo $data['one_day_week_work'];?></td>
				<td><?php echo $yesNo[$data['one_day_week_holy']];?></td>
			</tr>
			<tr>
				<td style="width: 150px" >
				Շաբաթը մեկ օրից ավել /նշել որ օրերը/ 
				</td>
				<td><?php echo $data['many_day_week_work'];?></td>
				<td><?php echo $yesNo[$data['many_day_week_holy']];?></td>
			</tr>
			<tr>
				<td  style="width: 150px">
				Ամեն օր
				</td>
				<td><?php echo $yesNo[$data['every_day_work']];?></td>
				<td><?php echo $yesNo[$data['every_day_holy']];?></td>
			</tr>
			<tr>
				<td style="width: 150px" >
				Դուք կարո՞ղ եք օգնել աշխատանքային օրերին` ցերեկը
				</td>
				<td colspan="1"><?php echo $yesNo[$data['help_every_afternoon']];?></td>
				<td></td>
			</tr>
			<tr>
				<td style="width: 150px" >
				Մկրտվա՞ծ եք (եթե այո նշել որ եկեղեցում)
				</td>
				<td colspan="2"><?php 	echo $data['holy_born'];?></td>
				
			</tr>
		</table>
<?php } else {echo "Սխալմունք է տեղի ունեցել";}?>