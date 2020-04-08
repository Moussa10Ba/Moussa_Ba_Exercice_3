
<?php
include "exo3_functionMoussaBa.php";
    $message="";
    $nbrChamps=0;
    $tabMots=[];
    $error=[];
    $motsAvecM=[];
    if (isset($_POST['valider'])) {
        $nbrChamps=$_POST['nbre'];
        if (!is_number($nbrChamps)) {
            $message="Veuillez saisir un entier";
            $nbrChamps=0;
        }elseif(empty($nbrChamps)) {
                $message="Champ obligatoire";
        }
    }
    if (isset($_POST['resultat'])) {          
            $nbrChamps=$_POST['nbre'];
        for ($i=0; $i < $nbrChamps ; $i++) { 
           $mot=my_trim($_POST['mot_'.$i]);
            $tabMots[]=$mot;
            if (my_strlen($mot)>20) {
                $error[$i][]="Le mot doit pas dépasser 20 caractères.";
            }
            if (!is_valide($mot)) {
                $error[$i][]="Des lettres uniquement";
            }
            if ( is_car_in_string(' ',($mot))) {
                $error[$i][]="Un seul mot svp!!!";
            }
           /* if (isset($error[$i]) && empty($error[$i])) {
                unset($error[$i]);  
            }
            */
            if (empty($mot)) {
                $error[$i][]='Champ vide';
            }
        }
        if (empty($error)) {
            foreach ($tabMots as $value) {
                if (is_car_in_string('M',$value)) {
                    $motsAvecM[]=$value;
                }
            }
        }
    }
?>
<html>
    <head>
        <title>exercice3</title>
        <link rel="stylesheet" href="exo3.css" >
    </head>
    <body>
   <center><h1>Exercice_Numero_3</h1></center> 
    <div>
        <form method="post">
            <p class="nombre"><label>Combien de mot(s): </label></p>
            <input type="text" name="nbre" id="nombre" value="<?= $nbrChamps ?>">
            <p style="color:red"><?php  if(isset($message)){ echo $message;}?></p>
            <button type="submit" name="valider" id="valider">Valider</button>
            <button type="reset" id="annuler">Annuler</button>
            <?php for ($i=0; $i < $nbrChamps ; $i++) { ?>
            <center>
                <p class="label"><label>Mot N°<?= $i+1?></label><span ><?= isset($error[$i]) ? '( '.print_error($error[$i]) .' )' : '' ?></span></p>
                <input type="text" name="mot_<?= $i ?>" autocomplete="off" value='<?= isset($tabMots[$i]) ? $tabMots[$i] : '' ?>'>
                </center>
                <?php } ?>
            <?php if ($nbrChamps>0 && empty($message)) { ?>
                    <p class="resultat"><button type="submit" name="resultat" id="resultat">Résultats</button></p>
            <?php } ?> 
        </form>
    </div>

        <?php if (empty($error) && isset($_POST['resultat'])) { ?>
            <div class="result"><p class="p">Vous avez saisi <?= $nbrChamps ?> Mot(s) dont <span class="mot"><?= count($motsAvecM) ?> avec la lettre M</span></p> </div>
        <?php } ?>
    </body>
</html>