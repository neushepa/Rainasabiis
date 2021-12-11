<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $append = ['status_text'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    function getStatusTextAttribute()
    {
        if ($this->status == 0) {
            return '<span class="badge badge-danger">Belum Ditampilkan</span>';
        } else {
            return '<span class="badge badge-success">Sudah Ditampilkan</span>';
        }
    }
}
