<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class dpb_kamtibSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 40; $i++){
 
            // insert data ke table pegawai menggunakan Faker
    		DB::table('dpb_kamtib')->insert([    			
                'no' => $faker->numberBetween(10000,25000),
                'id_user' => '1',
                'tanggal' => $faker->numberBetween(1,30),
                'bulan' => $faker->month,
                'tahun' => $faker->numberBetween(1999,2020),
                'nama_deteni' => $faker->name,
                'blok' => 'A1',
                'jenis_pelanggaran' => $faker->address,
                'foto' => '',
                'kasus' => $faker->address,
    		]);
 
    	}
    }
}
