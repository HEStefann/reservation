<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    public function show($floorId)
    {
        $firstShapeType = DB::table('shape_types')
            ->where('IdShapeGroup', 1)
            ->pluck('id')
            ->toArray();
    
        $tables = DB::table('tables')
            ->where('IdFloor', $floorId)
            ->whereIn('Shape', $firstShapeType)
            ->get();
            
        return response()->json($tables);
    }
}
