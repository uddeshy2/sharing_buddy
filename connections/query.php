<?php

class query{
    
function selectone($conn,$table,$where){
    $query="SELECT * FROM $table where $where"; 
    $exe=mysqli_query($conn,$query);
    $result=mysqli_fetch_array($exe);
    return $result;
}   
    
function selectall($conn,$table){
    $query="SELECT * FROM $table"; 
    $exe=mysqli_query($conn,$query);
    return $exe;
}   
    
function selectjoin($conn,$table,$where){
    $query="SELECT * FROM $table where $where"; 
    $exe=mysqli_query($conn,$query);
    return $exe;
}   
function rowcount($conn,$table,$where){
    $query="select * from $table where $where";
    $exe=mysqli_query($conn,$query);
    $tot=mysqli_num_rows($exe);
    return $tot;
}
function insertrow($conn,$query,$table){
    $query="INSERT INTO $table set $query";
    $exe=mysqli_query($conn,$query);
    $result="Inserted";
    return $result;
}
function updaterow($conn,$table,$query,$where){
    $query="UPDATE ".$table." SET ".$query." WHERE ".$where;
    $exe=mysqli_query($conn,$query);
    $result="Update!";
    return $result;
}
function singledelete($conn,$table,$where){
    $query="DELETE FROM ".$table." WHERE ".$where;
    $exe=mysqli_query($conn,$query);
    $result="Deleted!";
    return $result;
}
}


//echo "hello";
?>