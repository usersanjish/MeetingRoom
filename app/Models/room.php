<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class Room extends Model
{
	protected $fillable = ['name','img'];

	public function booking(){
		return $this->hashMany(Booking::class);
	}
	public static function add($fields){
		$room = new Room();
		$room->fill($fields);
		$room->save();
		return $room;
	}


	public function edit($fields){

		$this->fill($fields);
		$this->save();

	}

	public function remove(){
		$this->removeImage();
		$this->delete();
	}

	public function removeImage(){
		if($this->img != null)
		{
			Storage::delete('uploads/' . $this->img);
		}
	}

	public function uploadImage($image){
		if ($image == null) {
			return;
		}

		$this->removeImage();
		$filename = Str::random(5).'.'.$image->extension();
		$image->storeAs('uploads', $filename);
		$this->img = $filename;
		$this->save();
	}

	public function getImage(){
		if ($this->img == null) {
			return 'uploads/img/no-image.png';
		}

		return 'uploads/' . $this->img;
	}


}