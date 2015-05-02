<?php
    require ('connect_oo.php'); #connect to database
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    #values initialised
    $now = date("Y-m-d H:i:s");    
    $today = date("Y-m-d");
    $firstName = $mysqli->real_escape_string($_POST['first-name']);
    $lastName = $mysqli->real_escape_string($_POST['last-name']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $address = $mysqli->real_escape_string($_POST['address']);
    $postcode = $mysqli->real_escape_string($_POST['postcode']);
    $telephone = $mysqli->real_escape_string($_POST['telephone-number']);
    $weddingDate = $mysqli->real_escape_string($_POST['wedding-date']);
    $weddingLocation = $mysqli->real_escape_string($_POST['wedding-location']);
    $specialRequirements = $mysqli->real_escape_string($_POST['special-requirements']);


    echo "<ul>";
    #validate first name
    if(empty ($firstName) || strlen($firstName) > 35 || !preg_match("/^[a-zA-Z ,.'-]+$/",$firstName)){
        echo "<li>Please enter a valid first name</li>";
    }else{

    }

    #validate last name
    if(empty ($lastName || strlen($firstName) > 35 || !preg_match("/^[a-zA-Z ,.'-]+$/",$lastName))){
        echo "<li>Please enter a valid last name</li>";
    }

    #validate email
    if(empty ($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 254){
        echo "<li>Please enter a valid email</li>";
    }

    #validate address
    if(strlen($address) > 255){
        echo "<li>Please enter a valid address</li>";   
    }

    #validate telephone
    if(!empty($telephone) && !preg_match("/^[0-9]{11}$/",$telephone)){
        echo "<li>Please enter a valid telephone number</li>";
    }
    
    #validate postcode
    if(!empty($postcode) && !preg_match("/^([A-PR-UWYZ0-9][A-HK-Y0-9][AEHMNPRTVXY0-9]?[ABEHMNPRVWXY0-9]? {1,2}[0-9][ABD-HJLN-UW-Z]{2}|GIR 0AA)$/",$postcode)){
        echo "<li>Please enter a valid UK postcode</li>";   
    }

    #validate wedding date
    if(empty ($weddingDate) || !checkValidDate($weddingDate) || $weddingDate < $today){
        echo "<li>Please enter a valid date in the future</li>";
    }

    #validate wedding location
    if(empty ($weddingLocation) || strlen($firstName) > 50){
        echo "<li>Please enter a valid wedding location</li>";
    }
    
    echo "</ul>";

    #query
    if($stmt = $mysqli->prepare("INSERT INTO inquiries(submit_date, first_name, last_name, address, postcode, email, phone, wedding_date, wedding_location, special_req) VALUES (?,?,?,?,?,?,?,?,?,?);")){
        $stmt->bind_param('ssssssssss', $now, $firstName, $lastName, $address, $postcode, $email, $telephone, $weddingDate, $weddingLocation, $specialRequirements);
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

    #returns boolean depending on validity of date
    function checkValidDate( $postedDate) {
        if ( preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$postedDate) ) {
        list( $year , $month , $day ) = explode('-',$postedDate);
        return( checkdate( $month , $day , $year ) );
        } else {
        return( false );
        }
    }


?>