<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $data = [
                'title' => 'List Artikel',
                'testimoni'  => Testimoni::all(),
                'route' => route('testimoni.create'),
            ];
        } else {
            $data = [
                'title' => 'List Artikel',
                'testimoni'  => Testimoni::where('user_id', auth()->user()->id)->get(),
                'route' => route('testimoni.create'),
            ];
        }
        return view('admin.testimoni.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'New Article',
            'method' => 'POST',
            'route' => route('testimoni.store'),
        ];
        return view('admin.testimoni.editor', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkTestimoni = Testimoni::where('user_id', auth()->user()->id)->first();

        if ($checkTestimoni) {
            $data = [
                'title' => 'New Article',
                'method' => 'POST',
                'route' => route('testimoni.store'),
            ];

            return view('admin.testimoni.editor', $data)->with('error', 'Anda hanya bisa membuat 1 testimoni');
        }
        $ts = new Testimoni;
        $user_id = auth()->user()->id;

        $ts->user_id = $user_id;
        $ts->title = $request->title;
        $ts->testimoni = $request->testimoni;
        $ts->save();
        return redirect()->route('testimoni.index');
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
            'title' => 'Edit Testimoni',
            'method' => 'PUT',
            'route' => route('testimoni.update', $id),
            'ts' => Testimoni::where('id', $id)->first(),
        ];
        return view('admin.testimoni.editor', $data);
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
        $ts = Testimoni::find($id);
        $user_id = auth()->user()->id;

        //$post->user_id = $user_id;
        $ts->title = $request->title;
        $ts->testimoni = $request->testimoni;
        $ts->update();
        return redirect()->route('testimoni.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Testimoni::where('id', $id);
        $destroy->delete();
        return redirect(route('testimoni.index'));
    }

    public function status($id)
    {
        $testimoni = Testimoni::find($id);
        $testimoni->status = ($testimoni->status == 1) ? 0 : 1;
        $testimoni->save();
        return redirect()->route('testimoni.index');
    }
}
