<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\signup;

class uploadpic extends Model
{
    use HasFactory;
    protected $table="uploadpics";
    public $timestamps=false;

    public function signup()
    {
        return $this->belongsTo(signup::class);
    }
}
