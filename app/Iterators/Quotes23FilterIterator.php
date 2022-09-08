<?php

namespace App\Iterators;

use Carbon\Carbon;

class Quotes23FilterIterator extends \FilterIterator
{
//    private $startDate;
//    private $endDate;

    public function __construct(\Iterator $iterator, private float $startDate, private float $endDate)
    {
        parent::__construct($iterator);

    }


    public function accept()
    {
        $date1 = Carbon::createFromTimestamp($this->startDate);
        $date2 = Carbon::createFromTimestamp($this->endDate);
        $current = Carbon::createFromTimestamp($this->current()->date);

        if ($current->gte($date2) and $current->lte($date1)) {
            return true;
        }
        return false;
    }
}
