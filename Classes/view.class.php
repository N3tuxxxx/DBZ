<?php 

/* DBZ VIEW */

class View {

    public function __construct () { }
    
    
    // menu list of table link
    public static function MenuTable ($db_name, $array_table) {
        $menu = "<div>DB : ".$db_name;

        //For each table, generate a link with the name of the table

        foreach ($array_table as $K => $TABLE) {
            $menu .= " <a href='?T=".$TABLE[0]."'>[ ".strtoupper($TABLE[0])." ]</a>";
        }

        $menu .= "</div>";

        return $menu;
    }  

    // list content of selected table
    public static function AfficheTable ($array_cont,$table){
        ob_start(); ?>
    <div class='table_style'>
      <?php $first_column=NULL ; ?>
        <table>
        <!--Tab's title-->
            <thead>
                <tr>
                    <?php foreach ($array_cont as $K => $TABLE) {?>
                      
                      <?php foreach ($TABLE as $key => $value) {?>
                      <?php $first_column=($key);?>
                      <?php break; } ?>
                       
                        <?php foreach ($TABLE as $key2 => $value3) {?>

                        <th><?php echo $key; ?></th>
                        <?php  } break; ?>

                    <?php  } ?>
                </tr>

            </thead>

        <!--Tab's content--> 
            <tbody> 
                <?php foreach($array_cont as $K2=>$TABLE2){?>
                   
                    <tr>
                        <?php foreach($TABLE2 as $k3=>$value2){ ?>
                        <td><?php echo $value2; ?></td>
                        
                        <?php  }?>
                         <?php foreach($TABLE2 as $k3=>$value2){ ?>
                        <td><?php echo $value2; ?></td>
                         <!--Update Button  Non functional -->
                        <td class="edit"><a href="">Update</a></td>
                        <!--Delete Button-->
                        <td class="delete"><a href="index.php?DEL=<?php echo $TABLE2[$k3] ;?>&Nom=<?php echo $first_column; ?>&T=<?php echo $table ;?>">Delete</a></td>
                        
                        <?php  break; } ?>
                        
                       
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>


    <!--Add data Non functional-->

    <div class="ajout"> 
    <form action="./Classes/model.class.php" method="POST">
        <fieldset>
            <legend>Ajouter une valeur</legend>
            <?php foreach($array_cont as $u) { ?>
            <?php foreach($u as $key=>$v) { ?>
            <?php echo $key; ?> <br>
            <input type="text" name="<?php echo $key; ?>"><br>
            <?php } break;?>
            <?php } ?>
            <input type="submit" name="addValues" value="Ajouter">
        </fieldset>
    </form>
    </div>


    <?php $tampon = ob_get_clean();
        
    return $tampon;


    }


    // html final rendering Va renvoyer tout l'html de la page 
    public static function HTML ($title, $contener) {
        echo "<html>
      <head>
        <title>".$title."</title>
        <link rel='stylesheet' type='text/css' href='Fichiers/css/style.css' />
      </head>
      <body>
        <img src='Fichiers/images/logo.jpg' /><br /><hr />
        </hr>".$contener."
      </body>
      </html>";
    }

}

?>
