<?php
    try {
        $host = '127.0.0.1';
        $dbName = 'instabooster-db';
        $user = 'root';
        $password = '';

        $pdo = new PDO(
        'mysql:host='.$host.';dbname='.$dbName.';charset=utf8',
        $user,
        $password);

        // Cette ligne demandera à pdo de renvoyer les erreurs SQL si il y en a
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
    throw new InvalidArgumentException('Connexion to DB failed : '.$e->getMessage());
    exit;
    }
    // echo('connexion to db granted');
?>