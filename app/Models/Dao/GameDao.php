<?php

namespace App\Models\Dao;

use PDO;
use App\Models\Game;
use App\Models\Dao\AccesBdd;
use PDOException;


class GameDao{
    private $connexion;

    public function __construct()
    {
        $this->setConnexion();
    }

    /**
     * @return mixed
     */
    public function getConnexion()
    {
        return $this->connexion;
    }

    public function setConnexion(): void
    {
        $acces = new AccesBdd();
        $this->connexion = $acces->getConnexion();
    }

    public function getAll() : array
    {

        try{
            $sql = "SELECT * FROM games";

            $query = $this->getConnexion()->prepare($sql);

            $query->execute();
        }catch(PDOException $e){
            echo 'Erreur : '. $e->getMessage();
            die();
        }

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $gamesArray = array();

        foreach ($result as $game){
            $gameObj = new Game($game);
            $gamesArray[] = $gameObj;
        }

        return $gamesArray;

    }
    public function getOne($id){
        try{
            $sql = "SELECT * FROM games WHERE gameId = '$id'";

            $query = $this->getConnexion()->prepare($sql);

            $query->execute();
        }catch(PDOException $e){
            echo 'Erreur : '. $e->getMessage();
            die();
        }

        $result = $query->fetch(PDO::FETCH_ASSOC);

        return new Game($result);

    }
    public function getPopular(){
        try{
            $sql = "SELECT * FROM games ORDER BY gamePopularity LIMIT 5";

            $query = $this->getConnexion()->prepare($sql);

            $query->execute();
        }catch(PDOException $e){
            echo 'Erreur : '. $e->getMessage();
            die();
        }

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $gamesArray = array();

        foreach ($result as $game){
            $gameObj = new Game($game);
            $gamesArray[] = $gameObj;
        }

        return $gamesArray;
    }

}

