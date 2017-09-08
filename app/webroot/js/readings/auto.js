$(document).ready(function(){
	
	$("#ReadingSearch").autocomplete({
				 	source: SERVER_URL + "readings/autocomplite",
				    minLength: 1
				   
			    });
	$("#ReadingRead").autocomplete({
	 	source: SERVER_URL + "readings/autocomplete",
	    minLength: 1
	   
    });
		 $(' #ReadingSearchForm').submit(function(){
				 var stateVal = $("#ReadingSearch").val();
				 var read1 = $("#ReadingRead").val();
				 var options="" ;
					var id = $(this).attr('id');
					$.post(
					SERVER_URL + "readings/search",
					{ name:stateVal,read1:read1},
						function(data) {
						
						var submenus = eval(data);				
							for(x in submenus) {
								options += "<div class='floatL Rmargin10'>" + submenus[x]['name'] + "</div>"
							}
							$("#cont").html(options);
							if (options){
								alert('Արդյունքները գտնված են');
								$("#DayOldDay").val(submenus['0']['id']);
								$("#form").show();
							}else{
								alert('Այսպիսի արդյունք գոյություն չունի');
								$("#DayOldDay").val(0);
								$("#form").hide();
							}
						}
					);
				 return false;
			 });

});

		 