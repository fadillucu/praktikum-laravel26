<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncomingLetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('incoming_letters')->insert(
            [
                [
                    'tanggal'   => '1111-10-03',
                    'pengirim'  => 'LPPM',
                    'keterangan'=> 'Undangan',
                    'created_at'=> now(),
                    'updated_at'=> now()
                ],
                [
                    'tanggal'   => '1121-10-03',
                    'pengirim'  => 'wadadM',
                    'keterangan'=> 'Unngan',
                    'created_at'=> now(),
                    'updated_at'=> now()
                ],
                [
                    'tanggal'   => '1111-10-30',
                    'pengirim'  => 'LsaPM',
                    'keterangan'=> 'Undann',
                    'created_at'=> now(),
                    'updated_at'=> now()
                ]
            ]
        );
    }
}
