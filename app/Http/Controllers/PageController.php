<?php
namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'List Artikel',
            'page'  => Page::get(),
            'route' => route('page.create'),
        ];
        return view('admin.page.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'New Page',
            'method' => 'POST',
            'route' => route('page.store'),
        ];
        return view('admin.page.editor', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Page;
        $user_id = auth()->user()->id;
        $page->user_id = $user_id;
        $page->p_title = $request->p_title;
        $page->p_slug = $request->p_slug;
        $page->p_excerpt = $request->p_excerpt;
        $page->p_body = $request->p_body;
        $page->save();
        return redirect()->route('page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // $data = [
        //     'title' => 'Post Detail',
        //     'page' => Page::where('slug', $slug)->first()
        // ];
        // //dd($data);
        // return view('frontend.about', $data);
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
            'title' => 'Edit Page',
            'method' => 'PUT',
            'route' => route('page.update', $id),
            'pages' => Page::where('id', $id)->first(),
        ];
        return view('admin.page.editor', $data);
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
        $page = page::find($id);
        //$user_id = auth()->user()->id;
        $page->p_title = $request->p_title;
        $page->p_slug = $request->p_slug;
        $page->p_excerpt = $request->p_excerpt;
        $page->p_body = $request->p_body;
        $page->update();
        return redirect()->route('page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy =Page::where('id', $id);
        $destroy->delete();
        return redirect(route('page.index'));
    }
}
