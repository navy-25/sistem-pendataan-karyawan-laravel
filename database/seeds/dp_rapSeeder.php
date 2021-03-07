<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class dp_rapSeeder extends Seeder
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
    		DB::table('dp_rap')->insert([    			
                'no' => $faker->numberBetween(10000,25000),
                'id_user' => '1',
                'nama_pengungsi' => $faker->name,
                'nomor_register' => $faker->numberBetween(10000,25000),
                'no_unchcr' => $faker->numberBetween(0,250),
                'jenis_kelamin' => 'Laki - laki',
                'tanggal' => $faker->numberBetween(1,30),
                'bulan' => $faker->month,
                'tahun' => $faker->numberBetween(1999,2020),
                'tempat_penampungan' => 'Green Bamboo',
                'kewarganegaraan' => 'Pakistan',
                'foto' => '',
                'barcode' => '',
    		]);
 
    	}
    }
}
