/**
 * 
 */
$(document).ready(function (){
		 $("#PostSearch").autocomplete({
			 	source: SERVER_URL + "posts/autocomplete",
			    minLength: 1
			   
		    }); 
		 $('#PostSearchForm').submit(function(){
			 var stateVal = $("#PostSearch").val();
			 var options="" ;
				var id = $(this).attr('id');
				$.post(
				SERVER_URL + "posts/search",
				{ name:stateVal },
					function(data) {
					var submenus = eval(data);				
						for(x in submenus) {
							options += "<div class='Vmargin20 clear'><div class='floatL Rmargin50 W400 txtL'>Նյութի անունը</div><div class='floatL  txtL W400'>Գործողություններ</div><div class='clear'></div> <div class='floatL  Rmargin40 txtL W400 Tmargin20'>" + submenus[x]['name'] + "</div> <div class='floatL  W400 txtL Tmargin20'> <a href='"+SERVER_URL+"/posts/view/"+submenus[x]['id']+"'class='C1 padding10'>Դիտել<a href='"+SERVER_URL+"/posts/edit/"+submenus[x]['id']+"'class='C1'>Փոփոել</div><div class='clear'></div>"
						}
						$("table").before(options);
					}
				);
			 return false;
		 });
		 
		 $("#MenuSearch").autocomplete({
			 	source: SERVER_URL + "menus/autocomplete",
			    minLength: 1
			   
		    }); 
		 $(' #MenuSearchForm').submit(function(){
			 var stateVal = $("#MenuSearch").val();
			 var options="" ;
				var id = $(this).attr('id');
				$.post(
				SERVER_URL + "menus/search",
				{ name:stateVal },
					function(data) {
					var submenus = eval(data);				
						for(x in submenus) {
							options += "<div class='Vmargin20 clear'><div class='floatL Rmargin50 W400 txtL'>Մենյուի անունը</div><div class='floatL  txtL W400'>Գործողություններ</div><div class='clear'></div> <div class='floatL  Rmargin40 txtL W400 Tmargin20'>" + submenus[x]['name'] + "</div> <div class='floatL  W400 txtL Tmargin20'> <a href='"+SERVER_URL+"/menus/view/"+submenus[x]['id']+"'class='C1 padding10'>Դիտել</a><a href='"+SERVER_URL+"/menus/edit/"+submenus[x]['id']+"'class='C1'>Փոփոել</a> <a href='"+SERVER_URL+"/menus/adminview/"+submenus[x]['id']+"'class='C1'>Դիտել նյութերը</a></div><div class='clear'></div>"
						}
						$("table").before(options);
					}
				);
			 return false;
		 });
		 

		}
	)