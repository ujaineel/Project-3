<?php
include "pdo.php";

try
{
	//Get trainer_id
	$sql = $pdo->prepare("SELECT MAX(TrainerNo) as max FROM trainer");
	$sql->execute();
	$trainerid = $sql->fetchColumn(); 

	//Retrieve pokemon 
	$sql = $pdo->prepare("SELECT Level, Name, DexNum, ID FROM trainer t
                    INNER JOIN hasteam h ON t.TrainerNo=h.TrainerNo
                    NATURAL JOIN pokemon WHERE h.TrainerNo=?");
	$sql->execute([$trainerid]);
	$rows = $sql->fetchAll(PDO::FETCH_ASSOC);
}
//Catch database timeout exception
catch(PDOException $e)
{
    die($e->getMessage());
}

$connString = null;
$pdo = null;

echo "<select name='currentPokemon'>";
foreach ($rows as $row){
	$dexNum = $row["DexNum"];
	$name = $row["Name"];
	$ID = $row["ID"];
    $field = "Level: " . $row["Level"] . " " . $row["Name"];
	echo "<option value='$ID'>$field</option>";
}
echo "</select>";

//$randomChance = rand(1,1);
$randomIncrease = rand(1,5);

if(isset($_POST["thanksOak"])){
	$stat = $_POST["berries"];
	$updateID = $_POST["currentPokemon"];
	$cur = "Cur";
	$cur .= $stat;
	echo '<script>console.log("weoutchear")</script>';
	$sql = $pdo->prepare("SELECT ? FROM hasteam WHERE ID=?");
	$sql->execute([$cur, $updateID]);
	$pokemonStat = $sql->fetchColumn();
	$pokemonStat+=$randomIncrease;

	$sql = $pdo->prepare("UPDATE hasteam SET ?=? WHERE ID=?");
	$sql->execute([$cur, $pokemonStat, $updateID]);
}
?>
