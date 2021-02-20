<?php

require_once('vendor/autoload.php');
require_once('BowlingScoreCalculator.php');
require_once('BowlingClient.php');

//$points = [
//    [2,0],
//    [9,1],
//    [3,2],
//    [3,5],
//    [9,0],
//    [6,2],
//    [1,3],
//    [3,2],
//    [4,5],
//    [9,0]
//];

//$frames = [
//    [10,0],
//    [10,0],
//    [10,0],
//    [10,0],
//    [10,0],
//    [10,0],
//    [10,0],
//    [10,0],
//    [10,0],
//    [10,0]
//];

//$frames = [
//    [5,5],
//    [5,5],
//    [5,5],
//    [5,5],
//    [5,5],
//    [5,5],
//    [5,5],
//    [5,5],
//    [5,5],
//    [5,5]
//];

// Getting data from API
$bowlingClient = new BowlingClient();
$frames = $bowlingClient->getFrames();

// Calculating the score
$bowlingScoreCalculator = new BowlingScoreCalculator($frames);
$calculatedSum = $bowlingScoreCalculator->calculateScore();

echo '<pre>';


echo 'Frames received: '. json_encode($frames). '<br>';
echo 'Calculated sum: '. json_encode($calculatedSum) .'<br>';

if($bowlingClient->sendCalculatedSum($calculatedSum)) {
    echo 'Request sent';
} else {
    echo 'Request failed';
}

