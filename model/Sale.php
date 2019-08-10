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
}
