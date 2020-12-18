<?php
// D E B U G ///////////////////////////////////////////////////////////////////
function debug($tableau) {
  echo '<pre>';
  print_r($tableau);
  echo '</pre>';
}
// R E D I R E C T I O N ///////////////////////////////////////////////////////
function redirect($page) {
  header("Location: $page");
}
// R E D I R E C T I O N   T E M P O ///////////////////////////////////////////
function redirectTempo($value, $page) {
  header("refresh:$value;url=$page");
}
// P A G I N A T I O N /////////////////////////////////////////////////////////
function pagination($id, $page, $num, $count) {
  ?><ul><?php
    if($page > 1) {
      ?><li class="pagination"><a class="back-to-home" href="single.php?id=<?php echo $id ?>&page=<?php echo $page - 1; ?>">Précedent</a></li><?php
    }
    if($page * $num < $count) {
      ?><li class="pagination"><a class="back-to-home" href="single.php?id=<?php echo $id ?>&page=<?php echo $page + 1; ?>">Suivant</a></li><?php
    }
  ?></ul><?php
}
// C L E A N   X S S /////////////////////////////////////////////////////////////////
function cleanXss($element) {
  return trim(strip_tags($element));
}
// V A L I D A T I O N   T E X T /////////////////////////////////////////////////////
function validText($errors, $data, $key, $min, $max) {
  if(!empty($data)) {
    if(mb_strlen($data) < $min) {
      $errors[$key] = 'Le champ doit être plus grand que ' . $min . ' caractères.';
    } elseif(mb_strlen($data) > $max) {
      $errors[$key] = 'Le champ doit être plus petit que ' . $max . ' caractères.';
    }
  } else {
    $errors[$key] = 'Veuillez renseigner ce champ.';
  }
  return $errors;
}
// V A L I D A T I O N   E M A I L ///////////////////////////////////////////////////
function validEmail($errors, $data, $key) {
  if(!empty($data)) {
    if(!filter_var($data, FILTER_VALIDATE_EMAIL)) {
      $errors[$key] = 'Format de l\'email invalide.';
    }
  } else {
    $errors[$key] = 'Veuillez renseigner ce champ.';
  }
  return $errors;
}
// V A L I D A T I O N   P A S S W O R D /////////////////////////////////////////////
function validPassword($errors, $data, $data2, $key, $key2, $min, $max) {
  $majuscule        = preg_match('@[A-Z]@', $data);
  $minuscule        = preg_match('@[a-z]@', $data);
  $chiffre          = preg_match('@[0-9]@', $data);
  // $caractereSpecial = preg_match('@[^\w]@', $data);

  if(!empty($data)) {
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $data)) {
      $errors[$key] = 'Le mot de passe doit contenirs ....';
    }
    // if(mb_strlen($data) < $min) {
    //   $errors[$key] = 'Le mot de passe doit être plus grand que ' . $min . ' caractères.';
    // } elseif(mb_strlen($data) > $max) {
    //   $errors[$key] = 'Le mot de passe doit être plus petit que ' . $max . ' caractères.';
    // } elseif(!$majuscule || !$minuscule || !$chiffre) {
    //   $errors[$key] = 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractére spécial.';
    // }
  } else {
    $errors[$key] = 'Veuillez renseigner ce champ.';
  }
  if (!empty($data2)) {
    if ($data != $data2) {
      $errors[$key] = 'Les mots de passe ne correspondent pas.';
    }
  } else {
    $errors[$key2] = 'Veuillez renseigner ce champ.';
  }
  return $errors;
}
// G E N E R A T E   R A N D O M   S T R I N G ///////////////////////////////////////
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
// F O R M A T A G E   D A T E ///////////////////////////////////////////////////////
function formatDate($dateValue) {
  return date('d/m/Y H:i', strtotime($dateValue));
}
// F O R M A T A G E   D A T E   W H I T H O U T   M I N U T E ///////////////////////
function formatDateWithoutMinute($dateValue) {
  return date('d/m/Y', strtotime($dateValue));
}
// I S   L O G G E D /////////////////////////////////////////////////////////////////
function isLogged(){
  if(!empty($_SESSION['user'])) {
    if(!empty($_SESSION['user']['id']) && is_numeric($_SESSION['user']['id'])) {
      if(!empty($_SESSION['user']['pseudo'])) {
        if(!empty($_SESSION['user']['role'])) {
          if($_SESSION['user']['role'] == 'abonne' || $_SESSION['user']['role'] == 'admin') {
            if(!empty($_SESSION['user']['ip']) && $_SESSION['user']['ip'] == $_SERVER['REMOTE_ADDR']) {
              return true;
            }
          }
        }
      }
    }
  }
  return false;
}
// S H O W   J S O N /////////////////////////////////////////////////////////////////
function showJson($data) {
  header("Content-type: application/json");
  $json = json_encode($data, JSON_PRETTY_PRINT);
  if($json) {
    die($json);
  } else {
    die('Error in json encoding');
  }
}

// Fonction SQL
function SQL_INSERT($table_name,$columns,$values,$debug = false) {
  $incre = 1; // Variable d'incrementation pour la creations de varaible dynamique
  //Completion automatique de la requete SQL
  $sql = "INSERT INTO $table_name ($columns) VALUES (";
  foreach ($values as $value) {
    ${'val_'.$incre} = $value; //Creation d'une variable dynamique pour chaque elements dans l'array $value
    if (substr($sql, -1) == '(') {
      $sql .= ':val_'.$incre;
    } else {
      $sql .= ',:val_'.$incre;
    }
    $incre += 1;
  }
  $sql .= ')';
  global $pdo;
  $query = $pdo->prepare($sql);
  $incre = 1;
  foreach ($values as $value) {
    $query->bindValue(':val_'.$incre,${'val_'.$incre},PDO::PARAM_STR);
    $incre += 1;
  }
  $query->execute();
}
function SQL_SELECT($table_name,$fetchall = false,$param = '',$value,$debug = false) {
  // Verification si where
  if (!empty($param)) {
    $piece = explode(' ',$param);
    $name = $piece[1];
    $sql = "SELECT * FROM $table_name ".$param;
    global $pdo;
    $query = $pdo->prepare($sql);
    $query->bindValue(':'.$name,$value,PDO::PARAM_STR);
    $query->execute();
    if ($fetchall) {
      return $query->fetchall();
    } else {
      return $query->fetch();
    }
  }else {
    $sql = "SELECT * FROM $table_name";
    global $pdo;
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchall();
  }
}

function is_logged(): bool
{
  $isLogged = true;
  if (empty($_SESSION['user'])) {
    return $isLogged = false;
  } else {
    foreach ($_SESSION['user'] as $key => $value) {
      if (!isset($key) && !isset($value)) {
        return $isLogged = false;

      }
    }
  }
  return $isLogged;
}

function isAdmin()
{
  if (!is_logged()) {
    header('Location: ../admin/403.php');
  } elseif ($_SESSION['user']['role'] != 'admin') {
    header('Location: ../admin/403.php');
  }
}

//convertir les deux première unités de l'exadecimal de 8
function convertToByte($hexa){
  //
  // c0
  // c = Dizaine => 12
  // pour la Dizaine
  // On multiplie sa valeur(12) par 16 car en hexadecimal => base16
  // $hexa[0] => c => 12
  $totalDizaine = $hexa[0] * 16; // c + 12 => PAS POSSIBLE
  $totalDizaine = $totalDizaine + $tableau_correspondance[$hexa[1]];
  // 0 = Unité
  $unite = 0;
  $total = $totalDizaine + $unite;
  $tableau_correspondance = [

  '0' => '0',
  '1' => '1',
  '2' => '2',
  '3' => '3',
  '4' => '4',
  '5' => '5',
  '6' => '6',
  '7' => '7',
  '8' => '8',
  '9' => '9',
  'a' => '10',
  'b' => '11',
  'c' => '12',
  'd' => '13',
  'e' => '14',
  'f' => '15',
  'g' => '16',
  'h' => '17',
  'i' => '18',
  'j' => '19',
  'k' => '20',
  'l' => '21',
  'm' => '22',
  'n' => '23',
  'o' => '24',
  'p' => '25',
  'q' => '26',
  'r' => '27',
  's' => '28',
  't' => '29',
  'u' => '30',
  'v' => '31',
  'x' => '32',
  'y' => '33',
  'z' => '34',
];
};
