<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class dtp_kamtibSeeder extends Seeder
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
    		DB::table('dtp_kamtib')->insert([    			
                'no' => $faker->numberBetween(10000,25000),
                'id_user' => '1',
                'tanggal' => $faker->numberBetween(1,30),
                'bulan' => $faker->month,
                'tahun' => $faker->numberBetween(1999,2020),
                'nama_petugas' => $faker->name,
                'tujuan'  => $faker->address,
                'deskripsi' => $faker->address,
    		]);
 
    	}
    }
}
