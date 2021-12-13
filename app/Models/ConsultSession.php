<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultSession extends Model
{
    use HasFactory;

    protected $appends = ['mentor'];
    protected $append = ['status_text'];

    public function getMentorAttribute()
    {
        $mentor = \App\Models\User::find($this->mentor_id);
        return $mentor->name;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getStatusTextAttribute()
    {
        if ($this->status == 0) {
            return '<span class="badge badge-danger">Menunggu Konfirmasi</span>';
        } else {
            return '<span class="badge badge-success">Konsultasi Disetujui</span>';
        }
    }
}
