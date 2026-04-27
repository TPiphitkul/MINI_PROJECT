<?php
function bubbleSortByAmount($data)
{
    $count = count($data);
    for ($i = 0; $i < $count - 1; $i++) {
        for ($j = 0; $j < $count - $i - 1; $j++) {
            if ($data[$j]['amount'] > $data[$j + 1]['amount']) {
                $tmp = $data[$j];
                $data[$j] = $data[$j + 1];
                $data[$j + 1] = $tmp;
            }
        }
    }
    return $data;
}