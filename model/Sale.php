<?php
namespace Model;
use Model\Model;

class Sale extends Model
{
    protected $table   = "sale";
    private $comission = 8.5;
    
    private function calculateComission(float $value_sale)
    {
        $total_comission = ($value_sale * 8.5) / 100;
        return $total_comission;
    }

    public function registerSale(array $fields)
    {   
       
        $total_value         = $this->calculateComission($fields["salevalue"]);
        $fields["comission"] = \round($total_value, 2);
        
        $sql = "INSERT INTO sale(salevalue, comission, id_salesman)
                VALUES(:salevalue, :comission, :id_salesman)";
        
        
        $insertSale = $this->database->prepare($sql);
        $result     = $insertSale->execute($fields);

        return $result;
    }
    public function getAllSales()
    {
        $sql = "SELECT sale.id, comission, salevalue, datesale, salesman.name, salesman.email
                FROM sale INNER JOIN salesman ON sale.id_salesman = salesman.id ORDER BY datesale DESC LIMIT 10";
        
        $join = $this->database->prepare($sql);
        $join->execute();
        
        return $join->fetchAll();
    }
    public function getSalesmanSale(int $salesman_id)
    {
        $sql = "SELECT sale.id, comission, salevalue, datesale, salesman.name, salesman.email
                FROM sale INNER JOIN salesman ON sale.id_salesman = salesman.id WHERE sale.id_salesman = ?";

        $join = $this->database->prepare($sql);
        $join->bindValue(1, $salesman_id);
        $join->execute();

        return $join->fetchAll();

    }
    public function boxClosingSaveLog($date_closing)
    {
        $sql = "INSERT INTO boxclosinglog(dateclosing, valueofbox) 
                VALUES(?, (select sum(salevalue) from sale 
                WHERE DATE_FORMAT(datesale, '%Y-%m-%d-%H-%m-%s') LIKE '%$date_closing%'))
             ";
        $insert_total_value = $this->database->prepare($sql);
        $insert_total_value->bindValue(1, $date_closing);
        $result             = $insert_total_value->execute();
        
        return $result;
    }
    public function returnBoxClosingValue()
    {
        $sql        = "SELECT SUM(valueofbox) AS total FROM boxclosinglog  ORDER BY dateclosing DESC LIMIT 1";
        $select_sum = $this->database->prepare($sql);
        $select_sum->execute();
        
        return $select_sum->fetch();
    }
}
