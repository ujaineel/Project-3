$(document).ready(function()
{
	$("#create").on("click", function() 
	{
    	$(".center").show();
    	$("#create").hide();
    	$("#train").hide();
    	$("#fight").hide();
    	$("#controls").hide();
    	$("#exit").hide();
	});

	$("#close").on("click", function() 
	{
    	$(".center").hide();
    	$("#create").show();
    	$("#train").show();
    	$("#fight").show();
    	$("#controls").show();
    	$("#exit").show();
	});
});