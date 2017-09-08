/**
 * 
 */
$(document).ready(function(){
	$(".menu  ").hover(function(){
		$(this).children().children().slideDown('fast');
	},
	function(){
		$(this).children().children().slideUp('fast');
	});
			$(".topmenu ").hover(function(){
				$(this).children(".topmenus").show();
				$(this).css({'background': '#660011'});
			},
			function(){
				$(this).children(".topmenus").hide();
				$(this).css({'background': 'none'});
			});
			$(".li2").hover(function(){
				$(this).css({'background': '#770011'});
			},
			function(){
				$(this).css({'background': '#660011'});
			});
			
});
$(document).ready(function (){
	$('.time12').datepicker({
		numberOfMonths: 1,
		timeOnlyTitle: 'Ընտրեք ժամը',
		timeText: 'Ժամը',
		hourText: 'Ժամ',
		minuteText: 'Րոպ',
		secondText: 'Վարկյանները',
		currentText: 'Հիմա',
		closeText: 'Փակել',
		prevText: '<Նախորդը',
		nextText: 'Հաջորդւժը>',
		currentText: 'Այսօր',
		monthNames: ['Հունվար','Փետրվար','Մարտ','Ապրիլ','Մայիս','Հունիս',
		'Հուլիս','Օգոստոս','Սեպտեմբեր','Հոկտեմբեր','Նոյեմբեր','Դեկտեմբեր'],
		monthNamesShort: ['Հուն','Փետ','Մար','Ապր','Մայ','Հուն',
		'Հուլ','Օգս','Սեպ','Հոկ','Նոյ','դեկ'],
		dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
		dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
		dayNamesMin: ['Կիր','Երկ','Երք','Չրք','Հնգ','Ուրբ','Շբթ'],
		weekHeader: 'Не',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		 minDate: new Date(2012, 7, 14, 8, 30),
         maxDate: new Date(),
		isRTL: false,
		showMonthAfterYear: false,
		 onSelect: function (dateText, inst) {
             var url = SERVER_URL + 'generals/view/DATE';
             url = url.replace("DATE", dateText);
             window.location = url;

         },
		yearSuffix: ''
	});
	$('.time12').focus();
	
})