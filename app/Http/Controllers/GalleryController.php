<?php
namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Picture';
        $method = 'POST';
        $route = route('gallery.store');
        return view('admin.gallery.editor', compact('title', 'method', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $picture = $request->file('picture');
        $name = uniqid().'.'.$picture->getClientOriginalExtension();
        $picture->move('assets/gallery/', $name);
        $validate['picture'] = $name;
        Gallery::create($validate);

        return redirect()->route('gallery.index');
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
        $title = 'Edit Picture';
        $method = 'PUT';
        $gallery = Gallery::where('id', $id)->first();
        $route = route('gallery.update', $gallery);
        return view('admin.gallery.editor', compact('title', 'method', 'route', 'gallery'));
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
        $galleries = Gallery::find($id);
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'picture' => 'sometimes|image'
        ]);
        if ($request->hasFile('picture')) {
            if (file_exists(public_path('assets/gallery/'.$galleries->picture))) {
                unlink(public_path('assets/gallery/'.$galleries->picture));
            }
            $picture = $request->file('picture');
            $name = uniqid().'.'.$picture->getClientOriginalExtension();
            $picture->move('assets/gallery/', $name);
            $validate['picture'] = $name;
        }
        $galleries->update($validate);
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Gallery::where('id', $id);
        $destroy->delete();

        // if (file_exists(public_path('assets/gallery/'.$destroy->picture))) {
        //     unlink(public_path('assets/gallery/'.$destroy->picture));
        // }
        $destroy->delete();
        return back();
    }
}
