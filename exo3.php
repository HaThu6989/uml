<?php

// PHP 8.1 +++
// L'implémentation n'est pas obligatoire. Elle est réalisée implicitement dès qu'il y a une méthode __toString()
class Animal implements Stringable {

    // Injection de dépendance
    /**
     * Same :
     * private string $name
     * public function __construct() {
     */
    public function __construct(private string $name) {

    }

    public function getName() : string | null {

        return $this->name;
    }

    public function __toString(): string
    {
        // TODO: Implement __toString() method.
        return "Mon nom est $this->name";
    }

}


$dragon1 = new Animal('Viserion');
echo $dragon1; // Mon nom est Viserion

echo "<br>";

$dragon2 = new Animal('Drogon');
echo "Le nom de l'animal est {$dragon2->getName()}"; //Le nom de l'animal est Drogon