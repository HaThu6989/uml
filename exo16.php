<?php

class Waiter {
  const MAX_TABLES = 4;

  private array $tables=[];
  
  public function addTable (Table $table): bool
  {
    if(count($this->tables) === self::MAX_TABLES) {
      throw new Exception("Waiter can't have more than " . self::MAX_TABLES . " tables");
    }
    if(!in_array($table, $this->tables, true)) {
      $this->tables[] = $table;
      return true;
    }
    return false;
  }
  
  public function removeTable(Table $table): bool
  {
    $key = array_search($table, $this->tables, true);
    if($key !== false) {
      unset($this->tables[$key]);
      return true;
    }
    return false;
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
}
