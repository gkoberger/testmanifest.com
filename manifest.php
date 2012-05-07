<?php
// First, split it up and get the root
$subdomain = $_GET['subdomain'];

// Output a basic manifest
if($_GET['file'] == "manifest.webapp") {
    header("Content-Type: application/x-web-app-manifest+json");
    echo "{'name': 'hi', 'description': 'abc'}";
}
