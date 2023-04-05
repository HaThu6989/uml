<?php

class Waiter {
  private array $tables=[];
  private string $name;

  public function getName(): string
  {
      return $this->name;
  }

  
  public function setName(string $name): self
  {
      $this->name = $name;
      return $this;
  }

  public function addTable (Table $table): self
  {
    if(!array_search($table, $this->tables) && count($this->tables) < 4) {
        array_push($this->tables, $table);
        return $this;
    } else {
        throw new Exception('Maximum 4 tables for 1 waiter');
    }
  }
  
  public function removeTable(Table $table): self
  {
    $key = array_search($table, $this->tables);
    if ($key !== false) {
        array_splice($this->tables, $key, 1);
        return $this;
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
  private array $waiters = [];
  
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
      array_push($this->waiters, $waiter);
      return $this;
  }

  public function removeWaiter(Waiter $waiter): self
  {
      $key = array_search($waiter, $this->waiters);
      unset($this->waiters[$key]);
      $waiter->removeTable($this); 
      return $this;
  }
}