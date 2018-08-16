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
    



    <center>

      <h1>The Calculadora</h1>
      <form name= "calc">
      <input id="texto" type="text" name="calc" value="<?=$calc->mostrar();?>" /><br>
  
     <input type="submit" name="num[]" value="7" />
     <input type="submit" name="num[]" value="8" /> 
     <input type="submit" name="num[]" value="9" /> 
     <input type="submit" name="op" value="/" />
     <br>

      <input type="submit" name="num[]" value="4" />
      <input type="submit" name="num[]" value="5" /> 
      <input type="submit" name="num[]" value="6" />
      <input type="submit" name="op" value="*" />
      <br>

      <input type="submit" name="num[]" value="1" />
      <input type="submit" name="num[]" value="2" />
      <input type="submit" name="num[]" value="3" />
      <input type="submit" name="op" value="-" />
      <br>
  
      <input type="submit" name="num[]" value="0" />
      <input type="submit" name="num[]" value="." />
      <input type="submit" name="resultado" value="=" />
      <input type="submit" name="op" value="+" />
      <br>
 </center>
</form>
</body>
</html>