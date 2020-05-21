<?php

namespace Arden;

include_once("dbconfig.php");

class OpeningTimesModel extends Model
{
    public function __construct()
    {
        $this->data = [
            'days' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
            'opening_hours' => [
                'Mon' => '0900 - 1700',
                'Tue' => '0900 - 1400',
                'Wed' => 'Closed',
                'Fri' => '1000 - 1300'
            ]
        ];
    }

    public function getData()
    {
        return $this->data;
    }
}