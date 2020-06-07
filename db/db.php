<?php

ini_set('display_errors','1');
try
{
    $db = new PDO('mysql:host=localhost;dbname=fuzzme', 'fuzzme', 'mdp');
}
catch(PDOExecption $e)
{
    echo 'Error "<i>'.$e->getMessage().'</i></br>';
}
