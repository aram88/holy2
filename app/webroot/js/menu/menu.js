/**
 * 
 */
	$(document).ready(function() {
		$("#MenuMenuId").change(function() {
			var options = "<option value=''>--------</option>";
			var stateVal = $(this).val();
			$.post(
			SERVER_URL + "utils/getSubmenus",
			{ menu_id:stateVal },
				function(data) {
				var submenus = eval(data);				
					for(x in submenus) {
						options += "<option value='" + submenus[x]['id'] + "'>" + submenus[x]['name'] + "</option>";
					}
					$("#MenuMenuId").html(options);
				}
			);
		});
		$("a.parent").live("click", function() {
			var options = "<option value=''>--------</option>";
			var stateVal = $(this).attr('index');
			$("a.parent").each(function(){$(this).remove();} )
			$.post(
			SERVER_URL + "utils/getParents",
			{ menu_id:stateVal },
				function(data) {
				var submenus = eval(data);				
					for(x in submenus) {
						options += "<option value='" + submenus[x]['id'] + "'>" + submenus[x]['name'] + "</option>";
					}
					$("#MenuMenuId").html(options);
				}
			);
		});
		$("#MenuMenuId").change(function(){
			var text = $("#MenuMenuId option[value="+$(this).val()+"]").text();
			var id = $(this).attr("value");
			$('#MenuParent').val($(this).val());
			$(".menu_path").append("<a  class='C1 parent' index='"+id+"'>"+text+" > </a>");
			$(".menu_path").removeClass('displayN');
		})
	});