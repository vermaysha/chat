<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chat() {
        return view('welcome');
    }

    public function history(Request $request) {
        return response()->json([
            [
                'id' => 1,
                'username' => 'Vermaysha',
                'message' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio, alias quod nemo ratione blanditiis sint debitis aliquam perferendis, illum voluptate facere. Explicabo sint pariatur aliquid vitae dolorum iste repellendus cupiditate?'
            ],
            [
                'id' => 2,
                'username' => 'Vermaysha',
                'message' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio, alias quod nemo ratione blanditiis sint debitis aliquam perferendis, illum voluptate facere. Explicabo sint pariatur aliquid vitae dolorum iste repellendus cupiditate?'
            ],
            [
                'id' => 3,
                'username' => 'Vermaysha',
                'message' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio, alias quod nemo ratione blanditiis sint debitis aliquam perferendis, illum voluptate facere. Explicabo sint pariatur aliquid vitae dolorum iste repellendus cupiditate?'
            ],
            [
                'id' => 4,
                'username' => 'Vermaysha',
                'message' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio, alias quod nemo ratione blanditiis sint debitis aliquam perferendis, illum voluptate facere. Explicabo sint pariatur aliquid vitae dolorum iste repellendus cupiditate?'
            ],
            [
                'id' => 5,
                'username' => 'Vermaysha',
                'message' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio, alias quod nemo ratione blanditiis sint debitis aliquam perferendis, illum voluptate facere. Explicabo sint pariatur aliquid vitae dolorum iste repellendus cupiditate?'
            ],
            [
                'id' => 6,
                'username' => 'Ashary',
                'message' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio, alias quod nemo ratione blanditiis sint debitis aliquam perferendis, illum voluptate facere. Explicabo sint pariatur aliquid vitae dolorum iste repellendus cupiditate?'
            ],
        ]);
    }
}
