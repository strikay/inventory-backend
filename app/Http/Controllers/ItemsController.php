<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Item;

class ItemsController extends Controller
{
    function viewItems(){
        return Item::all();
    }

    function addNewItems(Request $req){

        $item = Item::firstOrNew(
            ['item_category' => $req->item_category],
        );

        $item->units += $req->units;
        $item->last_added = date('Y-m-d');
        $item->user = $req->user;
        
        $item->save();

        return $item;
    }

    function moveItems($id, Request $req) {
        $item = Item::where('id', $id)->firstOrFail();

        if(!(($item->units - $req->units)>0)){
            return response('Insufficient items in stock', 400)
                ->header('Content-Type', 'text/plain');
        }
        $item->units -= $req->units;
        $item->last_added = date('Y-m-d');

        $item->save();
        return $item;
    }

    function restockItems($id, Request $req){

        $item = Item::where('id', $id)->firstOrFail();
        $item->last_taken = date('Y-m-d'); 
        $item->units += $req->units;

        $item->save();
        return $item;
    }

    function deleteCategory($id, Request $req){
        Item::where('id', $id)->delete();
        return response()->json([
            'message' => 'Successfully Deleted'
        ], 204); 
    }
}
