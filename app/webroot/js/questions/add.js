/**
 * 
 */

	$(document).ready(function() {
		
		$(".question").click(function() {
			var stateVal = $(this).attr('id');
			var options="" ;
			if($(this).next('input').val()== 0){
				$.post(
						SERVER_URL + "utils/getQuestions",
						{ menu_id:stateVal },
							function(data) {
							var submenus = eval(data);	
							options += "<div class='question displayN'>";
								for(x in submenus) {
									options += "<div class='clear'></div><div class='margin15 Lmargin50'> <a class='C1' href='"+SERVER_URL+"/questions/show/"+ submenus[x]['id'] +" '>"+submenus[x]['name']+"</a></div>"
								}
								;
								options += "</div>";
								$("#"+stateVal+"").after(options);
								$("#"+stateVal+"").next("input").val('1');
								$("#"+stateVal+"").next('div.question').toggle(700);
								
							}
						);
			}else {
				$(this).next('div.question').toggle(700);
			}
		});
});