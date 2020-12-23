<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chat() {
        return view('welcome');
    }

    public function history(Request $request) {
        $message = Message::all();
        return response()->json($message);
    }
}
