<?php

namespace App\Models;
use App\User;
use App\Models\Room;
use Carbon\Carbon;
use Auth;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $fillable = ['user_id', 'room_id', 'title', 'description', 'start', 'end'];
    public function room()
    {
        return $this->belogesTo(Room::class);
    }

    public function author()
    {
        return $this->belogesTo(User::class, 'user_id');
    }

    public static function add($fileds){
        $booking = new Booking();
        $booking->fill($fileds);
        $booking->user_id = Auth::user()->id;
        $booking->save();
        return $booking;
    }

    public function edit($fileds){
        $this->fill($fileds);
        $this->save();
    }

    public function remove(){
        $this->delete();
    }

    public function getUser($id){
        $user = User::find($id)->name;
        return $user;
    }

    public static function getByUserId(){
        $bookings = Booking::whereIn('user_id', [Auth::user()->id])->paginate(4);
        return $bookings;
    }

    public static function getLoc($room_id){
        $room = Room::find($room_id)->name;
        return $room;
    }

    public static function getImg($id){
        $img = Room::find($id)->img;
        if($img != null){
            return 'uploads/' . $img;
        }
        return 'uploads/img/no-image.png';
    }

    public static function getData($room_id){
        $booked = Booking::get()->where('room_id', '=' , $room_id);
        $data = [];
        foreach ($booked as $key => $value) {
            $start = Carbon::createFromFormat('d-m-Y H:i', $booked[$key]['start'])->format('Y-m-d'.'\T'.'H:i:s');
            $end = Carbon::createFromFormat('d-m-Y H:i', $booked[$key]['end'])->format('Y-m-d'.'\T'.'H:i:s');

                if($end >= date('Y-m-d'.'\T'.'H:i:00')){
                    $data[$key] = array('id'=> $booked[$key]['id'], 
                                'room_id'=> $booked[$key]['room_id'], 
                                'user_id'=> $booked[$key]['user_id'], 
                                'title'=> $booked[$key]['title'], 
                                'desc'=> $booked[$key]['description'], 
                                'start' => $start, 
                                'end' => $end);
                }
        }
        return $data;
    }

    public static function getList(){
        $date = date('Y-m-d H:i');
        $booked = Booking::where('end', '>=', $date)->get();
        if($booked->pluck('room_id') != '[]'){
            $free = Room::whereNotIn('id', $booked->pluck('room_id'))->get();
        }else{
            $free = Room::all();
        }

        return compact('free', 'booked');
    }

    public static function getFilter($value){
        $filter = Booking::getList();
        if($value == 0){
            return $filter;
        }

        if($value == 1){
            $free = $filter['free'];
            return compact('free');
        }

        if($value == 2){
            $booked = $filter['booked'];
            return compact('booked');
        }
    }
    public function setStartAttribute($start){
        $date = Carbon::createFromFormat('d-m-Y H:i', $start)->format('Y-m-d H:i:s');
        $this->attributes['start'] = $date;
    }

    public function setEndAttribute($end){
        $dend = Carbon::createFromFormat('d-m-Y H:i', $end)->format('Y-m-d H:i:s');
        $this->attributes['end'] = $dend;
    }

    public function getStartAttribute(){
        $start = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['start'])->format('d-m-Y H:i');
        return $start;
    }

    public function getEndAttribute(){
        $end = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['end'])->format('d-m-Y H:i');
        return $end;
    }
}
