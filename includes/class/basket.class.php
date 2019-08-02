<?php

class basket
{ 
  private $_productList;

  function addProduct($ref, $qte){
      $this->_productList[] = [ $ref, $qte ];
  }

  function delProduct(){

  }
}
