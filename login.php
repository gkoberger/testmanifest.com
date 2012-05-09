<?php
    // set POST variables
    $url = 'https://browserid.org/verify';
    $fields = array(
                'assertion'=>$_REQUEST['assertion'],
                'audience'=>'http://testmanifest.com'
            );

    //url-ify the data for the POST
    foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
    rtrim($fields_string,'&');

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,count($fields));
    curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);

    //execute post
    $result = curl_exec($ch);
    echo $result;

    $data = json_decode($result);
    $session = md5($data['expires'] . time() . rand(0,1000));

    if($data['status'] == "okay") {
        $myFile = "sessions/" . $session . ".data";
        $fh = fopen($myFile, 'w') or die("can't open file");
        $stringData = $data['email'];
        fwrite($fh, $stringData);
        fclose($fh);
        echo "Setting cookie!";
        setcookie("browserid", $session);
    }

    //close connection
    curl_close($ch);
