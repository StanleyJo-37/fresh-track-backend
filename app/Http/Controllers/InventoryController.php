<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    //

    public function getAllItem() {
        try {
            $user = Auth::user();
            $userId = $user->id;

            $items = DB::table('food_inventory', 'fi')
                    ->select([
                        'fi.id',
                        'fp.local_name',
                        'fp.scientific_name',
                        'fp.serving_size_g',
                        'fi.fresh_until',
                        'fi.quantity',
                    ])
                    ->leftJoin('food_products AS fp', 'fp.id', '=', 'fi.food_product_id')
                    ->where([
                        ['fi.user_inventory_id', $userId],
                    ])
                    ->get();

            return response()->json($items);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function addItem(Request $request) {
        try {
            DB::beginTransaction();
            $request->validate([
                'food_items' => 'required|array',
            ]);
            $user = Auth::user();
            $userId = $user->id;

            $data = array_map(function($item) use($userId) {
                return [
                    ...$item,
                    'user_inventory_id' => $userId,
                ];
            }, $request->food_items);

            $item = DB::table('food_inventory')->insert($data);

            DB::commit();
            return response()->json($item);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function deleteItem(int $food_inventory_id) {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            $userId = $user->id;

            $item = DB::raw("
                DELETE FROM food_inventory
                WHERE id = $food_inventory_id
                AND user_inventory_id = $userId
            ");

            DB::commit();
            return response()->json($item);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function editItem(Request $request) {
        try {
            DB::beginTransaction();
            $request->validate([
                'food_item' => 'required|array',
            ]);
            $user = Auth::user();
            $userId = $user->id;

            $item = DB::table('food_inventory')
                    ->where([
                        ['id', $request->food_item["food_inventory_id"]],
                        ['user_inventory_id', $userId],
                    ])
                    ->update($request->food_items);

            DB::commit();
            return response()->json($item);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
