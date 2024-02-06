<?php

use App\Models\metada;

function get_meta_value($meta_key)
{
    $data = metada::where('meta_key', $meta_key)->first();
    if ($data) {
        return $data->meta_value;
    }
}

function set_about_nama($nama)
{
// namam = "ramdan kusumah"
    $arr = explode(" ", $nama);
    $kataakhir = end($arr);
    $kataakhi2 = "<span class='text-primary'>$kataakhir</span>";
    array_pop($arr);
    $namaAwal = implode(" ", $arr);
    return $namaAwal . " " . $kataakhi2;
}
