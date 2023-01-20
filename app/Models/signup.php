<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\review;
class signup extends Model
{
    use HasFactory;
    protected $table="signups";
    public $timestamps=false;

    public function review()
    {
        return $this->hasOne(review::class);
        
    }

}
