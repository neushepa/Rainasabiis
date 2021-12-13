<?php
namespace App\Http\Controllers;

use App\Models\question;
use App\Models\UjianHasil;
use Illuminate\Http\Request;

class UjiancController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Test TPA',
            'soal' => Question::All(),
            'method' => 'POST',
            'route' => route('student.ujian.store'),
        ];
        return view('admin.question.test', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hasil = new UjianHasil();
        $user_id = auth()->user()->id;

        $hasil->user_id = $user_id;
        $hasil->soal_id = $request->id_soal;
        $hasil->jawaban = $request->jawaban;
        $hasil->correct = $request->correct;
        $hasil->save();
        return redirect()->route('student.ujian.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function hasil()
    {
        $data= [
            'title' => 'Hasil Ujian',
            'hasil'  => UjianHasil::get(),
        ];
        return view('admin.question.hasil', $data);
    }
}
