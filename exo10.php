<?php

class Technician {
    private string $name;
    private ?Vehicule $vehicule = null;

    public function __construct(string $name) {
        $this->name = $name;
    }

     /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of vehicule
     */
    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    /**
     * Set the value of vehicule
     */
    public function setVehicule(?Vehicule $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }


}


class Vehicule {

    private string $registerNumber;
    
    private array $technicians = [];

    public function __construct(string $registerNumber) {
        $this->registerNumber = $registerNumber;
    }
   

    /**
     * Get the value of registerNumber
     */
    public function getRegisterNumber(): string
    {
        return $this->registerNumber;
    }

    /**
     * Set the value of registerNumber
     */
    public function setRegisterNumber(string $registerNumber): self
    {
        $this->registerNumber = $registerNumber;

        return $this;
    }

    /**
     * Get the value of technicians
     */
    public function getTechnicians(): array
    {
        return $this->technicians;
    }

    /**
     * Set the value of technicians
     */
    public function setTechnicians(array $technicians): self
    {
        $this->technicians = $technicians;

        return $this;
    }

    public function addTechnician(Technician $technician): self
    {
        $this->technicians[] = $technician;
        return $this;
    }

}



$vA = new Vehicule("AA-456");
$vB = new Vehicule("BB-789");
var_dump($vA); 
var_dump($vB); 

echo "<br>";
$juliette = new Technician("Juliette");
$jalila= new Technician("Jalila");
$paul= new Technician("Paul");
var_dump($juliette);
var_dump($jalila);  
var_dump($paul);    

echo "<br> <br>";
$vA->setTechnician($paul);
var_dump($vA); 


$vA->setTechnician($juliette);
var_dump($vA); 
 

echo "<br> <br>";
$vB->setTechnician($jalila);
var_dump($vB); 

echo "<br> <br> <br>";
$vB->setTechnician($paul);
$paul->setVehicule($vB);
var_dump($vA); 

echo "<br>  <br>";
var_dump($vB); 