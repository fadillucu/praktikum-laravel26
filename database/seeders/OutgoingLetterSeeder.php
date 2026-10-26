<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class OutgoingLetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('outgoing_letters')->insert(
            [
                [
                    'tanggal' => '2025-10-10',
                    'penerima' => 'Fakultas Teknik',
                    'keterangan'=> 'Undangan',
                    'created_at'=> now(),
                    'updated_at'=> now()
                ],
                [
                    'tanggal' => '2026-10-11',
                    'penerima' => 'Bagian Akademik',
                    'keterangan'=> 'Unngan',
                    'created_at'=> now(),
                    'updated_at'=> now()
                ],
                [
                    'tanggal' => '2027-10-11',
                    'penerima' => 'Universitas',
                    'keterangan'=> 'Undann',
                    'created_at'=> now(),
                    'updated_at'=> now()
                ]
            ]
        );
    }
}
