<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultSession extends Model
{
    use HasFactory;

    protected $appends = ['mentor', 'start_at', 'end_at'];
    protected $guarded = ['id'];

    public function getMentorAttribute()
    {
        $mentor = \App\Models\User::find($this->mentor_id);
        return $mentor->name;
    }

    public function getStartAtAttribute()
    {
        $waktu = [1=>'08:00', '11:00', '14:00'];
        return $waktu[$this->sesi_ke];
    }

    public function getEndAtAttribute()
    {
        $waktu = [1=>'10:00', '13:00', '15:00'];
        return $waktu[$this->sesi_ke];
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
