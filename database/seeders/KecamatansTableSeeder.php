<?php
namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatansTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('kecamatans')->delete();

        $kecamatans = [
            'Tegalrejo', 'Jetis', 'Gondokusuman', 'Danurejan', 'Gedongtengen', 'Ngampilan', 'Wirobrajan', 'Mantrijeron', 'Kraton', 'Gondomanan', 'Pakualaman', 'Umbulharjo', 'Mergangsan', 'Kotagede',
        ];

        foreach ($kecamatans as $kecamatan) {
            Kecamatan::create(['name' => $kecamatan]);
        }
    }

}
