<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{

    protected $fillable=[
        'truyen_id','name','slug','active', 'mota','content','vitri'
    ];
    protected $primaryKey = 'id';
    protected $table = 'chapter';
    public function truyen(){
      return $this->belongsTo('App\Models\Truyen');
    }
}
