
<?php

class QueryBuilder {

	protected $pdo;


	public function __construct($pdo) {
		$this->pdo = $pdo;

	}
	public $column = [];
    public $values = [];
	public function selectLimit($table,$sort,$offset,$limit) {
		$statement = $this->pdo->prepare("select * from {$table} order by {$sort} limit {$offset},{$limit}");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}
	public function selectAll($table) {
		$statement = $this->pdo->prepare("select * from {$table}");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}
	public function select($table, $column, $conditional)
     {
         $column = implode(',', $column);
         $conditional = implode(',', $conditional);
         $select_stmt = $this->pdo->prepare("SELECT * FROM ${table} WHERE (${column}) = (${conditional})");
		 //$select_stmt->execute();
         return $select_stmt;
     }
	 public function selectjoin($table,$tablel,$cname,$cnamel, $column, $conditional)
     {
         $column = implode(',', $column);
         $conditional = implode(',', $conditional);
         $stmt = $this->pdo->prepare("SELECT * FROM ${table} INNER JOIN $tablel ON (${cname}) = (${cnamel}) WHERE (${column}) = (${conditional})");
         return $stmt;
     }

	 public function update($table, $upda, $bid, $target)
     {
        $tt = implode(',', $target);
        $str=',';
        foreach ($upda as $key => $value){
            $str=$str.$key."=${value},";
        }
        $str=trim($str,',');
        
     return $this->pdo->prepare("UPDATE $table SET $str WHERE (${bid}) = (${tt}) ");
            
            
      }
	  public function DeleteAll($table,$bid,$target){
        $t = implode(',',$bid);
          $tt = implode(',',$target);
         $sql =  $this->pdo->prepare("DELETE FROM $table WHERE (${t}) = (${tt})");
         $sql->execute();
      }
	public function insert($table, $column, $values) {
		$column = implode(',', $column);
    $values = implode(',', $values);
    $sql = $this->pdo->prepare("INSERT INTO $table(${column})  VALUES (${values})");
	return $sql;
	}
	public function search($table,$column,$column2,$values){
		$column = implode(',', $column);
    	$column2 = implode(',', $column2);
		$s = $this->pdo->prepare("SELECT * FROM ${table} WHERE (${column}) LIKE '%".$values."%' OR (${column2}) LIKE '%".$values."%' ");
		return $s;

	}
	
}
