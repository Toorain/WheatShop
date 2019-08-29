<?php

class basket
{ 
  public $_basketContent;

  function addProduct($id, $ref, $qte, $img, $price, $name){

  $this->_basketContent = $_SESSION['User']['basket'];
  $tmp = true;
  // Check the array basket for an iteration of 'ref'
  foreach ($this->_basketContent as $key => $product ) {
    // If basket[0] & basket[1] have the same 'ref'    
    if ($product['ref'] == $ref ) {
      $this->_basketContent[$key]['qte'] += $qte;
      $tmp = false;
    }    
  } 
    if($tmp){
      $this->_basketContent[] = [ 'id' => $id,
                                  'ref' => $ref,
                                  'qte' => $qte,
                                  'img' => $img,
                                  'price' => $price,
                                  'name' => $name ];
    }  
  return $this->_basketContent;
  }

  function delProduct($ref){
    $this->_basketContent = $_SESSION['User']['basket'];

    foreach ($this->_basketContent as $key => $product) {
      if ($product['ref'] === $ref) {
        unset($this->_basketContent[$key]);        
      }
    }
    return $this->_basketContent;
  }

  function __set($name, $value){
    $this->$name = $value;
  }
}