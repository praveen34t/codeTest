<?php

namespace Arden;

class OpeningTimesView extends View
{
    public function __construct($data = null)
    {
        if($data) {
            $this->data = $data;
        }
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    public function render() {
        // Render opening times
        foreach($this->data as $key => $val) {
            if($key == 'days') {
                foreach($val as $day) {
                    echo '<div>'. $day;

                    echo ' - ';

                    foreach($this->data['opening_hours'] as $d => $hours) {
                        if($d == $day) {
                            echo $hours;
                        }
                    }

                    echo '</div>';
                }
            }

        }
    }
}