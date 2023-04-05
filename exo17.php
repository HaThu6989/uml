<?php

class Waiter {
    private string $name;

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
}

class Table {
  private array $waiters = [];

  public function addWaiter(Waiter $waiter)
  {   
    if(!array_search($waiter, $this->waiters)){
      // $this->waiters[] = $waiter;
      array_push($this->waiters, $waiter);
    }
  }
  
  public function removeWaiter(Waiter $waiter)
  {
    $key = array_search($waiter, $this->waiters);
    if($key !== false){
      array_splice($this->waiters, $key, 1);
    } else {
      throw new Exception('Error to remove waiter');
    }
  }
  
  public function setWaiters(array $waiters): self
  {
    foreach($waiters as $waiter) {
      $this->addWaiter($waiter);
    }
    return $this;
  }
  
  public function getWaiters(): array
  {
    return $this->waiters;
  }

}  


$waiter1 = new Waiter('Paul');
$waiter2 = new Waiter('Marie');
$waiter3 = new Waiter('Sara');

$table1 = new Table();
$table1->addWaiter($waiter1);
$table1->addWaiter($waiter2);
$table1->addWaiter($waiter3);
var_dump($table1);

echo"<br> <br>";
$table1->removeWaiter($waiter1);
var_dump($table1);