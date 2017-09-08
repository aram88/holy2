/**
 * 
 */
$(document).ready(function (){
	$('.time').datetimepicker({
		numberOfMonths: 3,
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
		dateFormat: 'dd.mm.yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	});
})