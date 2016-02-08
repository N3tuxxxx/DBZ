<?php 

/* DBZ FRONTAL CONTROLLER
** MVC CMS for database management */
//récupération de l'ID de la table 





// Call config script
require_once("Config/config.script.php");

// Call pdo connexion class 
require_once("Classes/pdo.connexion.class.php");

//Instantiate pdo connexion class 
$PDO = new Pdo_Connexion ($CONFIG['DB_INI_FILE']);

// Call model class
require_once("Classes/model.class.php");

// Instantiate model class
$MODEL = new Model ($PDO->CNX);

// Call view class
require_once("Classes/view.class.php");

  
$OUTPUT = NULL;

if(isset($_GET['DEL']) && !empty($_GET['DEL'])){
 $id_table= $_GET['T'];    
 $id_DEL= $_GET['DEL'];
 $id_nom= $_GET['Nom'];
 $MODEL->Del_occurence($id_DEL,$id_table,$id_nom);  
 $OUTPUT .= View::MenuTable ($MODEL->Name_DB(), $MODEL->List_Table()).View::AfficheTable($MODEL->List_Content($id_table),$id_table);
}

else if(isset($_GET['T']) && !empty($_GET['T'])){

// set tables
$id_table= $_GET['T'];
$OUTPUT .= View::MenuTable ($MODEL->Name_DB(), $MODEL->List_Table()).View::AfficheTable($MODEL->List_Content($id_table),$id_table);

}
        
       
else {
$OUTPUT .= View::MenuTable ($MODEL->Name_DB(), $MODEL->List_Table())  ;
}

// output echo screen rendering 
View::HTML($CONFIG['MODULE_NAME'], $OUTPUT);

?>
