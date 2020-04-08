<?php
function is_lower($car){
    return ($car>='a' && $car<='z');
}

function is_uper($car){
    return ($car>='A' && $car<='Z');
}

function is_entier($valeur){
    return ($valeur>='-9' && $valeur<='9');
}
function my_strlen($chaine){
    $i=0;
    
    while(!empty($chaine[$i])){
        $i++;
    }
    return $i;
}

function is_valide($mot){
    
    for ($i=0; $i <my_strlen($mot); $i++) { 
        if (!is_lower($mot[$i]) && !is_uper($mot[$i]) ) {
            return false;
        }
    }
    return true;
}

function is_number($nombre){
    for ($i=0; $i <my_strlen($nombre) ; $i++) { 
        if (!(is_entier($nombre[$i]))) {
            return false;
        }
    }
    return true;
}

/*function delete_space($chaine){

    $stock="";
    for($i=0;$i<my_strlen($chaine);$i++){
        if($chaine[$i]!=' '){
            $stock=$chaine[$i];
        }
    }
    return $stock;
}
*/
    function is_car_in_string($car,$chaine){
        for ($i=0; $i <my_strlen($chaine) ; $i++) { 
                if ($car==$chaine[$i]) {
                    return true;
                }
        }
        return false;
    }
    /*
    function compte_char_in_string($chaine,$car){
        $cpt=0;
        for ($i=0; $i <my_strlen($chaine) ; $i++) { 
            if ($car==$chaine[$i]) {
                $cpt++;
            }
            
}  
return $cpt;
    }
    */
    function compte_char_in_string($chaine,$car){
        $cpt=0;
        for ($i=0; $i <my_strlen($chaine) ; $i++) { 
            if (is_car_in_string($chaine[$i],$car)) {
                $cpt++;
            }
    }
    return $cpt;
}

function my_trim($chaine){
    $stock="";
    for($i=0;$i<my_strlen($chaine);$i++){ 
        if($chaine[$i]!=' '){
            $stock.=$chaine[$i];
        }
    }
    return $stock;
}
function print_error($tab){
    $chaine="";
    foreach ($tab as $t) {
        $chaine .= $t." - ";
    }
    return $chaine;
}
?>
