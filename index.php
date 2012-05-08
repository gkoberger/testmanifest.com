<?php
// First, split it up and get the root
$subdomain = $_GET['subdomain'];
if($subdomain) {
    $subdomain_split = explode($subdomain, '-');
    $subdomain_base = $subdomain_split[0];
}

// Output a basic manifest
if(($_GET['file'] == "manifest.webapp" || $_GET['file'] == "manifest.json") && $subdomain) {
    if(strpos($_SERVER["HTTP_USER_AGENT"], "Python") !== false) {
        header("Content-Type: application/x-web-app-manifest+json");
    }

    $data = array('name'=>'Test App ('.$subdomain.')',
        'description'=>'This app has been automatically generated by testmanifest.com',
        'version'=>'1.0',
        'icons'=>array('16'=>'icon-16.png',
                       '48'=>'icon-48.png',
                       '128'=>'icon-128.png'),
        'installs_allowed_from'=>'http://marketplace.mozilla.org',
        'developer'=>array('name'=>'Gregory Koberger', 'url'=>'http://gkoberger.net'),
        'default_locale'=>'en');

    echo json_encode($data);

    /*
    $myFile = $_POST['subdomain'] . ".json";
    $fh = fopen($myFile, 'w') or die("can't open file");
    $stringData = json_encode($_SERVER);
    fwrite($fh, $stringData);
    fclose($fh);
     */
} else {
    include "words.php";
    $random = rand(1000, 9999);
    $manifest = "http://" . $animals[rand(0, count($animals) -1)] . $random . ".testmanifest.com/manifest.webapp";
?>
<div style="text-align: center;">
    <h1>Your random manifest is&hellip;</h1>
    <input type="text" id="thingy" value="<?= $manifest ?>"><br>
    <div style="color: #999; font-size: 0.9em; padding-top: 10px;">
    Absolutely any subdomain will work &middot; <a href="/">get another</a>
    </div>
</div>
<style>
    body {
        font-family: helvetica, arial;
    }
    input {
        border: 1px solid #BBBBBB;
        border-radius: 5px 5px 5px 5px;
        box-shadow: 0 3px #EEEEEE inset;
        padding: 8px;
        width: 500px;
        text-align: center;
    }
    a, a:visited {
        color: #000;
    }
    a:hover {
        color: #555;
    }
</style>
<script>
document.getElementById('thingy').focus();
document.getElementById('thingy').select();
</script>
<?
}
