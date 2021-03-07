<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class kd_PerkesSeeder extends Seeder
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
    		DB::table('kd_Perkes')->insert([    			
                'no' => $faker->numberBetween(10000,25000),
                'id_user' => '1',
                'tanggal' => $faker->numberBetween(1,30),
                'bulan' => $faker->month,
                'tahun' => $faker->numberBetween(1999,2020),
                'nama_penerima' => $faker->name,
                'jenis_kebutuhan' => 'Makan & Minum',
                'deskripsi' => $faker->name,
    		]);
 
    	}
    }
}
