<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Check;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckController extends Controller
{

    public function store(Request $request)
    {
        try {
            //code...
            $request->validate([
                'title' => 'required|string|max:255',
                'color' => 'required|string|max:7',
            ]);

            Check::create([
                'user_id' => auth()->user()->id,
                'title' => $request->input('title'),
                'color' => $request->input('color'),
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Check created successfully',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Terjadi kesalahan',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function show()
    {
        try {
            //code...
            $check = Check::get();
            return response()->json([
                'data' => $check
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Terjadi kesalahan',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function detail($id)
    {
        try {
            $check_detail = Check::with('items')->findOrFail($id)->get();
            return response()->json([
                'status' => 200,
                'data' => $check_detail
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Terjadi kesalahan',
                'error' => $th->getMessage()
            ], 500);
        }
    }


    public function delete($id)
    {
        try {
            Check::findOrFail($id)->delete();
            return response()->json([
                'message' => "Check delete sucessfully"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Terjadi kesalahan',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
