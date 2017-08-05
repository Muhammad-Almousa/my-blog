$(document).ready( function() {
	
$(function(){
		$("#update_user").ajaxForm({
	      beforeSend:function(){ 
		   $("#up_result").html("<img src='images/mmm.gif' width='30px'/>");
		   },success:function(data){
			     $("#up_result").html(data); 
		   }
	   });
	});
});