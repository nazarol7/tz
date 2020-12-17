<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    use HasFactory;

    protected $table = 'pairs';

    public $primaryKey = 'id';

    public $timestamps = true;
}
