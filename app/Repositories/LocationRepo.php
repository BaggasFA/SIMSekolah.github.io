<?php

namespace App\Repositories;

// use App\Models\Nationality;
use App\Models\Kecamatan;
// use App\Models\Lga;

class LocationRepo
{
    public function getKecamatans()
    {
        return Kecamatan::all();
    }

    public function getAllKecamatans()
    {
        return Kecamatan::orderBy('name', 'asc')->get();
    }

    // public function getAllNationals()
    // {
    //     return Nationality::orderBy('name', 'asc')->get();
    // }

    // public function getLGAs($Kecamatan_id)
    // {
    //     return Lga::where('state_id', $state_id)->orderBy('name', 'asc')->get();
    // }

}
