<?php
// First, split it up and get the root
$subdomain = $_GET['subdomain'];
if($subdomain) {
    $subdomain_split = explode($subdomain, '-');
    $subdomain_base = $subdomain_split[0];
}

// Output a basic manifest
if(($_GET['file'] == "manifest.webapp" || $_GET['file'] == "manifest.json") && $subdomain) {
    header("Content-Type: application/x-web-app-manifest+json");

    $data = array('name'=>'Test App ('.$subdomain.')',
                  'description'=>'This app has been automatically generated by testmanifest.com');

    echo json_encode($data);
} else {
    include "words.php";
    $random = rand(1000, 9999);
    $manifest = "http://" . $animals[rand(0, count($animals))] . $random . ".testmanifest.com/manifest.webapp";
?>
<div style="text-align: center;">
    <h1>Your random manifest is&hellip;</h1>
    <input type="text" id="thingy" value="<?= $manifest ?>"><br>
    (Or, just use any subdomain &middot; <a href="/">get another</a>)
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
    }
</style>
<script>
document.getElementById('thingy').focus();
document.getElementById('thingy').select();
</script>
<?
}
