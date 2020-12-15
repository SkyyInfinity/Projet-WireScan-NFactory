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
function validationText($errors, $data, $key, $min, $max) {
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
function validationEmail($errors, $data, $key) {
  if(!empty($data)) {
    if(!filter_var($data, FILTER_VALIDATE_EMAIL)) {
      $errors[$key] = 'L\'email doit être un email valide.';
    }
  } else {
    $errors[$key] = 'Veuillez renseigner ce champ.';
  }
  return $errors;
}
// V A L I D A T I O N   P A S S W O R D /////////////////////////////////////////////
function validationPassword($errors, $data, $key, $min, $max) {
  $majuscule        = preg_match('@[A-Z]@', $password);
  $minuscule        = preg_match('@[a-z]@', $password);
  $chiffre          = preg_match('@[0-9]@', $password);
  $caractereSpecial = preg_match('@[^\w]@', $password);

  if(!empty($data)) {
    if(mb_strlen($data) < $min) {
      $errors[$key] = 'Le mot de passe doit être plus grand que ' . $min . ' caractères.';
    } elseif(mb_strlen($data) > $max) {
      $errors[$key] = 'Le mot de passe doit être plus petit que ' . $max . ' caractères.';
    } elseif(!$majuscule || !$minuscule || !$chiffre || !$caractereSpecial) {
      $errors[$key] = 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractére spécial.';
    }
  } else {
    $errors[$key] = 'Veuillez renseigner ce champ.';
  }
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
function SQL_SELECT($table_name,$fetchall = false,$param = '',$value = '',$debug = false) {
  // Verification si where
  if (!empty($param)) {
    $piece = explode(' ',$param);
    $name = $piece[1];
    $sql = "SELECT * FROM $table_name ".$param;
    echo $sql;
    global $pdo;
    $query = $pdo->prepare($sql);
    $query->bindValue(':'.$name,$value,PDO::PARAM_STR);
    $query->execute();
    if($debug) {
      if ($fetchall) {
        debug($query->fetchall());
      } else {
        debug($query->fetch());
      }
    } else {
      if ($fetchall) {
        return $query->fetchall();
      } else {
        return $query->fetch();
      }
    }
  }else {
    $sql = "SELECT * FROM $table_name";
    global $pdo;
    $query = $pdo->prepare($sql);
    $query->execute();
    if($debug) {
      debug($query->fetchall());
    } else {
      return $query->fetchall();
    }
  }
}

function validText($errors,$value,$key,$min,$max,$emailM = false)
{
  if(!empty($value)) {
    if ($emailM == true) {
      if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $errors[$key] = 'Veuillez renseigner une email valide';
      }
    } else {
      if(strlen($value) < $min) {
        $errors[$key] = 'Min '.$min.' caractères';
      } elseif(strlen($value) > $max) {
        $errors[$key] = 'Max '.$max.' caractères';
      }
    }
  } else {
      $errors[$key] = 'Veuillez renseigner ce champ';
  }
  return $errors;
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