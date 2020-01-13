<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public static function add($fields)
    {
        $user = new User();
        $user->fill($fields);
        $user->save();

        return $user;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();

    }
    public function generatPassword($password){
        if($password != null){
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    public function removeImage(){
        if($this->avatar != null)
        {
            Storage::delete('uploads/'.$this->avatar);
        }
    }

    public function uploadAvatar($image)
    {
        if ($image == null) {
            return;
        }

        $this->removeImage();
        $filename = Str::random(5).'.'.$image->extension();
        $image->storeAs('uploads', $filename);
        $this->avatar = $filename;
        $this->save();
    }


    public function remove(){
        $this->removeImage();
        $this->delete();
    }

    public function getImage()
    {

        if ($this->avatar == null) {
            return 'uploads/img/no-image.png';
        }

        return 'uploads/' . $this->avatar;
    }

}
