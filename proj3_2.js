$(document).ready(function()
{
	$(".center").hide();
	$("#choose").show();
	$("#create").show();

	//checks if the user clicked on create trainer
	$("#create").on("click", function()
	{
		$(".center").show();
		$("#oak").show();
		$("#dupeTrainer").show();
		$("#close").show();
		$("#create").hide();
		$("#choose").hide();
		$("#train").hide();
		$("#fight").hide();
		$("#controls").hide();
		$("#exit").hide();
		$("#starterSubmit").hide();
		$("#style").hide();
		$("#oakText").hide();
		$("#select").hide();
	});

	//checks if the user clicked the close button on the prompt
	$("#close").on("click", function()
	{
		$(".center").hide();
		$("#oak").hide();
		$("#dupeTrainer").hide();
		$("#close").hide();
		$("#create").show();
		$("#choose").show();
	});

	$("#choose").on("click", function() 
	{
		$("#oak").show();
		$(".center").show();
		$("#choose").hide();
		$("#create").hide();
		$("#select").hide();
		$("#starterSubmit").hide();
		$("#style").hide();
		$("#afterName").show();
		$("#continue").show();
	});

	$("#continue").on("click", function()
	{
		$("#afterName").hide();
		$("#oakText").show();
		$("#continue").hide();
		$("#select").show();
		$(".bulbasaur").show();
		$(".charmander").show();
		$(".squirtle").show();
		$("#starterSubmit").show();
		$("#style").show();

		//changes the border based on what choice the user is currently on
		$("#style").change(function()
		{
			pokemon = $(this).children("option:selected").val();
			var pokemonLowerCase = pokemon.toLowerCase();

			//check if bulbasaur
			if(pokemonLowerCase == "bulbasaur")
			{
				$(".charmander").removeClass("Charmander");
				$(".squirtle").removeClass("Squirtle");
				$("."+pokemonLowerCase).addClass(pokemon);
			}

			//check if charmander
			if(pokemonLowerCase == "charmander")
			{
				$(".bulbasaur").removeClass("Bulbasaur");
				$(".squirtle").removeClass("Squirtle");
				$("."+pokemonLowerCase).toggleClass(pokemon);
			}

			//check if squirtle
			if(pokemonLowerCase == "squirtle")
			{
				$(".bulbasaur").removeClass("Bulbasaur");
				$(".charmander").removeClass("Charmander");
				$("."+pokemonLowerCase).toggleClass(pokemon);
			}
		});
	});
});

