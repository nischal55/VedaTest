<?php

function formatMonth($date)
{
    return \Carbon\Carbon::createFromFormat('Y-m', $date)->format('Y F');
}
