<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratMasukController extends Controller
{

    public function index() {

            $suratmasuk = [
                [
                    'id' => 1 ,
                    'nomor surat' =>'002/ft/c/2022',
                    'tanggal' => '05-05-2005',
                    'pengirim'=> 'Fakultas',
                    'perihal'=> 'undangan rapat'
                ],
                
                [
                    'id' => 2 ,
                    'nomor surat' =>'001/ft/c/2029',
                    'tanggal' => '05-05-2007',
                    'pengirim'=> 'BBB',
                    'perihal'=> 'undangan akademik'

                ],
               
                [
                    'id' => 3 ,
                    'nomor surat' =>'003/ft/c/2008',
                    'tanggal' => '05-09-2009',
                    'pengirim'=> 'FKIP',
                    'perihal'=> 'undangan sosialisasi'

                ]


            ]  ;  

            return view ('surat-masuk.index', compact('suratmasuk')) ;
    }

     public function show($id) {
            return 'detail surat masuk dengan id'. $id ;
    }

}

