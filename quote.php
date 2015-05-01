<?php
    require ('connect_oo.php'); #connect to database
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    #values initialised
    $today = date("Y-m-d H:i:s");    
    
    $firstName = $mysqli->real_escape_string($_POST['firstName']);
    $lastName = $mysqli->real_escape_string($_POST['lastName']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $address = $mysqli->real_escape_string($_POST['address']);
    $postcode = $mysqli->real_escape_string($_POST['postcode']);
    $telephone = $mysqli->real_escape_string($_POST['telephone']);
    $weddingDate = $mysqli->real_escape_string($_POST['weddingDate']);
    $weddingLocation = $mysqli->real_escape_string($_POST['weddingLocation']);
    $specialRequirements = $mysqli->real_escape_string($_POST['specialRequirements']);
    $status = "current";
    $gender = "M";

    echo "
<ul>
    <li>$firstName</li>
    <li>$lastName</li>
    <li>$email</li>
    <li>$address</li>
    <li>$postcode</li>
    <li>$telephone</li>
    <li>$weddingDate</li>
    <li>$weddingLocation</li>
    <li>$specialRequirements</li>
    <li>$today</li>
</ul>
";
   
    #query
        if($stmt = $mysqli->prepare("INSERT INTO inquiries(submit_date, first_name, last_name, address, postcode, email, phone, wedding_date, wedding_location, special_req) VALUES (?,?,?,?,?,?,?,?,?,?);")){
            $stmt->bind_param('ssssssssss', $today, $firstName, $lastName, $address, $postcode, $email, $telephone, $weddingDate, $weddingLocation, $specialRequirements);
            $OK = $stmt->execute();
                    #if query has been executed
        if ($OK)
            echo "
<p>Your quote has been processed</p>
";
        else
            echo "
<p>Something went wrong :(</p>
";

        $stmt->close();

        }else{
             printf("Errormessage: %s\n", $mysqli->error);
        }
        $mysqli->close();
    }
?>