<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'upload_file_path',
        'file_link',
        'file_type',
        'unique_id',
        'title',
        'message',
        'file_count'
    ];
}