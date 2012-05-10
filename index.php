<?php
include "indent.php";
include "words.php";

// First, split it up and get the root
$subdomain = $_GET['subdomain'];
if($subdomain) {
    $subdomain_split = explode('-', $subdomain);
    $subdomain_base = $subdomain_split[0];
}

function openfile($filename) {
    if(file_exists($filename) && filesize($filename) > 0) {
        $fh = fopen($filename, 'r');
        $data = fread($fh, filesize($filename));
        fclose($fh);
        return $data;
    }
    return false;
}
function writefile($filename, $data) {
    $fh = fopen($filename, 'w') or die("can't open file");
    fwrite($fh, $data);
    fclose($fh);
}

$user = false;
if($_COOKIE['browserid']) {
    $user = trim(openfile('sessions/' . $_COOKIE['browserid'] . '.data'));
}

if($subdomain) {
    $file = "locks/".$subdomain.".lock";
    $locked = trim(openfile($file));
}

// Output a basic manifest
if($_GET['file'] == "logout") {
    setcookie("browserid", "", time() - 3600, "", "testmanifest.com");
    header("Location: /");
} elseif($_GET['file'] == "login") {
    include "login.php";
    include "lock.php";
    exit();
} elseif($subdomain && $_GET['file'] == "lock") {
    $error = false;
    function error($e) {
        echo "<div class='error'><b>Error:</b> $e</div>";
        exit();
    }

    if(!$user) error('You are not logged in');
    if($_POST['action'] == "lock") {
        if($locked) error('This is already locked');
        writefile($file, $user);
        $locked = $user;
    } elseif($_POST['action'] == "unlock") {
        if($locked != $user) error('You do not own this manifest');
        unlink($file);
        $locked = false;
    }
    include "lock.php";
    exit();
}

if($subdomain) {
    // Get the JSON
    $filename = "manifests/" . $subdomain_base . ".json";
    $json = openfile($filename);
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
            if(!$locked || ($locked == $user)) {
                $file = "manifests/" . $subdomain_base . ".json";
                writefile($file, $_POST['manifest']);
                header("Location: /");
            } else {
                echo "This manifest is locked by someone other than you.";
                exit();
            }
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
