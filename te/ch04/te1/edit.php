<?php
/*
Te pratique Jonathan Rohrbach
*/
// Constantes
const DB_SERVER   = 'localhost';
const DB_USER     = 'cpnv';
const DB_PASSWORD = 'cpnv1234';
const DB_NAME     = 'world';

//const QUERY = "SELECT ID, Name, CountryCode, District FROM City WHERE CountryCode = 'CHE' ORDER BY Name";
//
const QUERY = "SELECT ID, Name, CountryCode, District FROM City WHERE CountryCode = 'CHE' ORDER BY Name";

$dbh = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);


if ($dbh->connect_errno) {

    // Les erreurs de connexion sont dans connect_errno et connect_error
    // A noter qu'en production, il serait judicieux, pour des raisons de
    // sécurité, d'afficher les messages qui permettraient à un attaqueur de
    // savoir quelle base de données nous utilisons.
    $error_msg = sprintf('Problème de connexion : (%d) %s',
                         $dbh->connect_errno, $dbh->connect_error);
                         
}

if (!$result = $dbh->query(QUERY)) {
    die("{$dbh->errno} : {$dbh->error}");
    //printf("Select a retourné %d lignes.\n",$result->num_rows);    

}


?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Lecture d'enregistrements dans une table</title>
  </head>
  <body>

  </body>
</html>
