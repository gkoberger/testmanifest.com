<?php
include "indent.php";
include "words.php";

// First, split it up and get the root
$subdomain = $_GET['subdomain'];
if($subdomain) {
    $subdomain_split = explode('-', $subdomain);
    $subdomain_base = $subdomain_split[0];
}

// Output a basic manifest
if($_GET['file'] == "login") {
       include "login.php";
       exit();
}
if($subdomain) {
    // Get the JSON
    $filename = "manifests/" . $subdomain_base . ".json";
    if(file_exists($filename) && filesize($filename) > 0) {
        $fh = fopen($filename, 'r');
        $json = fread($fh, filesize($filename));
        fclose($fh);
    }
    if(!$json) {
        $data = array('name'=>'Test App ({subdomain})',
            'description'=>'This app has been automatically generated by testmanifest.com',
            'version'=>'1.0',
            'icons'=>array('16'=>'http://testmanifest.com/icon-16.png',
                           '48'=>'http://testmanifest.com/icon-48.png',
                           '128'=>'http://testmanifest.com/icon-128.png'),
            'installs_allowed_from'=>array('*'),
            'developer'=>array('name'=>'Gregory Koberger', 'url'=>'http://gkoberger.net'),
            'default_locale'=>'en');

        $json = indent(json_encode($data));
        $json = str_replace("\/", "/", $json);
    }

    if(preg_match("/(.*)\.(webapp|json)$/", $_GET['file'])) {
        header("Content-Type: application/x-web-app-manifest+json");
        $json = str_replace("{subdomain}", $subdomain, $json);
        echo $json;
        exit();
    } else {
        if(!empty($_POST)) {
            $myFile = "manifests/" . $subdomain_base . ".json";
            $fh = fopen($myFile, 'w') or die("can't open file");
            $stringData = $_POST['manifest'];
            fwrite($fh, $stringData);
            fclose($fh);
            header("Location: /manifest.webapp");
        }
        $output = "template_edit.php";
        $json = str_replace("textarea", "text-area", $json);
    }
} else {
    $random = rand(1000, 9999);
    $subdomain = $animals[rand(0, count($animals) -1)] . $random;
    $domain = "http://" . $subdomain . ".testmanifest.com";
    $manifest = $domain . "/manifest.webapp";
    $output = "template_main.php";
}
if($output) {
    include "header.php";
    include $output;
    include "footer.php";
}
?>
