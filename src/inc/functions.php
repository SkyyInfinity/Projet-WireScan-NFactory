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
function timeToMY($englishTime)
{
  return date('YYY-mm-dd H:i:s', strtotime($englishTime));
}
function notEmptyJSON($val,$array){

}
function find_parent($array, $needle, $parent = null) {
  foreach ($array as $key => $value) {
      if (is_array($value)) {
          $pass = $parent;
          if (is_string($key)) {
              $pass = $key;
          }
          $found = find_parent($value, $needle, $pass);
          if ($found !== false) {
              return $found;
          }
      } else if ($key === 'id' && $value === $needle) {
          return $parent;
      }
  }
  return false;
}
// Fonction breakJSONtoSQL
function breakJSONToSQL($json,$user_id)
{
  // debug($json);
  $i = 1;
  foreach($json as $data) {
      ${'data_'.$i} = $data;
      $i += 1;
  }
  $x = $i;
  $i = 1;
  while ($i != $x) {
    $value_trames = array();
    $value_trames2 = array();
    $value_trames['user_id'] = $user_id;
    $sql_trames = 'user_id,';
    $sql_trames2 = '';
    foreach (${'data_'.$i} as $key => $value) {
      if (is_array($value)) {
        if ($key == 'flags') {
          $value_trames[$key.'_code'] = $value['code'];
          $sql_trames .= $key .'_code,';
        } elseif ($key == 'protocol') {
          $name = $key; 
          foreach ($value as $key => $value_protocol) {
            if (is_array($value_protocol)) { 
              if ($key == 'flags') {
                $value_trames[$name.'_'.$key.'_code'] = $value_protocol['code'];
                $sql_trames .= $name.'_'.$key .'_code,';
              } elseif ($key == 'checksum') {
                $name_checksum = $key;
                foreach ($value_protocol as $key => $value_checksum) {
                  $value_trames[$key.'_'.$name_checksum] = $value_checksum;
                  $sql_trames .= $key.'_'.$name_checksum.',';
                }
              } elseif ($key == 'ports') {
                $name_ports = $key;
                foreach ($value_protocol as $key => $value_port) {
                  $value_trames[$key.'_'.$name_ports] = $value_port;
                  $sql_trames .= $key.'_'.$name_ports.',';
                } 
              } 
            } else {
              if ($key == 'code') {
                $value_trames[$name.'_code'] = $value['code'];
                $sql_trames .= $name.'_code,';
              } elseif ($key == 'version') {
                echo $key;
                $value_trames[$name.'_'.$key] = $value_protocol;
                $sql_trames .= $name.'_'.$key.',';
              } else {
                $value_trames[$key] = $value_protocol;
                $sql_trames .= $key.',';
              }
            }
          }
        } elseif ($key == 'ip') {
          $name_ip = $key;
          foreach ($value as $key => $value_ip) {
            $value_trames[$key.'_'.$name_ip] = $value_ip;
            $sql_trames .= $key.'_'.$name_ip.',';
          }
        }
      } else {
        if($key == 'date') {
          $dt = new DateTime("@$value");
          $value_trames[$key] = $dt->format('Y-m-d H:i:s');
          $sql_trames .= $key.',';
        } else {
          $value_trames[$key] = $value;
          $sql_trames .= $key .',';
        }
      }
    }
    echo '-----------------------------------------------------------------------------';
    $i += 1;
    $sql_trames= substr_replace($sql_trames,"",-1);
    echo $sql_trames;
    echo count($value_trames);
    debug($value_trames);
    SQL_INSERT('trames',$sql_trames,$value_trames);
    echo '-----------------------------------------------------------------------------';
  }   

}
// Fonction SQL
function SQL_INSERT($table_name,$columns,$values,$debug = false) {
  //Completion automatique de la requete SQL
  if (is_array($values)) {
    $incre = 1;
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
  } else {
    $sql = "INSERT INTO $table_name ($columns) VALUES (:val";
  }
  $sql .= ')';
  global $pdo;
  $query = $pdo->prepare($sql);
  $incre = 1;
  if (is_array($values)) {
    foreach ($values as $value) {
      $query->bindValue(':val_'.$incre,${'val_'.$incre},PDO::PARAM_STR);
      $incre += 1;
    }
  } else {
    $query->bindValue(':val',$values,PDO::PARAM_STR);
  }
  $query->execute();
  // echo $sql;
}
function SQL_SELECT($table_name,$fetchall = false,$param = '',$value,$order_by = '',$debug = false) {
  // Verification si where
  if (!empty($param)) {
    $piece = explode(' ',$param);
    $name = $piece[1];
    $sql = "SELECT * FROM $table_name ".$param . ' :' .$name;
    if (!empty($order_by)) {
      $sql .=  ' '.$order_by;
    }
    global $pdo;
    $query = $pdo->prepare($sql);
    $query->bindValue (':'.$name,$value,PDO::PARAM_STR);
    $query->execute();
    if ($fetchall) {
      return $query->fetchall();
    } else {
      return $query->fetch();
    }
  } else {
    $sql = "SELECT * FROM $table_name";
    global $pdo;
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchall();
  }
}
// FONCTION SQL UPDATE
// ATTENTION FONCTION NON DEBUGUE NE SURTOUT PAS INJECTER PLUSIEURS VALEUR
function SQL_UPDATE($table_name,$updatevals,$param = '',$paramval) {
  $sql = "UPDATE $table_name SET ";
  foreach ($updatevals as $key => $updateval) {
    $sql .= $key .' = :'.$key . ' , ' ;
  }
  $sql = substr_replace($sql," ",-2);
  $sql .=  $param . ':param_val';
  global $pdo;
  $query = $pdo->prepare($sql);
  foreach ($updatevals as $key => $updateval) {
    $query->bindValue(':'.$key,$updateval,PDO::PARAM_INT);
  }
  $query->bindValue(':param_val',$paramval,PDO::PARAM_INT);
  $query->execute();
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
function ipfromHex($hex)
{
    $ip = hexdec($hex[0].$hex[1]) .'.'. hexdec($hex[2].$hex[3]) .'.'. hexdec($hex[4].$hex[5]) .'.'. hexdec($hex[6].$hex[7]);
    return $ip;
}
