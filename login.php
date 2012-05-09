<?php
    // set POST variables
    $url = 'https://browserid.org/verify';
    $fields = array(
                'assertion'=>$_REQUEST['assertion'],
                'audience'=>'http://' . $subdomain . '.testmanifest.com'
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
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //execute post
    $result = curl_exec($ch);
    $data = json_decode($result, true);
    $session = md5($data['expires'] . time() . rand(0,1000));

    if($data['status'] == "okay") {
        $file = "sessions/" . $session . ".data";
        $fh = fopen($file, 'w') or die("can't open file");
        $stringData = $data['email'];
        fwrite($fh, $stringData);
        fclose($fh);
        setcookie("browserid", $session, time()+3600, "", ".testmanifest.com");
    }

    //close connection
    curl_close($ch);
