<?php

class Users extends QueryBuilder {
	public function __construct($pdo)
	{
	  parent::__construct($pdo);
	  $this->table = 'users';
	  $this->column = array('email', 'password', 'usertype', 'status','token');
	  $this->values = array('email', 'password');
	}
	
	public function RegisterUser($email, $password, $usertype, $token, $status) {
		
		$column = array('email', 'password', 'usertype','token', 'status');
		$values = [
			':email' => "'".$email."'",
			':password' => "'".$password."'",
			':usertype' => "'".$usertype."'",
			':token' => "'".$token."'",
			':status' => "'".$status."'",
		];
		$insert = parent::insert($this->table, $column, $values);
      $insert->execute();
	}
	public function UserDetails($u_id){
        $column=array('u_id');
        $values=[
            ':u_id'=>"'".$u_id."'"];
        $select_stmt = parent::select($this->table,$column, $values);
		$select_stmt->execute();
        $bdata=$select_stmt->fetch(PDO::FETCH_OBJ);
        return $bdata;

    }
	public function SelectUser($email){
		
		$column = array('email');
    $values=[
      ':email'=>"'".$email."'"];
        $select_stmt = parent::select($this->table,$column, $values);
		return $select_stmt;
		}

	public function activate($token,$status){
		$column= ['status'];
		$values = [
				':status'=>"'".$status."'"
			];
		$i = 0;
      	$upda = [];
    	$queryArray = array_keys($values);
      	while (isset($column[$i])) {
        	$upda += [$column[$i] => $queryArray[$i]];
        	$i++;
    	}
		// $upda = [
		// 	':status'=>"'".$status."'"
		// ];
		$target=[
			':token'=>"'".$token."'"];
		parent::update($this->table,$upda,'token',$target);	
			
	}
	public function updatePass($token,$password){
		$column= array('password');
		$target=[
			':token'=>"'".$token."'"];
		parent::update($this->table,['password'=>$password],'token',$token);	
			
	}
	public function bookAction($action,$b_id,$u_id) {
		
		$column = array('action','b_id','u_id');
		$values = [
			':u_id' => "'".$u_id."'",
			':b_id' => "'".$b_id."'",
			':action' => "'".$action."'"
		];
		$insert = parent::insert('has_book', $column, $values);
      $insert->execute();

		
	}
	public function userHasBook($u_id){
        $column=array('u_id');
        $values=[
            ':u_id'=>"'".$u_id."'"];
        $select_stmt = parent::select('has_book',$column, $values);
		$select_stmt->execute();
        $bdata=$select_stmt->fetch(PDO::FETCH_OBJ);
        return $bdata;

    }
	public function issueAction($u_id,$action){
        $column=array('u_id', 'action');
        $values=[
            ':u_id'=>"'".$u_id."'",
			':action'=>"'".$action."'"];
        $select_stmt = parent::select('has_book',$column, $values);
		// $select_stmt->execute();
        // $bdata=$select_stmt->fetch(PDO::FETCH_OBJ);
        return $select_stmt;

    }
	public function selectjoinon($u_id,$issue){
		$column=array('u_id','action');
		$condition = [':u_id'=>"'".$u_id."'",
		':action'=>"'".$issue."'"];
		return parent::selectjoin('has_book','books','books.b_id','has_book.b_id',$column,$condition);
	  }
}
?>