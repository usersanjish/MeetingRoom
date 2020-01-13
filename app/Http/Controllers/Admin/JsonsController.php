<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class JsonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkdate(Request $request)
    {
        $start = Carbon::createFromFormat('d-m-Y H:i', $request->get('start'))->format('Y-m-d H:i:s');
        $end = Carbon::createFromFormat('d-m-Y H:i', $request->get('end'))->format('Y-m-d H:i:s');
        $data = Booking::where('room_id', '=', $request->get('check_id'))
            ->where('start', '>', $start)
            ->where('end', '<=', $end)
            ->get();
        if($data == '[]') {
            return response()->json([
                'status' => false,
            ]);
        }else{
            return response()->json([
                'status' => true,
            ]);
        }

    }
}
