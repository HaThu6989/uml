<?php

class Technician {

    private string $name;
    private array $subordinates = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getSuperior(): Technician
    {
        return $this->superior;
    }

    public function setSuperior(?Technician $superior): self
    {
        if($superior === $this) {
            throw new Exception("un technicien ne peut pas etre son propre supérieur");
        }
        
        // Mise à jour de l'ancien supérieur
        if($this->superior != null) {
            $this->superior->removeSubordinate($this);
        }

        if($superior != null) {
            $superior->addSubordinate($this);
        }
        // Mise à jour le nouveau supérieur
        $this->superior = $superior;

        return $this;
    }

    public function getSubordinates(): array
    {
        return $this->subordinates;
    }

    public function addSubordinate(Technician $subordinate): self
    {
        if($subordinate === $this) {
            throw new Exception (" Un techn ne peut pas etre son propre subordonné");
        }

        if(!array_search($subordinate, $this->subordinates)){
            array_push($this->subordinates, $subordinate);
        }
        return $this;
    }

    public function removeSubordinate(Technician $subordinate): self
    {
        $key = array_search($subordinate, $this->subordinates);
        if($key){
            unset($this->subordinates[$key]);
        }
        return $this;
    }
}

$tech1 = new Technician('Paul');
$boss1 = new Technician('Tom');
$boss1->addSubordinate($tech1);
var_dump($boss1);
echo"<br>";
var_dump($tech1);
