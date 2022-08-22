<?PHP
class database{
    private $host="localhost";
    private $username="root";
    private $password="";
    private $db_name="api_db";
    public $cnx;

    public function getCnx(){
        $this->cnx=null;

        try{
            $this->cnx=new PDO("mysql:host=".$this->host.";db_name".$this->db_name,$this->username,$this->password);
            $this->cnx->exec("set names utf-8");
        }catch(PDOException $ex){
            echo $ex->getMessage();
        }
        return $this->cnx;
    }

}