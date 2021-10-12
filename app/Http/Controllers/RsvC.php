<?php

namespace App\Http\Controllers;

use App\Models\Rsv;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RsvC extends Controller
{
    function post_rsv(Request $request)
    {
        $in = Rsv::insert([
            'nama' => $request->nama,
            'nomor' => $request->nomor,
            'ucapan' => $request->ucapan,
            'konfirmasi' => $request->konfirmasi,
            'jumlah' => $request->jumlah,
            'created' => Carbon::now()
        ]);

        if ($in) {
            return true;
        } else {
            return false;
        }
    }
}
