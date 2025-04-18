<?php

namespace App\Http\Controllers\Api;

use App\Models\Check;
use App\Models\CheckItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckItemController extends Controller
{
    public function store(Request $request, $id)
    {
        try {
            $check = Check::where('id', $id)->first();
            if (!$check) {
                return response()->json([
                    'message' => 'Tidak ada id Check yang dipilih'
                ]);
            }

            $request->validate([
                'content' => 'required',
            ]);

            CheckItem::create([
                'check_id' => $id,
                'content' => $request->input('content'),
                'is_done' => '0'
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Item created successfully',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Terjadi kesalahan',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'content' => 'required',
            ]);

            CheckItem::where('id', $id)->update([
                'content' => $request->input('content'),
                'is_done' => '0'
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Item created successfully',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Terjadi kesalahan',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
