<?php

final class dbbook extends db
{
    public function __construct()
    {
        // PHP does not call the parent constructor automatically...
        parent::__construct();
    }

    public function admin_create_db()
    {
        if (!$this->admin_permit_create_drop())
            throw new Exception('Database CREATEs are prohibited by admin.');

        // The book catalogue has the minimum information
        $sql = <<<ZZEOF
CREATE TABLE books (
    book_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255) NOT NULL
)
ZZEOF;
        return $this->db_handle()->exec($sql);
    }

    public function admin_destroy_db()
    {
        if (!$this->admin_permit_create_drop())
            throw new Exception('Database DROPs are prohibited by admin.');

        $sql = "DROP TABLE IF EXISTS books";
        return $this->db_handle()->exec($sql);
    }

    // Inserts a new user $user into the DBUser table having password $pass.
    public function insert($title, $author, $price, $image)
    {
        // Create the entry to add...
        $entry = array(
          ':title' => $title,
          ':author' => $author,
          ':price' => $price,
          ':image' => $image,
        );

        // Create the SQL prepared statement and insert the entry...
        $sql = 'INSERT INTO books (title, author, price, image) VALUES (:title, :author, :price, :image)';
        $stmt = $this->db_handle()->prepare($sql);
        return $stmt->execute($entry);
    }

    // Erases an existing user $user from the DBUser table.
    public function erase($title)
    {
        $entry = array( ':title' => $title );

        // Create the SQL prepared statement and delete the entry...
        $sql = 'DELETE FROM title WHERE title = :title';
        $stmt = $this->db_handle()->prepare($sql);
        $stmt->execute($entry);
    }

    // Attempt to look up book $title in the DBbooks table. If $title
    // is not found, then FALSE is returned. Otherwise an array
    // containing the DBUser entry is returned???. The column names
    // are: "user" and "pass".
    //
    // If the user is not found or a DB error occurs FALSE is
    // returned. Otherwise an associative array for the record is returned.a
    public function lookup($title)
    {
        // Create the entry to add...
        $entry = array( ':title' => $title );

        // Create the SQL prepared statement and insert the entry...
        try
        {
            $sql = 'SELECT * FROM books WHERE title = :title';
            $stmt = $this->db_handle()->prepare($sql);
            $stmt->execute($entry);
            $result = $stmt->fetchAll();
            if (count($result) != 1)
                return FALSE;
            else
                return $result[0];
        }
        catch (PDOException $e)
        {
            return FALSE;
        }
    }

    // Look up all books in the books table. This function permits
    // PDOExceptions to leak.
    public function lookup_all()
    {
        // Create the SQL prepared statement and insert the entry...
        $sql = 'SELECT * FROM books';
        $stmt = $this->db_handle()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>
