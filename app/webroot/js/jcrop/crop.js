/**
 * 
 */
$(document).ready(function() {
	  $('#cropbox').Jcrop({
				onSelect: updateCoords,
				setSelect: [ 10, 10, 100, 100 ],
				boxWidth: 450, boxHeight: 450
			});
		$("#fileToUpload").live('change', function() {
			 $("#upload").removeClass('displayN') ;
			 $(".image").remove();
			  $.ajaxFileUpload({
			   url: WEB_ROOT + 'utils/getImagepath',
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
                    	   $("#upload").addClass('displayN') ;
                    	   $(".upload").before("<div class='image Bmargin20 txtC  Hmargin20'><img id='cropbox' src='"+WEB_ROOT + "img/upload/" + data.msg+"' /> </div>");
                    	   $("#path").val(data.msg);
                    	   $('#cropbox').Jcrop({
       						onSelect: updateCoords,
       						setSelect: [ 10, 10, 100, 100 ],
       						boxWidth: 450, boxHeight: 450
       					});
                    	   
                       }
                   }   
			   },
			   error: function (data, status, e){
				   $("#upload").addClass('displayN') ;  
				   alert(e);
			   }
			  });
		});
		
				function updateCoords(c)
				{
					$('#x').val(c.x);
					$('#y').val(c.y);
					$('#w').val(c.w);
					$('#h').val(c.h);
				};
				function checkCoords()
				{
					if (parseInt($('#w').val())) return true;
				};
});		