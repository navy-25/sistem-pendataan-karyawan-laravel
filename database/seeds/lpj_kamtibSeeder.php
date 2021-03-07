<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class lpj_kamtibSeeder extends Seeder
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
    		DB::table('lpj_kamtib')->insert([    			
                'no_laporan' => $faker->numberBetween(10000,25000),
                'id_user' => '1',
                'tanggal' => $faker->numberBetween(1,30),
                'bulan' => $faker->month,
                'tahun' => $faker->numberBetween(1999,2020),
                'nama_petugas' => $faker->name,
                'jam_mulai' => $faker->numberBetween(00,23),
                'menit_mulai' => $faker->numberBetween(00,59),
                'jam_selesai' => $faker->numberBetween(00,23),
                'menit_selesai' => $faker->numberBetween(00,59),
                'deskripsi' => $faker->name,
    		]);
 
    	}
    }
}
