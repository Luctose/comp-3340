<?php

final class dbcart extends db
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

        // The cart has 2 foreign keys and both need to be primary keys
        // to ensure 1 user can have many books that aren't repeated. (simplifies)
        $sql = <<<ZZEOF
CREATE TABLE cart (
    user_id INT NOT NULL,
    book_id INT NOT NULL,
    quantity INT DEFAULT 1,
    PRIMARY KEY (user_id, book_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (book_id) REFERENCES books(book_id)
) 
ZZEOF;
        return $this->db_handle()->exec($sql);
    }

    public function admin_destroy_db()
    {
        if (!$this->admin_permit_create_drop())
            throw new Exception('Database DROPs are prohibited by admin.');

        $sql = "DROP TABLE IF EXISTS cart";
        return $this->db_handle()->exec($sql);
    }

    // Inserts automated cart items (for debugging)
    // $user_id is going to be redundant but it works
    public function insert($user_id, $book_id, $quantity)
    {
        // Create the entry to add...
        $entry = array(
          ':user_id' => $user_id,
          ':book_id' => $book_id,
          ':quantity' => $quantity,
        );

        // Create the SQL prepared statement and insert the entry...
        $sql = 'INSERT INTO cart (user_id, book_id, quantity) VALUES (:user_id, :book_id, :quantity)';
        $stmt = $this->db_handle()->prepare($sql);
        return $stmt->execute($entry);
    }

    // Erases an existing book $book_id
    public function eraseRow($user_id, $book_id)
    {
        $entry = array(
            ':user_id' => $user_id,
            ':book_id' => $book_id,
        );

        // Create the SQL prepared statement and delete the entry...
        $sql = 'DELETE FROM cart WHERE user_id = :user_id AND book_id = :book_id';
        $stmt = $this->db_handle()->prepare($sql);
        $stmt->execute($entry);
    }

    // this function will erase any rows with instance of this book
    public function eraseBook($book_id)
    {
        $entry = array(
            ':book_id' => $book_id,
        );

        // Create the SQL prepared statement and delete the entry...
        $sql = 'DELETE FROM cart WHERE book_id = :book_id';
        $stmt = $this->db_handle()->prepare($sql);
        $stmt->execute($entry);
    }

     // this function will erase any instance of the user
    public function eraseUser($user_id)
    {
        $entry = array(
            ':user_id' => $user_id,
        );

        // Create the SQL prepared statement and delete the entry...
        $sql = 'DELETE FROM cart WHERE user_id = :user_id';
        $stmt = $this->db_handle()->prepare($sql);
        $stmt->execute($entry);
    }

    // Attempt to look up user in the DBcart table. If 
    // is not found, then FALSE is returned. Otherwise an array
    // containing the DBcart entry is returned.
    //
    // If the user is not found or a DB error occurs FALSE is
    // returned. Otherwise an associative array for the record is returned.
    public function lookup($user_id)
    {
        $entry = array( 
            ':user_id' => $user_id,
        );

        // Create the SQL prepared statement and insert the entry...
        try
        {
            $sql = 'SELECT * FROM cart WHERE user_id = :user_id';
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

    // Look up all users in the users table. This function permits
    // PDOExceptions to leak.
    public function lookup_all()
    {
        // Create the SQL prepared statement and insert the entry...
        $sql = 'SELECT * FROM cart';
        $stmt = $this->db_handle()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>
