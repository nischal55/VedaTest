<?php
use Carbon\Carbon;
function showTags()
{
    $tags = array(
        "1" => "php",
        "2" => "C#",
        "3" => "C++",
        "4" => "python",
        "5" => "VB",
        "6" => "Java",
        "7" => "JavaScript",
    );
   return $tags;    
}

function getTimeDifference($timestamp)
{
    // Convert the timestamp to a Carbon instance
    $timestamp = Carbon::parse($timestamp);

    // Get the current time
    $now = Carbon::now();

    // Calculate the difference in days
    $difference = $now->diffInDays($timestamp);

    // Return the appropriate string based on the difference
    switch ($difference) {
        case 0:
            return 'today';
        case 1:
            return 'yesterday';
        default:
            return $difference . ' days ago';
    }
}
