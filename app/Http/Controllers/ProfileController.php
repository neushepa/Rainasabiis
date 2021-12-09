<?php
namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = [
        //     'title' => 'Edit Profile',
        //     'method' => 'PUT',
        //     'route' => route('profile.update', $id),
        //     'pro' => User::where('id', $id)->first(),
        // ];
        // return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            'title' => 'Edit Profile',
            'method' => 'PUT',
            'route' => route('profile.update', $id),
            'pro' => User::where('id', $id)->first(),
        ];
        return view('admin.user.index', $data);
        dd($data);
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
        $pro = User::find($id);
        $pro->id_number = $request->id_number;
        $pro->name = $request->name;
        $pro->email = $request->email;
        $pro->phone = $request->phone;
        $pro->gender = $request->gender;
        $pro->religion = $request->religion;
        $pro->dob = $request->dob;
        $pro->blod_type = $request->blod_type;
        $pro->address = $request->address;
        $pro->instagram = $request->instagram;
        $pro->facebook = $request->facebook;
        $pro->twitter = $request->twitter;
        $pro->bio = $request->bio;

        $pro->save();
        return redirect()->route('profile.edit', $id)->with('success', 'Profile Updated');
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
}
