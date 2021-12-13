<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianHasil extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];
    protected $append = ['status_text'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusTextAttribute()
    {
        if ($this->nilai < 75) {
            return '<span class="badge badge-danger">Tidak Memenuhi</span>';
        } else {
            return '<span class="badge badge-success">Memenuhi</span>';
        }
    }
}
