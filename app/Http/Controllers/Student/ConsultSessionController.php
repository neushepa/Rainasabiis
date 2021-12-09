<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ConsultSession;
use App\Models\User;
use Illuminate\Http\Request;

class ConsultSessionController extends Controller
{
    public function index()
    {
        $consult = ConsultSession::where('user_id', auth()->user()->id)->whereDate('created_at', date('Y-m-d'))->first();
        $mentors = User::where('role', 'mentor')->get();
        $link = null;
        if($consult){
            $link = '<button type="button" class="btn btn-warning">Belum Ada</button>';
            if(!is_null($consult->link)){
                $link = '<button type="button" class="btn btn-warning">Belum Waktunya</button>';
                if($consult->start_at<=date('H:i')&&$consult->end_at>=date('H:i')){
                    $link = '<a href="'.$consult->link.'" class="btn btn-primary">Link Konsultasi</a>';
                }
            }
        }
        return view('student.consult.index', compact('mentors', 'consult', 'link'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'topic' => 'required',
            'mentor_id' => 'required',
            'sesi_ke' => 'required|between:1,3'
        ]);
        $validate['user_id'] = auth()->user()->id;
        ConsultSession::create($validate);
        return back();
    }

    public function get_mentor(User $mentor)
    {
        $sessions = [
            ['value'=>1,'text'=>'Ke-1 dari jam 8-10 wib'],
            ['value'=>2,'text'=>'Ke-2 dari jam 11-01 wib'],
            ['value'=>3,'text'=>'Ke-3 dari jam 2-3 wib'],
        ];
        $sesi = $mentor->mentor_consult_sessions()->whereDate('created_at', date('Y-m-d'))->pluck('sesi_ke');
        foreach($sesi as $s){
            unset($sessions[$s-1]);
        }
        return array_values($sessions);
    }

    public function history()
    {
        $consults = ConsultSession::where('user_id', auth()->user()->id)->orderByDesc('created_at')->get();
        return view('student.consult.history', compact('consults'));
    }
}
