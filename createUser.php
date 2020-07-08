<?php
require_once "pdo.php";

if(isset($_POST["name"]))
{
    $name = $_POST["name"];
    try
    {
        $pdo->beginTransaction();
        $sql = "INSERT INTO trainer (name)
                VALUES (:name)";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':name', $_POST["name"]);
        $statement->execute();

        $name = $_POST["name"];

        $dexNum = rand(1,151);
        $last_id = $pdo->lastInsertId();

        $sql = "INSERT INTO hasteam (TrainerNo, DexNum)
                VALUES (:trainernum, :dexnum)";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':trainernum', $last_id);
        $statement->bindValue(':dexnum', $dexNum);
        $statement->execute();

        $pdo->commit();
    }
    catch(PDOException $e)
    {
        die($e->getMessage());
    }

    $connString = null;
    $pdo = null;
}
header("location:proj3.html");
?>