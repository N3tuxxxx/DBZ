<?php 

/* DBZ MODELE KAMEHAMEHA */

class Model {

    private $PDO = NULL;

    // Constructor
    public function __construct ($pdo) {
        $this->PDO = $pdo;
    }

    // db name:Return the DB name  
    public function Name_DB () {
        return $this->PDO->Query('select database()')->fetchColumn();
    }

    // list_table:List all the tables in the DB
    public function List_Table () {
        $SQL = "show tables";
        $RES = $this->PDO->prepare($SQL);
        $RES->execute();
        return $RES->fetchAll();
    }

    // list_content:List the content of each table

    public function list_Content ($table){
        $SQL = "SELECT * FROM ".$table;
        $RES = $this->PDO->prepare($SQL);
        $RES->execute();
        return $RES->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Del_occurence: Del selected occurence from the selected table
    public function Del_occurence($id,$table,$Nom_id){
		$REQ = "DELETE FROM ".$table." WHERE ".$Nom_id."=".$id;
		$RES = $this->PDO->prepare($REQ);
		$RES->execute();
		}
}

?>
