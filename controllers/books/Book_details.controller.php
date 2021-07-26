<?php
if (!isset($_SESSION['email'])) {
	header("location:/login");
	exit;
}
if(isset($_GET['b_id'])){
$b_id=$_GET['b_id'];
$Book_detail=App::get('books')->bookDetails($b_id);
require './view/Book_details.php';
}else{
    echo "no id is there";
}
//code for book issue 
if(isset($_POST['mark'])){
    $action=$_POST['action'];
    if($action=="reading"){
        $hasbook = App::get('users')->issueAction($_SESSION['u_id'],$action);
        $hasbook->execute();
        $udata=$hasbook->fetch(PDO::FETCH_OBJ);
        $count = $hasbook->rowCount();
        // var_dump($count);
        // die;
        if($count>0){
            echo "You already have one book issued , please return it first to issue another book!";
        }else{
            $b_id=$Book_detail->b_id;
	        $u_id=$_SESSION['u_id'];
            $cont=$Book_detail->total_count;
            $up=$cont-1;
            $ct=App::get('books')->CountUp($up,$b_id);
            $rr=$ct->execute([':total_count'=>$up]);
            App::get('users')->bookAction($u_id,$b_id,$action);
        }

    }elseif($action=='returned'){
            $b_id=$Book_detail->b_id;
	        $u_id=$_SESSION['u_id'];
            $cont=$Book_detail->total_count;
            $up=$cont+1;
            $ct=App::get('books')->CountUp($up,$b_id);
            $rr=$ct->execute([':total_count'=>$up]);
            $issue='reading';
            App::get('books')->Deleteissuedbook($u_id,$issue);
            App::get('users')->bookAction($u_id,$b_id,$action);
    }else{
        $b_id=$Book_detail->b_id;
        $u_id=$_SESSION['u_id'];
        App::get('users')->bookAction($u_id,$b_id,$action);    
    }
    
}
?>