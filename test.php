<?php
echo "name";

$array=[30,1,10,20,0];

/* for ($i = 1; $i <= 10; $i++) { */
/*     echo $i; */
/* } */




function bubuleSort($array) {
  for($i=0; $i < count($array)-1 ; $i++){
    for($j=0; $j < count($array)-1-$i; $j++){
      if($array[$j] > $array[$j+1]){
        $temp = $array[$j];
        $array[$j] = $array[$j+1];
        $array[$j+1] = $temp;
      }
    }
  }
  return $array ;
}

/*input:[30,1,10,20,0] output: [0,1,10,20,30]  */

$result = bubuleSort($array);
var_dump($result);


/* 対話シェル php -a */


// パスワード認証
$pass = password_hash("jjojfjoojrpjf", PASSWORD_DEFAULT);
echo $pass.PHP_EOL;
var_dump(password_verify("jjojfjoojrpj", $pass) == true);
