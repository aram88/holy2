/**
 * 
 */

$(document).ready(function() {
	 $("a.fancybox").each(function(){
        $(this).attr('href',$(this).children().attr('src'));
       });
	 $(".fancybox").fancybox({
			prevEffect		: 'none',
			nextEffect		: 'none',
			closeBtn		: false,
			helpers		: {
				title	: { type : 'inside' },
				buttons	: {}
			}
		});
});