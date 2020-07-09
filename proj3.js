$(document).ready(function()
{
	//checks if the user clicks the create trainer button, and hides the menu and brings up a chat window
	$("#create").on("click", function() 
	{
    	$(".center").show();
    	$("#create").hide();
    	$("#choose").hide();
    	$("#train").hide();
    	$("#fight").hide();
    	$("#controls").hide();
    	$("#exit").hide();
    	$("#select").hide();
    });
/*
	//checks the submit name form
	$("#submit").click(function()
	{
		$("#introText").hide();
		$("#form").hide();
		$("#afterName").show();
		$("#continue").show();
	});

	//checks if the user clicked continue
	$("#continue").on("click", function() 
	{
		$("#continue").hide();
		$("#afterName").hide();
		$("#oak").hide();
		$("#selectPokemon").show();
		$(".bulbasaur").show();
		$(".charmander").show();
		$(".squirtle").show();
	});*/
});
/*
//checks to see if the user submitted their name, will then bring up the prompt of what starter they want to choose
function nameSubmit()
{
	$(document).ready(function()
	{
		$("#introText").hide();
		$("#form").hide();
		$("#afterName").show();
		$("#continue").show();

		//checks if the user clicked continue
		$("#continue").on("click", function() 
		{
			$("#continue").hide();
			$("#afterName").hide();
			$("#oak").hide();
			$("#selectPokemon").show();
			$(".bulbasaur").show();
			$(".charmander").show();
			$(".squirtle").show();
			return false;
		});
	});
	return false;
}*/