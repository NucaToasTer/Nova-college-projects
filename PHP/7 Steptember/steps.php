<?php
require 'conn.php';
require 'User.php';
require 'Session.php';


$totalSteps = 0;
$avgSteps = 0;

// Check for a valid session via cookie
$session = User::findActiveSession();

if (!$session) {

    header("Location: login.php");
    exit;
} else {

    $tempName = User::findByID($session->userId);

    echo ("hello "  . $tempName->firstName .  "<br>");

    if (!$tempName->role) {
        $stepsData = User::stepsData($session->userId);

        foreach ($stepsData as $step) {
            echo "Date: " . $step["date"] . " - Steps: " . $step["steps"] . "<br>";
            $totalSteps = $totalSteps + $step["steps"];
        }

        $avgSteps = $totalSteps / sizeof($stepsData);

        echo "Total steps: " . $totalSteps . " - Average steps: " . intval($avgSteps) . "<br>";
    } else {
        $stepsData = User::allSteps();

        foreach ($stepsData as $step) {
            echo "Date: " . $step["date"] . " - Steps: " . $step["steps"] . "<br>";
            $totalSteps = $totalSteps + $step["steps"];
        }

        $avgSteps = $totalSteps / sizeof($stepsData);

        echo "Total steps: " . $totalSteps . " - Average steps: " . intval($avgSteps) . "<br>";
    }
}
