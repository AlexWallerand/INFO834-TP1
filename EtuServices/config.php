<?php
try
{
    $db = new PDO('mysql:host=localhost;dbname=info834-tp1;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>