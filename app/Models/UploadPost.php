<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UploadPost extends Model
{
    use HasFactory;
    protected $table="upload_posts";
    protected $fillable =[
        'username',
        'image',
        'selection',
        'views',
        'user_id'
    ];
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }


}
