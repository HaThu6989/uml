<?php

class Waiter {
  const MAX_TABLES = 4;

  private string $name;
  private array $tables = [];

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

  public function addTable(Table $table) {
    if (count($this->tables) >= 4) {
        throw new Exception('A waiter cannot be assigned to more than four tables.');
    }
    if(!in_array($table, $this->tables)){
        $this->tables[] = $table;
    }
}
  
  public function removeTable(Table $table) {
    $key = array_search($table, $this->tables);
    if ($key !== false) {
        array_splice($this->tables, $key, 1);
    } else {
        throw new Exception('This table is not assigned to this waiter.');
    }
  }

  public function setTables(array $tables): self
  {
    foreach($tables as $table) {
      // $this->addTable($table);
      array_push($this->tables, $table);
    }
    return $this;
  }
  
  public function getTables(): array
  {
    return $this->tables;
  }
}


class Table {
  private string $tableNumber;

  public function __construct(string $tableNumber) 
  {
      $this->tableNumber = $tableNumber;
  }

  public function getTableNumber(): string
  {
      return $this->tableNumber;
  }

  public function setTableNumber(string $tableNumber): self
  {
      $this->tableNumber = $tableNumber;
      return $this;
  }
}

$waiter1 = new Waiter('Paul');
$waiter2 = new Waiter('Marie');
$table1 = new Table("table 1");
$table2 = new Table("table 2");
$table3 = new Table("table 3");
$table4 = new Table("table 4");
$table5 = new Table("table 5");

$waiter1->addTable($table1);
$waiter1->addTable($table2);
$waiter1->addTable($table3);
$waiter1->addTable($table4);
// $waiter1->addTable($table5);
var_dump($waiter1);

echo "<br><br>";
$waiter1->removeTable($table1);
var_dump($waiter1);