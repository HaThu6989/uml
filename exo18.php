<?php

class Waiter {
  private array $tables=[];
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

  public function addTable (Table $table) {
    if (count($this->tables) >= 4) {
      throw new Exception('A waiter cannot be assigned to more than four tables.');
    }
    if(!array_search($table, $this->tables)) {
         $this->tables[] = $table;
        // array_push($this->tables, $table);
    }
  }
  
  public function removeTable(Table $table) {
    $key = array_search($table, $this->tables);
    if ($key !== false){
        array_splice($this->tables, $key, 1);
     } else {
      throw new Exception('This table is not assigned to this waiter.');
      }
  }

  public function setTables(array $tables): self
  {
    foreach($tables as $table) {
      $this->addTable($table);
    }
    return $this;
  }
  
  public function getTables(): array
  {
    return $this->tables;
  }

}

class Table {
  private array $waiters = [];
    
  public function addWaiter(Waiter $waiter)
  {   
    $key = array_search($waiter, $this->waiters);
    if(!$key){
      $waiter->addTable($this); // thêm dòng này so vs Waiter
      array_push($this->waiters, $waiter);
    }
    // if(!array_search($waiter, $this->waiters)){
    //   // $this->waiters[] = $waiter;
    //   array_push($this->waiters, $waiter);
    //   $waiter->addTable($this);
    // }
  }
  
  public function removeWaiter(Waiter $waiter)
  {
    $key = array_search($waiter, $this->waiters);
    if($key !== false){
      array_splice($this->waiters, $key, 1);
      $waiter->removeTable($this); 
    }
    return $this;
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

