<?php
namespace sample;

/**
 * 
 * To Run the test:
 * 
 * php driver.php
 * 
 */
require_once('SenateData.php');
require_once('CommandLineDisplay.php');
require_once('ContactController.php');

$data = new SenateData();
$display = new CommandLineDisplay("Senators", $argv);

$cc = new ContactController($display, $data);
?>