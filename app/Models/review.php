<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\signup;
use App\Models\uploadpic;
class review extends Model
{
    use HasFactory;
    protected $table="reviews";
    public $timestamps=false;

    public function one()
    {
        return $this->belongsTo('App\Models\signup','sign_id');
    }

}
