<?php
 
?>
<!DOCTYPE >
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>The Calculadora</title>
</head>
<body>

<?php

class calculadora {

var $nums = '';
var $calc = '';
var $op = '';

function mostrar () {
 
 $num = @$_GET['num'][0];
 $calc = @$_GET['calc'];

 if(empty( $num ) AND empty( $calc )) {
  return false;
 }

 if(!isset( $display )) {
  $display = $calc;
 }

 $this->nums .= empty( $num ) ? $display : $display.$num;
 
 $this->setOperacao();
 
 if(!empty( $this->op )) {
  $this->calc = $this->nums.rawurldecode( $this->op ).$num;
 }

 return $this->calcular();
}

function setOperacao () {  
 if(!empty( $_GET['op'] )) {
  $this->op = $_GET['op'];
 }
}

function calcular() {
 
 $calc = empty( $this->calc ) ? $this->nums : $this->calc;

 if(isset( $_GET['resultado'] )) {
  if(preg_match( '/^([0-9]+)(\/|\*|\+|\-)([0-9]+)+$/', $calc, $match )) {
   switch( $match[2] ) {
    case "+":
     return $match[1]+$match[3];
    break;
   }
  } else {
   return "Ocorreu um erro";
  }
 }
 return $calc;
}
}
$calc = new calculadora();
?>
 </center>
</form>
</body>
</html>