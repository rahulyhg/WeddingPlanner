<?php
    require ('connect_oo.php'); #connect to database

    #values initialised
    $today = date("Y-m-d H:i:s");    
    $firstName = "";
    $lastName = "";
    $email = "";
    $address = "";
    $postcode = "";
    $telephone = "";
    $weddingDate = "";
    $weddingLocation = "";
    $specialRequirements = "";


    $firstName = $mysqli->real_escape_string($_POST['firstName']);
    $lastName = $mysqli->real_escape_string($_POST['lastName']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $address = $mysqli->real_escape_string($_POST['address']);
    $postcode = $mysqli->real_escape_string($_POST['postcode']);
    $telephone = $mysqli->real_escape_string($_POST['telephone']);
    $weddingDate = $mysqli->real_escape_string($_POST['weddingDate']);
    $weddingLocation = $mysqli->real_escape_string($_POST['weddingLocation']);
    $specialRequirements = $mysqli->real_escape_string($_POST['specialRequirements']);

    echo $firstName +"\n";
    echo $lastName+"\n";
    echo $email+"\n";
    echo $address+"\n";
    echo $postcode+"\n";
    echo $telephone+"\n";
    echo $weddingDate+"\n";
    echo $weddingLocation+"\n";
    echo $specialRequirements+"\n";
    echo $today+"\n";

    #query
        $stmt = $mysqli->prepare("INSERT INTO inquiries(submit_date, first_name,last_name,address,postcode,email,phone,wedding_date,wedding_location,special_req) VALUES (?,?,?,?,?,?,?,?,?,?);");
        $stmt->bind_param('ssssssssss', $today, $firstName, $lastName, $address, $postcode, $email, $telephone, $weddingDate, $weddingLocation, $specialRequirements);
        $OK = $stmt->execute();
        #if query has been executed
        if ($OK)
            echo "<p>Student has been enrolled</p>";
        else
            echo "<p> Something went wrong :(</p>";

        $stmt->close();
        $mysqli->close();
?>