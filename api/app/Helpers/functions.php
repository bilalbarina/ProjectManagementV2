<?php

use Illuminate\Support\Carbon;

/**
 * Get percentage of a progress.
 * 
 */
function get_percentage($total, $remaining)
{
    if ($total < 1) {
        return 0;
    }
    
    return (($total - $remaining) / $total) * 100;
}

/**
 * Generate years of study.
 * 
 */
function get_years()
{
    $back = 5;

    for ($i = $back; $i >= 0; $i--) {
        $years[] = Carbon::now()->subYear($i)->year . '-' . Carbon::now()->subYear($i-1)->year;
    }

    return $years;
}