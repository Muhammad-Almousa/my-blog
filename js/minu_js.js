$(document).ready( function() {

	$(function(){
		$("#comments").ajaxForm({
	      beforeSend:function(){ 
		   $("#com_resu").html("<img src='images/mmm.gif' width='30px'/>");
		   },success:function(data){
			     $("#com_resu").html(data); 
		   }
	   });
	});
	

});