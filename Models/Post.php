<?php
/*
 * Simple Posts class used by API CRUD operations 
 * 
 */

class Posts extends Database{
    //DB table
    private static $table;
    // Post Properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;
    public $updated_at;

    // Constructor with DB
    public function __construct()
    {
        self::$table = 'posts';
    }

    //Create Post
    public function create(){
        // Create query
        $query = "INSERT INTO " . self::$table . " SET title = :title, body = :body, author = :author, category_id = :category_id ";
        //$query = "INSERT INTO `" . self::$table . "` (`category_id`, `title`, `body`, `author`) VALUES (`:category_id`, `:title`, `:body`, `:author`);";

        $this->stripOutHTML();
        $params = $this->setParamsArr();
        $stmt = parent::exeQuery($query, $params);

        if($stmt){
            return true;
        }else{
            // print error if something went wrong
            printf("Create Error: %s. \n", $stmt->error);
            return false;
        }
    }

    // Read Posts
    public function read(){
        //Query
        $query = "SELECT c.name AS category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at,p.updated_at FROM ".self::$table ." p LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.created_at DESC";
        // Call to parent method that connects to DB, executes the query and returns data result set
        return parent::exeQuery($query);
    }

    // Read a single Posts via ID
    public function read_single(){
        //Query
        $query = "SELECT c.name AS category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at,p.updated_at FROM ".self::$table ." p LEFT JOIN categories c ON p.category_id = c.id WHERE p.id = ? LIMIT 0,1";
        // Call to parent method that connects to DB, executes the query and returns data result set
        
        $row = parent::exeQuery($query, array($this->id));
        //$row = $stmt->fetch(PDO::FETCH_ASSOC);
        // Set properties
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];
        $this->title = $row['title'];
        $this->body = $row['body'];
        $this->author = $row['author'];
        $this->created_at = $row['created_at'];
        $this->updated_at = $row['updated_at'];
    }

    // Update a Post via ID
    public function update(){
        $query = "UPDATE " . self::$table . "
            SET title = :title, category_id = :category_id, body = :body, author= :author
            WHERE id = :id";

        $this->stripOutHTML();
        $params = $this->setParamsArr();
        $params['id'] = $this->id;
        $stmt = parent::exeQuery($query, $params);
        
        if($stmt){
            return true;
        }else{
            // print error if something went wrong
            printf("Update Error: %s. \n", $stmt->error);
            return false;
        }

    }

    public function delete(){
        // Create query
        $query = "DELETE FROM " . self::$table . " WHERE id = :id";

        $this->id = htmlspecialchars(strip_tags($this->id));

        //Run DELETE statment
        $stmt = parent::exeQuery($query, array(':id'=>$this->id));
        
        if($stmt){
            return true;
        }else{
            // print error if something went wrong
            printf("Update Error: %s. \n", $stmt->error);
            return false;
        }

    }

    private function stripOutHTML(){
        //Strip out any HTML tags
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->id = htmlspecialchars(strip_tags($this->id));
    }

    private function setParamsArr(){
        return [
            ':category_id'=>$this->category_id,
            ':title'=>$this->title,
            ':body'=>$this->body,
            ':author'=>$this->author,
        ];
        //return $p;
    }

}

?>