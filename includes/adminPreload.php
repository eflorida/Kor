<?php
  //PHP Connection test using MeekroDB

  include_once "mkDBConfig.php";

  DB::$error_handler = false; // since we"re catching errors, don"t need error handler
  DB::$throw_exception_on_error = true;

  //______________________________________________________________________________________
  
  //load client names and id's for project creation
  try {
    //Insert Meek Query Here
    $client = DB::query("SELECT name, id FROM clients");

  } catch(MeekroDBException $e) {
    echo "Error: " . $e->getMessage() . "<br>\n"; // something about duplicate keys
    //echo "Variables: client=" . $client;
    echo "SQL Query: " . $e->getQuery() . "<br>\n"; // INSERT INTO accounts...
  }

  //______________________________________________________________________________________
   
  // restore default error handling behavior
  // don"t throw any more exceptions, and die on errors
  DB::$error_handler = "meekrodb_error_handler";
  DB::$throw_exception_on_error = false;
?>