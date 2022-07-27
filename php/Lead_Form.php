<?php

    $servername = "premium87.web-hosting.com";
    $dBUserName = "mmachbon_UK_Dessertioner";
    $dBPassword = "gc_J4Kvz22VH";
    $dBName = "mmachbon_UK_Dissertation";
    
    $conn = mysqli_connect($servername, $dBUserName, $dBPassword, $dBName);
    
    if (!$conn){
        die("Connection Failed: " .mysqli_connect_error());
    } 
    // leads_sbmit_btn
    if(isset($_POST["leads_sbmit_btn"])){
        $Lead_Name = $_POST["Lead_Name"];
        $Lead_Email = $_POST["Lead_Email"];
        $Lead_Phone = $_POST["Lead_Phone"];
        $Lead_Subject = $_POST["Lead_Subject"];
        $Lead_Message = $_POST["Lead_Message"];
        
        $insert_Query = "INSERT INTO `Lead_Table`(`Lead_Name`, `Lead_Email`, `Lead_Phone`, `Lead_Subject`, `Lead_Message`) VALUES ('$Lead_Name', '$Lead_Email', '$Lead_Phone', '$Lead_Subject', '$Lead_Message')";
        
        if(mysqli_query($conn, $insert_Query)){
        //     $ClientName = $_POST["Lead_Name"];
        // $PhoneNumber = $_POST["Lead_Phone"];
        // $EmailAddress = $_POST["Lead_Email"];
        // $SelectedBrand = "UK Dissertation";
        // $LeadComments = $_POST["Lead_Message"];
        // $UserName = "From PPC";
        
        // $url = "https://mmactd.com/assets/php/APIs/api-insert-data.php"; 
        // $client = curl_init($url);
        // $form_data = array(
        //                         'ClientName'  => $ClientName,
        //                         'PhoneNumber' => $PhoneNumber,
        //                         'EmailAddress'  => $EmailAddress,
        //                         'SelectedBrand' => $SelectedBrand,
        //                         'LeadComments'  => $LeadComments,
        //                         'UserName' => $UserName
        //                     );
        // curl_setopt($client, CURLOPT_POST, true);
                    
        // curl_setopt($client, CURLOPT_POSTFIELDS, json_encode($form_data));
                    
        // curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
                    
        // $response = curl_exec($client);
                    
        // curl_close($client);
            header('location: /Thank-You.php');
            exit();
        } else {
            echo mysqli_error($conn);
        }
    }
?>