<?php
namespace App\Http\Controllers;

use App\Models\question;
use App\Models\UjianHasil;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= [
            'title' => 'List Pertanyaan',
            'question'  => question::get(),
            'route' => route('question.create'),
        ];
        return view('admin.question.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'New Question',
            'method' => 'POST',
            'route' => route('question.store'),
        ];
        return view('admin.question.editor', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new Question();
        $question->question = $request->question;
        $question->answera = $request->opt_a;
        $question->answerb = $request->opt_b;
        $question->answerc = $request->opt_c;
        $question->answerd = $request->opt_d;
        $question->answere = $request->opt_e;
        $question->correct = $request->correct;
        $question->save();
        return redirect()->route('question.index');
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
        $data = [
            'title' => 'Edit Question',
            'method' => 'PUT',
            'route' => route('question.update', $id),
            'question' => Question::where('id', $id)->first(),
        ];
        return view('admin.question.editor', $data);
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
        $quest = Question::find($id);
        $quest->question = $request->question;
        $quest->answera = $request->opt_a;
        $quest->answerb = $request->opt_b;
        $quest->answerc = $request->opt_c;
        $quest->answerd = $request->opt_d;
        $quest->answere = $request->opt_e;
        $quest->correct = $request->correct;
        $quest->update();
        return redirect()->route('question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy =Question::where('id', $id);
        $destroy->delete();
        return redirect(route('question.index'));
    }

    public function test()
    {
        // $data = [
        //     'title' => 'Test TPA',
        //     'soal' => Question::All(),
        //     'method' => 'POST',
        //     'route' => route('student.simpanJawaban'),
        // ];
        // return view('admin.question.test', $data);
    }

    // public function simpanJawaban(Request $request)
    // {
    //     $ljk = new UjianHasil();
    //     $user_id = auth()->user()->id;

    //     $ljk->user_id = $request->$user_id;
    //     $ljk->soal_id = $request->$soal_id;
    //     $ljk->jawaban = $request->$jawaban;

    //     dd($request);
    //     //return redirect()->route('student.dashboard');
    // }
}
