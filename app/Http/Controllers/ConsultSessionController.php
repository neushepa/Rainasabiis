<?php
namespace App\Http\Controllers;

use App\Models\ConsultSession;
use App\Models\User;
use Illuminate\Http\Request;

class ConsultSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = [
        //     'title' => 'Konsultasi',
        //     'method' => 'GET',
        //     'route' => route('consult-session.create'),
        //     'consult' => ConsultSession::get()
        // ];

        // return view('admin.consult-session.index', $data);

        if (auth()->user()->role == 'student') {
            $data = [
                'title' => 'Konsultasi',
                'method' => 'GET',
                'consult'  => ConsultSession::where('user_id', auth()->user()->id)->get(),
                'route' => route('consult-session.create'),
            ];
        } else {
            $data = [
                'title' => 'Konsultasi',
                'method' => 'GET',
                'consult'  => ConsultSession::all(),
                'route' => route('consult-session.create'),
            ];
        }
        return view('admin.consult-session.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $checkKonsul = ConsultSession::where('user_id', auth()->user()->id)
                        ->Where('Date(created_at) = CURDATE()');
        if ($checkKonsul) {
            $data = [
                'title' => 'Buat Konsultasi',
                'method' => 'POST',
                'mentor' => User::where('role', 'mentor')->get(),
                'student' => User::where('role', 'student')->get(),
                'route' => route('consult-session.store'),
            ];
            return view('admin.consult-session.editor', $data)->with('error', 'Anda sudah mengajukan jadwal konsultasi pada hari ini');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required',
            'user_id' => 'required',
            'mentor_id' => 'required',
            'start_at' => 'required',
            //'link' => 'required',
        ]);

        $checkSession = ConsultSession::where('mentor_id', intval($request->mentor_id))
            // ->where('status', 1)
            ->where('start_at', '>=', date('Y-m-d H:i:s', strtotime($request->start_at)))
            ->where('end_at', '<=', date('Y-m-d H:i:s', strtotime($request->end_at)))
            ->first();

        if ($checkSession) {
            $data = [
                'title' => 'Buat Konsultasi',
                'method' => 'POST',
                'mentor' => User::where('role', 'mentor')->get(),
                'student' => User::where('role', 'student')->get(),
                'route' => route('consult-session.store')
            ];
            return view('admin.consult-session.editor', $data)->with('error', 'Jadwal Konsultasi tidak tersedia');
        }

        $consult = new ConsultSession;
        $consult->topic = $request->topic;
        $consult->user_id = $request->user_id;
        $consult->mentor_id = $request->mentor_id;
        $consult->start_at = date('Y-m-d H:i:s', strtotime($request->start_at));
        $consult->end_at = date('Y-m-d H:i:s', strtotime($request->end_at));
        $consult->link = '-';
        $consult->save();

        return redirect()->route('consult-session.index')->with('success', 'Consult has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Konsultasi',
            'method' => 'PUT',
            'mentor' => User::where('role', 'mentor')->get(),
            'student' => User::where('role', 'student')->get(),
            'route' => route('consult-session.update', $id),
            'consult' => ConsultSession::find($id)
        ];

        return view('admin.consult-session.editor', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'topic' => 'required',
        //     'user_id' => 'required',
        //     'mentor_id' => 'required',
        //     'start_at' => 'required',
        //     'link' => 'required',
        // ]);

        $consult = ConsultSession::where('id', $id)->first();
        $consult->topic = $request->topic;
        $consult->user_id = $request->user_id;
        $consult->mentor_id = $request->mentor_id;
        $consult->start_at = date('Y-m-d H:i:s', strtotime($request->start_at));
        $consult->end_at = date('Y-m-d H:i:s', strtotime($request->end_at));
        $consult->link = $request->link;
        $consult->status = 1;
        $consult->save();
        //dd($request, $id);
        return redirect()->route('consult-session.index')->with('success', 'Consult has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ConsultSession::find($id)->delete();
        return redirect()->route('consult-session.index')->with('success', 'Consult has been deleted');
    }

    public function status($id)
    {
        $consult = ConsultSession::find($id);
        $consult->status = ($consult->status == 1) ? 0 : 1;
        $consult->save();
        return redirect()->route('consult-session.index');
    }
}
