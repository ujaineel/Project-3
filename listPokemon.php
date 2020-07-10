<?php
require_once "pdo.php";
try
{
	//Get trainer_id
	$sql = $pdo->prepare("SELECT MAX(TrainerNo) as max FROM trainer");
	$sql->execute();
	$trainerid = $sql->fetchColumn(); 

	//Retrieve pokemon 
	$sql = $pdo->prepare("SELECT Level, Name  FROM trainer t
                    INNER JOIN hasteam h ON t.TrainerNo=h.TrainerNo
                    INNER JOIN pokemon p ON h.DexNum=p.DexNum WHERE h.TrainerNo=?");
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
?>

<!DOCTYPE HTML>
<html>
<body>
<select name="currentPokemon">
<?php
foreach ($rows as $row ){
    $field = "Level: " . $row["Level"] . " " . $row["Name"];
    echo "<option value = '$field'>$field</option>";
}
?>
</body>
</html>