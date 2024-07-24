<?php

require_once 'DBConnect.php';
require_once 'ContactManager.php';
require_once 'Contact.php';
require_once 'Command.php';

$command = new Command();

while (true) {
    $line = readline("Entrez votre commande : ");
    
    if ($line == 'list') {
        $command->list();
        break;
    } 

    if (preg_match("/^detail (.*)$/", $line, $matches)) {
        $command->detail($matches[1]);
        continue;
    }

    if (preg_match("/^delete (.*)$/", $line, $matches)) {
        $command->delete($matches[1]);
        continue;
    }

    if (preg_match("/^create (.*), (.*), (.*)$/", $line, $matches)) {
        $command->create($matches[1], $matches[2], $matches[3]);
        continue;
    }

    echo "Commande non valide : $line\n";
}


