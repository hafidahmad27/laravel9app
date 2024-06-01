<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'NamaSales', 'Aktif', 'Tanggal_Lahir', 'Paraf'
    ];
}
