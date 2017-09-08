/**
 * 
 */
	$(document).ready(function() {
	
		$(".parmenu").change(function() {
			var options = "<option value=''>--------</option>";
			var stateVal = $(this).val();
			var id = $(this).attr('id');
			$.post(
			SERVER_URL + "utils/getSubmenus",
			{ menu_id:stateVal },
				function(data) {
				var submenus = eval(data);				
					for(x in submenus) {
						options += "<option value='" + submenus[x]['id'] + "'>" + submenus[x]['name'] + "</option>";
					}
					;
					
					$("#"+id+"").html(options);
				}
			);
		});
		$("a.parent").live("click", function() {
			var options = "<option value=''>--------</option>";
			var stateVal = 1;
			var id = $(this).attr('id');
			$('.parhid').each(function(){$(this).val('');});
			$("a.parent").each(function(){$(this).remove();} );
			$.post(
			SERVER_URL + "utils/getParents",
			{ menu_id:stateVal },
				function(data) {
				var submenus = eval(data);				
					for(x in submenus) {
						options += "<option value='" + submenus[x]['id'] + "'>" + submenus[x]['name'] + "</option>";
					}
					$(".parmenu").each(function(){$(this).html(options)});
				}
			);
		});
		$(".parmenu").change(function(){
			var id = $(this).attr('id');
			var text = $("#"+id+" option[value="+$(this).val()+"]").text();
			var id2= id.split('PostMenuId');
			$("#MenuParent"+id2['1']+"").val($(this).val());
			$(this).before("<a class='C1 parent'>"+text+" > </a>");
		});
		
	});