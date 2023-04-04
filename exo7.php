<?php

class Technician {
    private string $name;
    private ?Vehicule $vehicule = null;
    public function __construct(string $name) {
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

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): self
    {
        $this->vehicule = $vehicule;
        return $this;
    }

    public function __toString(): string
    {
        $string = "Je suis le technicien {$this->name}";
        if ($this->vehicule) {
            $string .= " et mon véhicule est {$this->vehicule->getRegisterNumber()}";
        }
        else {
            $string .= " et je n'ai pas de véhicule";
        }
        return $string;
    }
}


class Vehicule {
    private string $registerNumber;
    private ?Technician $technician = null;

    public function __construct(string $registerNumber) {
        $this->registerNumber = $registerNumber;
    }

    public function getRegisterNumber(): string
    {
        return $this->registerNumber;
    }

    public function setRegisterNumber(string $registerNumber): self
    {
        $this->registerNumber = $registerNumber;
        return $this;
    }

    public function getTechnician(): ?Technician
    {
        return $this->technician;
    }

    public function setTechnician(?Technician $technician): self
    {
        // Nếu vehicule1 đã có this->technician là person2 
        // => xóa vehicule1 trong setVehicule của person1   
        if($this->technician !== null) {
            $this->technician->setVehicule(null);
        }

        // Nếu technician của vehicule1 là person1 
        // => thêm vehicule1 = vào setVehicule của person1
        if($technician !== null) {
            $technician->setVehicule($this);
        }
        $this->technician = $technician;
        return $this;
    }

    public function __toString(): string
    {
        $string = "Je suis le vehicule immatriculé {$this->registerNumber}";
        if ($this->technician) {
            $string .= " et mon technicien est {$this->technician->getName()}";
        }
        else {
            $string .= " et je n'ai pas de technicien";
        }
        return $string;
    }
}



$vehicule1 = new Vehicule('AB-123');
$person1 = new Technician('Paul');
$person2 = new Technician('Marie');

$vehicule1->setTechnician($person1);
echo($vehicule1); 
echo "<br>";
var_dump($person1->getVehicule());

echo "<br>";
$vehicule1->setTechnician($person2); 
echo($vehicule1); 
echo($person1);   
var_dump($person1->getVehicule()); 
