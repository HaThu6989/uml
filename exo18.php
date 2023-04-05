<?php

class Waiter {
  const MAX_TABLES = 4;

  private array $tables=[];

  public function addTable (Table $table): self
  {
    if(count($this->tables) === self::MAX_TABLES) {
      throw new Exception("Waiter can't have more than " . self::MAX_TABLES . " tables");
    }
    array_push($this->tables, $table);
  }
  
  public function removeTable(Table $table): self
  {
    $key = array_search($table, $this->tables);
    if ($key !== false) {
        array_splice($this->tables, $key, 1);
    } else {
        throw new Exception('This table is not served by this waiter.');
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
  private $waiters = [];
  
  public function getWaiters(): array
  {
    return $this->waiters;
  }

  public function setWaiters(array $waiters): self
  {
    foreach($waiters as $waiter) {
      $this->addWaiter($waiter);
    }
   return $this;
  }

  public function addWaiter(Waiter $waiter): self
  {
      $this->waiters[] = $waiter;
      $waiter->addTable($this); 
      return $this;
  }

  public function removeWaiter(Waiter $waiter): self
  {
      $key = array_search($Waiter, $this->waiters);
      unset($this->waiters[$key]);
      $waiter->removeTable($this); 
      return $this;
  }
}