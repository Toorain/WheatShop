<?php

class database
{
  public $_alreadyExists;

  // This function will scan for the same $name & $login in the table $auth of our Database, if it finds anything, it means this entry already exists in the DB.
  public function scanDatabase($auth, $lastName, $login){
    echo ('First Function starts');
    $this->_alreadyExists = false;
    foreach ($auth as $key => $value) {
      if ($lastName == $value['lastname'] && $login == $value['login']) {
        $this->_alreadyExists = true;  
      }
    }
  }

  // If it doesn't exists in the Database, we create it with a SQL request.
  public function createEntry($conn, $firstName, $lastName, $login, $pass, $city){
    if ($this->_alreadyExists == false ) {
      if ($firstName == '' || $lastName == '' || $login == '') {
        header('Location: index.php?p=register&logs=missing'); 
      } else {
        $sql = "INSERT INTO Auth (login, pass, firstname, lastname, city)
      VALUES ('$login', '$pass', '$firstName', '$lastName', '$city')";
        // Comment out for debug purpose
        if ($conn->query($sql) == true) {
            // echo "New record created successfully";
        } else {
            // echo "Error: " . $sql . "<br>";
        }
        header('Location: index.php?p=register&logs=registered');
      }      
    }
  }
}