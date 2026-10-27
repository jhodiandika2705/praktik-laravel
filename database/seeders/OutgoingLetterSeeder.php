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
         DB ::table('outgoing_letters')->insert (
            [

        [
            
                'nomor surat' => '002/ft/c/2022',
                'tanggal' => '2005-05-05',
                
                'perihal' => 'undangan ngaji',
                'keterangan'=>'sosialisasi ngaji',
                'created_at' => now(),
                'updated_at' =>now()


        ],
        [
                'nomor surat' =>'001/ft/c/2029',
                    'tanggal' => '2007-05-05',
                    
                    'perihal'=> 'undangan akademik',
                    'keterangan'=>'sosialisasi akademik',
                    'created_at' => now(),
                    'updated_at' =>now()

        ],
        [
                'nomor surat' =>'003/ft/c/2008',
                    'tanggal' => '2009-09-05',
                    
                    'perihal'=> 'undangan sosialisasi',
                    'keterangan'=>'sosialisasi lomba',
                    'created_at' => now(),
                    'updated_at' =>now()

        ]
        ]
    

        );

    }
}
