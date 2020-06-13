<?php

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "lokeritas_web");


function FILTER_ARRAY_VALUES_REGEXP($basis, $array, $flag_invert = 0)
{
    $found = [];

    foreach ($array as $key => $val) {
        if (isset($flag_invert) && $flag_invert == 1) {
            if (!preg_match($basis, $val['judul'])) {
                $found[] = $val;
            }
        } else {
            if (preg_match($basis, $val['judul'])) {
                $found[] = $val;
            }
        }
    }
    return $found;
}

function FILTER_ARRAY_VALUES_REGEXP_P($basis, $array, $flag_invert = 0)
{
    $found = [];

    foreach ($array as $key => $val) {
        if (isset($flag_invert) && $flag_invert == 1) {
            if (!preg_match($basis, $val['nama_perusahaan'])) {
                $found[] = $val;
            }
        } else {
            if (preg_match($basis, $val['nama_perusahaan'])) {
                $found[] = $val;
            }
        }
    }
    return $found;
}