//html table containing the table values
public static function TABLE_DESCRIPTION($tab){
    //ob start lance l'enregistrement de la variable tampon,
    //tous ce qui se trouve entre ob_start et ob_get_clean sera récupéré
    //comme ça on peut écrire en html tranquilou au lieu de se taper la concaténation de chaîne moche
    ob_start(); ?>
        <table>
            <thead> <!--Dans le header on met les titres-->
                <tr>
                    <?php foreach($tab as $u): ?>
                        <?php foreach($u as $id=>$v): ?>
                            <th><?= $id ?></th>
                        <?php endforeach; break;?>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody> <!--Et dans le body le contenu avec un lien pour modifier et supprimer-->
                <?php foreach($tab as $id=>$v): ?>
                    <tr>
                        <?php foreach($v as $value): ?>
                            <td><?= $value ?></td>
                        <?php endforeach; ?>
                        <td><a href="./Classes/model.class.php?mod=<?= $id ?>">Modifier</a></td>
                        <td><a href="./Classes/model.class.php?del=<?= $id ?>">Supprimer</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="controler"> <!--Le formulaire d'ajout de valeur-->
            <form action="./Classes/model.class.php" method="POST">
                <fieldset>
                    <legend>Ajouter une valeur</legend>
                    <?php foreach($tab as $u): ?>
                        <?php foreach($u as $key=>$v): ?>
                            <?= $key ?> <br>
                            <input type="text" name="<?= $key ?>"><br>
                        <?php endforeach; break;?>
                    <?php endforeach; ?>
                    <input type="submit" name="addValues" value="Ajouter">
                </fieldset>
            </form>
        </div>
    <?php return ob_get_clean();
    //On renvoie tous le code html avec le ob_get_clean
}