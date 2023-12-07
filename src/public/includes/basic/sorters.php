<?php

namespace Basic;

class Sorters {
    public static function bubble($source) {
        for($i = 0; $i < count($source); $i++) {
            for($j = $i; $j < count($source); $j++) {
                if ($source[$i] < $source[$j]) {
                    $t = $source[$i];
                    $source[$i] = $source[$j];
                    $source[$j] = $t;
                }
            }
        }
        return $source;
    }
}