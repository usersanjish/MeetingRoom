<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\FilterRequest;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\User;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $bookings = Booking::paginate(4);
        return view('admin.pages.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookings  = Room::all();
        return view('admin.pages.booking.create', compact('bookings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        $booking = Booking::add($request->all());
        session()->flash('success', 'Добавлено');
        return response()->json([
            'status' => true,
            'url' => route('booking.index'),
        ]);
    }

    public function select($room_id)
    {
        $data = Booking::getData($room_id);
        $bookings  = Room::all();
        $getImg = Booking::getImg($room_id);
        return view('admin.pages.booking.create', compact('data', 'bookings', 'getImg', 'room_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        $getImg = Booking::getImg($booking->room_id);
        $data = Booking::getData($booking->room_id);
        return view('admin.pages.booking.edit', compact('booking', 'getImg', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingRequest $request, $id)
    {
        $booking = Booking::find($id);
        $booking->edit($request->all());
        return redirect()->route('booking.index')->with(['success' => 'Изменено']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::find($id)->remove();
        return redirect()->route('booking.index')->with(['success' => 'Удалено']);
    }

    public function view($id)
    {
        $booking = Booking::find($id);
        $getImg = Booking::getImg($booking->room_id);
        $data = Booking::getData($booking->room_id);
        return view('admin.pages.booking.view', compact('booking', 'getImg', 'data'));
    }

    public function lists(){
        $lists = Booking::getList();
        return view('admin.pages.lists.index', $lists);
    }

    public function filter(FilterRequest $request){
        $lists = Booking::getFilter($request->get('status'));
        return view('admin.pages.lists.index', $lists);
    }
}
