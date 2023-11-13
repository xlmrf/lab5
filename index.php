<?php


function encode($text){
  
  $asciiCode = '';
  $binaryString = '';
  
  if(!$text)
    return '';
  
  for ($i = 0; $i < strlen($text); $i++) {
    $asciiCode .= ord($text[$i]);
    if($i != strlen($text) - 1)
      $asciiCode .= ' ';
  }
  
  $asciiArray = explode(' ', $asciiCode);
  for($i = 0; $i < count($asciiArray); $i++) {
    $binaryValue = sprintf("%08b", $asciiArray[$i]);
    for ($j = 0; $j < strlen($binaryValue); $j++) {
      $bits .= str_repeat($binaryValue[$j], 3);
    }
  }
  
  return $bits;
}

function decode($bits){
  
  if(!$bits)
    return '';
  
  $bit_parts = str_split($bits,3);
  $bytes = '';

  for($i=0; $i < count($bit_parts); $i++){
    if($bit_parts[$i] == '111' || $bit_parts[$i] == '011' || $bit_parts[$i] == '110' || $bit_parts[$i] == '101')
      $bytes .= '1';
    else
      $bytes .= '0';
  }
  
  $bytes_parts = str_split($bytes,8);
  $word = '';
  foreach ($bytes_parts as $binary) {
    $decimalValue = bindec($binary);
    $word .= chr($decimalValue);
  }

  return $word;
}

