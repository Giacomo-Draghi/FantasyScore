<?php
//This is the vehicle controller for this site.

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/vehicles-model.php';
// Get the NavList variable as needed
require_once '../library/functions.php';

// Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
/* OBSOLETE
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
 $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>'; 
*/

// Storing the navigation variable with the needed data
$navList = getNavList($classifications);

//Array of car classification
/* OBSOLETE
$classificationList  = '';
foreach ($classifications as $classification) {
    $classificationList  .= "<option value = '".urlencode($classification['classificationId'])."'> $classification[classificationName] </option>";
}
*/

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
}

switch ($action) {
    case 'add-Class':
        // Filter and store the data
            $classificationName = filter_input(INPUT_POST, 'classificationName');
        // Check for missing data
            if(empty($classificationName)){
                $message = '<p>Please provide information for all empty form fields.</p>';
                include '../view/add-classification.php';
                exit; 
            }
        // Send the data to the model
            $regOutcome = regClass($classificationName);
        // Check and report the result
            if($regOutcome === 1){
                header("Location: index.php");
                //include '../view/vehicle-man.php';
                exit;
            } else {
                $message = "<p>Sorry but adding Classification, failed. Please try again.</p>";
                include '../view/add-classification.php';
                exit;
            }
        break;
    case 'add-inventory':
        // Filter and store the data
            $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
            $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
            $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
            $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
            $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
            $invThumbnail = filter_input(INPUT_POST, 'invThumbnail',FILTER_SANITIZE_STRING);
            $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
            $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
        // Check for missing data
            if(empty($classificationId) || empty($invMake) || empty($invModel) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor)){
                $message = '<p>Please provide information for all empty form fields.</p>';
                include '../view/add-vehicle.php';
                exit; 
            }
        // Send the data to the model
            $regOutcome = regInv($classificationId, $invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor);
        // Check and report the result
            if($regOutcome === 1){
                $message = "<p>The Vehicle was added successfully!</p>";
                //Cleaning variables
                $classificationId = "";
                $invMake = "";
                $invModel = "";
                $invDescription = "";
                $invImage = "";
                $invThumbnail = "";
                $invPrice = "";
                $invStock = "";
                $invColor = "";
                include '../view/add-vehicle.php';
                exit;
            } else {
                $message = "<p>Sorry but the registration for $invMake $invModel failed. Please try again.</p>";
                include '../view/add-vehicle.php';
                exit;
            }
        break;
    case 'add-vehicle':
        include '../view/add-vehicle.php';
        break;
    case 'add-classification':
        include '../view/add-classification.php';
        break;
    default:
        include '../view/vehicle-man.php';
}