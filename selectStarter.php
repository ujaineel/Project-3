<?php
require_once "pdo.php";

if(isset($_POST["starter"]))
{
    try
    {
        $pdo->beginTransaction();

        //Get last_id
        $sql = $pdo->prepare("SELECT MAX(TrainerNo) as max FROM trainer");
        $sql->execute();
        $trainerid = $sql->fetchColumn();

        switch($_POST["starter"] )
        {
            case "Bulbasaur" :
                $dexNum = 1;
                break;
            case "Charmander" :
                $dexNum = 4;
                break;
            case "Squirtle" :
                $dexNum = 7;
                break;
            default:
                $dexNum = $_POST["starter"];
                break;
        }

        //Get starter stats
        $sql = $pdo->prepare("SELECT * from pokemon WHERE DexNum=?");
        $sql->execute([$dexNum]);
        $result = $sql->fetch();

        $HP = $result["HP"];
        $atk = $result["Attack"];
        $def = $result["Defense"];
        $spatk = $result["Sp_Attack"];
        $spdef = $result["Sp_Defense"];
        $speed = $result["Speed"];

        $sql = "INSERT INTO hasteam (TrainerNo, DexNum, Level, CurHP, CurAtk, CurDef, CurSpAtk, CurSpDef, CurSpeed, EXP)
                VALUES (:trainernum, :dexnum, 5, :hp, :attk, :def, :curspa, :curspd, :curspe, 0)";
        
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':trainernum', $trainerid);
        $statement->bindValue(':dexnum', $dexNum);
        $statement->bindValue(':hp', $HP);
        $statement->bindValue(':attk', $atk);
        $statement->bindValue(':def', $def);
        $statement->bindValue(':curspa', $spatk);
        $statement->bindValue(':curspd', $spdef);
        $statement->bindValue(':curspe', $speed);
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
header("location:proj3_3.html");
?>