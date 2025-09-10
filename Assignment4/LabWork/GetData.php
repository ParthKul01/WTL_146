<?php

 $con = new mysqli('localhost','root','','parth') ;

 $state = $con->prepare("Select * from student") ;

 if($state->execute()) {
    
    $result  = $state->get_result() ;
    $data  =array() ;

    while($row = $result->fetch_assoc()) {
        $data[] = $row ;
    }

    header('Content-Type: application/json');
    echo json_encode($data);

 }  else {
    echo json_encode([]);
}


?>