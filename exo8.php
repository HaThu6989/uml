<?php
/**
 * Tự mình nghĩ ra 
 */
class Author {
  private string $name;
  private ?Book $book = null;
  private array $books = [];

  public function __construct($name){
    $this->name = $name;
    // $this->books = [];
  }

  /**
   * Get the value of nameBook
   */
  public function getName(): string
  {
    return $this->name;
  }

  /**
   * Set the value of nameBook
   */
  public function setName(string $name): self
  {
    $this->name = $name;

    return $this;
  }

    /**
   * Get the value of book
   */
  public function getBook(): ?Book
  {
    return $this->book;
  }

  /**
   * Set the value of book
   */
  public function setBook(?Book $book): self
  {
    $this->book = $book;

    return $this;
  }

  /**
    * Get the value of books
    */
  public function getBooks(): array
  {
      return $this->books;
  }

  /**
    * add an book
    */
  public function addBook(?Book $book): self
  {
      $this->books[] = $book;
      // array_push($this->books, $book);
      return $this;
  }
  
  public function __toString() : string 
  {
    $string = "Je suis auteur {$this->name}";
    $list = '';
    if ($this->books) {
      foreach($this->books as $book){
        $list .= $book->getNameBook().', ';
    }
      $string .= " et j'ai des livres intitulés : {$list}";
    } else {
      $string .= " et je n'ai aucun livre";
    }
    return $string;
  }
}

class Book {
  private string $nameBook;
  private ?Author $owner = null;
  
  public function __construct($nameBook){
    $this->nameBook = $nameBook;
  }

  /**
   * Get the value of nameBook
   */
  public function getNameBook(): string
  {
    return $this->nameBook;
  }

  /**
   * Set the value of nameBook
   */
  public function setNameBook(string $nameBook): self
  {
    $this->nameBook = $nameBook;

    return $this;
  }

  /**
   * Get the value of owner
   */
  public function getOwner(): ?Author
  {
    return $this->owner;
  }

  /**
   * Set the value of owner
   */
  public function setOwner(?Author $owner): self
  {
    $this->owner = $owner;

    return $this;
  }

  public function __toString() : string 
  {
    $string = "C'est un livre intitulé {$this->nameBook}";
    if ($this->owner) {
      $string .= " et l'auteur est {$this->owner->getName()}";
    } else {
      $string .= " et l'auteur est inconnu";
    }
    return $string;
  }

}

$book1 = new Book("Harry Porter");
$book2 = new Book("Les Animaux fantastiques");
$book3 = new Book("Maison des enfants");
$author1 = new Author("J. K. Rowling");

$book1->setOwner($author1);

$author1->addBook($book2);
$author1->addBook($book3);

echo $book1;
echo "<br>";
echo $author1;
// Je suis auteur J. K. Rowling et je n'ai aucun livre
// Vì thiếu $author1->setBook($book2);
echo "<br>";
// var_dump($author1->getBooks());
