<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    public function checkUser()
    {
        return response()->json([
            'status'    => 200,
            'message'   => 'bạn có quyền user',
        ]);
    }

    public function checkStore()
    {
        return response()->json([
            'status'    => 200,
            'message'   => 'bạn có quyền store',
        ]);
    }

    public function checkAdmin()
    {
        return response()->json([
            'status'    => 200,
            'message'   => 'bạn có quyền admin',
        ]);
    }
}
