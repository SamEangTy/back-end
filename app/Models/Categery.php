<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categery extends Model
{
    use HasFactory;
    protected $table=("categeries");
    protected $primaryKey = 'categery_id';
    protected $guarded = ['categery_id'];
    public $timestamps=false;
}
