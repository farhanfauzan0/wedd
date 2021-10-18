<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChatC extends Controller
{
    function index($tamu = null)
    {
        $data = Chat::select('*')->orderby('created', 'desc')->get();
        return view('welcome', ['chat' => $data, 'tamu' => $tamu]);
    }

    function post(Request $request)
    {
        $check = Chat::select('nama')->wherenama($request->guestbook_name)->first();
        if (!empty($check->nama)) {
            return false;
        }
        $in = Chat::insert([
            'nama' => $request->guestbook_name,
            'chat' => $request->guestbook_message,
            'created' => Carbon::now()
        ]);
        if ($in) {
            return response()->json([
                'nama' => $request->guestbook_name,
                'chat' => $request->guestbook_message
            ]);
        } else {
            return false;
        }
    }
}
