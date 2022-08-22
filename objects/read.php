<?PHP
    header("allow-control-allow-origin:*");
    header("Content-Type:application/json; charset=UTF-8");

    //get connection
    require_once "../config/database.php";
    require_once "../objects/products.php";
    //initialisation
    $database=new database();
    $db=$database->getCnx();
    $prod=new products($db);

    $stmt=$prod->read();
    $rowCount=$stmt->rowCount();
    if($rowCount>0){
        $arrProd=array();
        $arrProd["product"]=array();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $prodItem=array(
                "id" => $id,
                "name" => $name,
                "description" => html_entity_decode($description),
                "price" => $price,
                "category_id" => $category_id,
                "category_name" => $category_name
            );
            array_push($arrProd["product"],$prodItem);
        }
        http_response_code(200);
        echo json_encode($arrProd);
    }
