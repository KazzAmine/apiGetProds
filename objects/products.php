<?php
class products{
    private $cnx;
    private $tableName="products";

    //table columns
    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $category_name;
    public $created;

    //constructor
    public function __construct($db)
    {
        $this->cnx=$db;
    }

    //read fucntion
    public function read(){
        //select products

        $query="
                SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->tableName . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            ORDER BY
                p.created DESC
        ";
        $stmt=$this->cnx->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    

}