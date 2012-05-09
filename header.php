<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Test Manifest</title>
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

        body, html {
             height: 100%;
             margin: 0pt;
             padding: 0pt;
        }

        #sidebar {
             -moz-box-sizing: border-box;
             -webkit-box-sizing: border-box;
             background-color: #EEEEEE;
             border-right: 1px solid #CCCCCC;
             float: left;
             height: 100%;
             margin-right: 50px;
             padding: 25px 50px 25px 25px;
             width: 300px;
        }

        #sidebar ul {
             color: #888888;
             font-size: 0.7em;
             line-height: 1.6em;
             list-style: none outside none;
             padding: 0pt 0pt 0pt 10px;
        }

        #sidebar hr {
             background-color: #CCCCCC;
             border-color: -moz-use-text-color -moz-use-text-color #FFFFFF;
             border-style: none none solid;
             border-width: 0pt 0pt 1px;
             height: 2px;
        }

        #sidebar ul li span {
             color: #555555;
        }

        #sidebar p {
             color: #666666;
             font-size: 0.9em;
        }

        form {
            padding-top: 25px;
            margin-left: 350px;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            padding-right: 1em;
        }
        form input {
            max-width: 700px;
            width: 100%;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }
        textarea {
            border: 1px solid #BBBBBB;
            border-radius: 5px;
            box-shadow: 0 3px #EEEEEE inset;
            height: 400px;
            max-width: 700px;
            width: 100%;
            padding: 1em;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }
        #sidebar button:active {
            position: relative;
            top: 2px;
        }
        #sidebar button:hover {
            background-color: #77ACD2;
        }
        #sidebar button {
            cursor: pointer;
            background-color: #88BBDE;
            border: 0 none;
            border-radius: 5px;
            box-shadow: 0 -5px rgba(0, 0, 0, 0.1) inset;
            color: #FFFFFF;
            font-size: 1em;
            font-weight: bold;
            padding: 10px 10px 12px;
            text-shadow: -1px -1px rgba(0, 0, 0, 0.5);
            width: 100%;
        }
    </style>
    <script src="https://myapps.mozillalabs.com/jsapi/include.js"></script>
    <script src="https://browserid.org/include.js" type="text/javascript"></script>
  </head>
  <body id="home">

