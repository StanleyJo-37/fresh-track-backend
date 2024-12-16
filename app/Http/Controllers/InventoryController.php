<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateTime;
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
                        'fi.fresh_until',
                        'fi.quantity',
                    ])
                    ->leftJoin('food_products AS fp', 'fp.id', '=', 'fi.food_product_id')
                    ->where([
                        ['fi.user_inventory_id', $userId],
                    ])
                    ->get();

            if (isset($items)) {
                $items = json_decode($items, true);

                $items = array_map(function ($item) {
                    $diff = date_diff(new DateTime($item['fresh_until']), Carbon::now())->days;

                    $status = $diff < 0 
                                ? 0
                                : ($diff === 0
                                    ? 1
                                    : ($diff >= 3
                                        ? 2
                                        : 3));

                    return array_merge($item, [
                        'fresh_until' => Carbon::parse($item['fresh_until'])->format('l, d-F-Y H:i:s'),
                        'quantity' => (float) $item['quantity'],
                        'status' => $status,
                    ]);
                }, $items);
                
                
            }

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

            $currTime = Carbon::now();

            $data = array_map(function($item) use($userId, $currTime) {
                return array_merge($item, [
                        'bought_at' => $currTime,
                        'user_inventory_id' => $userId,
                    ]
                );
            }, $request->food_items);

            $item = DB::table('food_inventory')->insert($data);

            DB::commit();
            return response()->json($item);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function deleteItem(Request $request) {
        try {
            $request->validate([
                'food_inventory_id' => 'required|integer',
            ]);
            DB::beginTransaction();
            $user = Auth::user();
            $userId = $user->id;

            $item = DB::delete("
                DELETE FROM food_inventory
                WHERE id = $request->food_inventory_id
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
                'food_inventory_id' => 'required|integer',
                'new_food_info' => 'required|array',
            ]);
            $user = Auth::user();
            $userId = $user->id;

            $item = DB::table('food_inventory')
                    ->where([
                        ['id', $request->food_inventory_id],
                        ['user_inventory_id', $userId],
                    ])
                    ->update($request->new_food_info);

            DB::commit();
            return response()->json($item);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
