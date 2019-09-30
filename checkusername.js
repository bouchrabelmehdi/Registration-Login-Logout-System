function checkusername(val)
{
	$.ajax({
		type:"POST",
		url:"checkuser.php",
		data:'username='+val,
			success: function(data){
				$("#msg").html(data);
			}
	});		
}
