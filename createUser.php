<?php
require_once "pdo.php";

if(isset($_POST["name"]))
{
    try
    {
        $pdo->beginTransaction();
        $sql = "INSERT INTO trainer (name)
                VALUES (:name)";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':name', $_POST["name"]);
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

header("location:proj3_2.html");
?>