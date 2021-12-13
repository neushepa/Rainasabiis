<?php
namespace App\Http\Controllers;

use App\Models\ConsultSession;
use App\Models\Page;
use App\Models\Post;
use App\Models\Testimoni;
use App\Models\User;

class FrontendController extends Controller
{
    public function index()
    {
        $data = [
            //'title' => 'Blog List',
            'post' => Post::orderBy('created_at', 'desc')->paginate(3),
            'mentors' => User::where('role', 'mentor')->get(),
            'testimonis' => Testimoni::where('status', '1')->get(),
        ];
        //dd($data);
        return view('/frontend.home', $data);
    }

    public function consult()
    {
        $data = [
            'sessions' => ConsultSession::where('user_id', auth()->user()->id)->get(),
            'mentor' => User::where('role', 'mentor')->get(),
        ];
        //return view('frontend.consult', $data);
        return view('student.dashboard', $data);
    }

    public function blog()
    {
        return view('frontend.blog');
    }

    public function about()
    {
        $data = [
            'title' => 'About US',
            'page' => Page::where('p_slug', 'about')->first()
        ];
        return view('frontend.about', $data);
    }

    public function konsul()
    {
        $data = [
            'title' => 'About US',
            'page' => Page::where('p_slug', 'consult')->first()
        ];
        return view('frontend.consult', $data);
    }
}
