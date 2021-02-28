<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>Home | PHP Motors</title>
    <link href="/fantasyscore/css/style.css" type="text/css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>

<body>
    <div id="wrapper">
        <header>
            <div id="top-header">
                <img src="/fantasyscore/images/site/logo.png" alt="PHP Motors Logo" id="Logo">
                <?php 
                    //if(isset($cookieFirstname)){
                    //    echo "<span id= 'cookie'>Welcome $cookieFirstname</span>";
                    //}
                    //check if the user is logged in
                        if (isset($_SESSION['loggedin'])){
                            $clientFname = $_SESSION['clientData']['clientFirstname'];
                            $clientLname = $_SESSION['clientData']['clientLastname'];
                            //$clientData[clientLastname]
                            echo "<a href='/fantasyscore/accounts' title='User info' id='userW'>Welcome $clientFname $clientLname</a>";
                        };
                ?>
                <?php
                    if (isset($_SESSION['loggedin'])){
                        echo"<a href='/fantasyscore/accounts?action=login-out' title='Log Out PHP Motors' id='acc'>Log Out</a>";
                    }
                    else{
                        echo "<a href='/fantasyscore/accounts?action=login-page' title='Login or Register with PHP Motors' id='acc'>My Account</a>";
                    };
                ?>
                <!--<a href="/fantasyscore/accounts?action=login-page" title="Login or Register with PHP Motors" id="acc">My Account</a> -->
            </div>
        </header>
        <nav>
            <?php //include $_SERVER['DOCUMENT_ROOT'].'/fantasyscore/common/nav.php'; 
            echo $navList; ?>
        </nav>
        <main>