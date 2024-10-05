<?php
function getdatabase(){
    try {
       
        $mycinema = new PDO("mysql:host=localhost;dbname=cinema;charset=utf8;port=3307", 'root', 'root');    
        $mycinema->setAttribute(PDO::ATTR_ERRMODE,PDO::
        ERRMODE_EXCEPTION);
        return $mycinema;
    } catch (PDOException $e) {
        print "error : ".$e->getMessage()."\n";
        die();
    }
}
function GetAllUser()
{
    $con = getdatabase();
    $sql = "SELECT * FROM subscription";
    $rows = $con->query($sql);
    return $rows;
}
function GetOneUser($id){
    $con = getdatabase();
    $sql = "SELECT * FROM subscription where id = '$id'";
    $stmt = $con->query($sql);
    $row = $stmt->fetchAll(); 
    if(!empty($row)){
        return $row[0];
    }
}
function CreateUser($name,$description,$price,$duration,$reduction){
    try{
        $con = getdatabase();
        $sql = "INSERT into subscription (name,description,price,duration,reduction) VALUES ('$name','$description','$price','$duration','$reduction')";
        $con->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "\n" . $e->getMessage();
    }
}
function UpdateUser($id,$name,$description,$price,$duration,$reduction)
{
    try{
        $con = getdatabase();
        $sql = "UPDATE subscription set name = '$name',description = '$description',price = '$price',duration = '$duration', reduction = '$reduction' where id ='$id'";
        $stmt = $con->query($sql);
    } catch (PDOException $e) {
        echo $sql . "\n" . $e->getMessage();
    }
}
function deleteUser($id)
{
    try{
        $con = getdatabase();
        $sql = "DELETE from subscription where id = '$id'";
        $stmt = $con->query($sql);
    } catch (PDOException $e) {
        echo $sql . "\n" . $e->getMessage();
    }
}
function newSub() : void{
    $user['id'] = "";
    $user['name'] = "";
    $user['description'] = "";
    $user['price'] = "";
    $user['duration'] = "";
    $user['reduction'] = "";

    
}


?>