<?php

class Technician {
    private ?Vehicule $vehicule = null;

    public function __construct(private string $name) {
        $this->name = $name;
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
        if($this->vehicule !== null) {
        $this->vehicule->removeTechnician($this);
    }

        if($vehicule !== null) {
        $vehicule->addTechnician($this);
    }

        $this->vehicule = $vehicule;
        return $this;
    }
}
  
  
  
class Vehicule {
    private array $technicians = [];

    public function __construct(private string $registerNumber) {
        $this->registerNumber = $registerNumber;
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
      foreach($technicians as $technician) {
      $this->addTechnician($technician);
      }
    }

    public function addTechnician(Technician $technician): self
    {
        $this->technicians[] = $technician;
        return $this;
    }

    public function removeTechnician(Technician $technician): self
    {
        $key = array_search($technician, $this->technicians);
        unset($this->technicians[$key]);
        return $this;
    }
}


$vA = new Vehicule('AA-456');
$vB = new Vehicule('BB-789');
echo "<br> var_dump VA <br>";
var_dump($vA);
echo "<br> <br> var_dump VB <br>";
var_dump($vB);

$paul = new Technician('Paul');
$juliette = new Technician('Juliette');
$jalila = new Technician('Jalila');
echo "<br> <br> PAUL <br>";
var_dump($paul);

echo "<br> <br> JULIETTE <br>";
var_dump($juliette);

echo "<br> <br> JALIA <br>";
var_dump($jalila);


$paul->setVehicule($vA);
$juliette->setVehicule($vA);
// $jalila->setVehicule($vB);
echo "<br> <br> VA <br>";
var_dump($vA);

// echo "<br> VB <br>";
// var_dump($vB);

$paul->setVehicule($vB);
echo "<br> <br> PAUL <br>";
var_dump($paul);

echo "<br> <br> VA <br>";
var_dump($vA);

// var_dump($vB);