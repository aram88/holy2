/**
 * 
 */
$(document).ready(function(){
		$('#aUp').click(function(){
			if ($('#fileToUpload').val()==''){
				alert('Դուք պետք է ընտրեք մեդիան');
			}
			else {
				$("#fileToUpload").parent('div').addClass('displayN');
				$(".upload img").removeClass('displayN');
				$(this).addClass('displayN');
				  $.ajaxFileUpload({
					   url: WEB_ROOT + 'utils/saveMedia',
					   secureuri:false,
					   fileElementId:'fileToUpload',
					   dataType: 'json',
					   success: function (data, status){
						   if(typeof(data.error) != 'undefined')
		                   {
		                       if(data.error != '')
		                       {
		                    	   alert(data.error);
		                    	   $("#upload").addClass('displayN') ;  
		                    	   
		                       } else {
		                    	   $(".upload img").addClass('displayN') ;
		                    	   $(".upload").html("<div class='image Bmargin20 txtC  Hmargin20 green'> Մեդիան հաջողութկամբ բեռնվեց սերվեռ </div>");
		                    	   $("#MediaPath").val(data.msg);
		                    	   $('form').submit();
		                    	   
		                       }
		                   }   
					   },
					   error: function (data, status, e){
						   $("#upload").addClass('displayN') ;  
						   alert(e);
					   }
					  });
			}
		});
});