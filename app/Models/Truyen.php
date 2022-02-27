<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;
      protected $fillable=[
        'name','slug','active','content','theloai_id','image','tacgia','decu','hashtag','view'
    ];
    protected $primaryKey = 'id';
    protected $table = 'truyen';
#
    public function theloai(){
          return $this->belongsTo('App\Models\theloai','theloai_id','id');
    }
    public function chapter(){
      return $this->hasmany('App\Models\Chapter','truyen_id','id');
    }
}
