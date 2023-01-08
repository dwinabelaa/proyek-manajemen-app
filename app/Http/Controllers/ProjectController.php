<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projek', ['data'=> DB::table('projects')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahdata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'name' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'leader_name' => 'required|string|max:255',
            'leader_email'=> 'required|email',
            'leader_image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date'=> 'required|date|before:end_date',
            'end_date'=> 'required|date|after:start_date',
            'progress'=> 'required',
            ]);
            
            $imageName = time() . '.' . $request->leader_image->extension();
            $request->leader_image->move(public_path('images'), $imageName);
            
            Projects::create([
                'name' => $validasi['name'],
                'client' => $validasi['client'],
                'leader_name' => $validasi['leader_name'],
                'leader_email' => $validasi['leader_email'],
                'leader_image' => $imageName,
                'start_date' => $validasi['start_date'],
                'end_date' => $validasi['end_date'],
                'progress' => $validasi['progress'],
            ]);
            return back()->with('msg', 'data berhasil ditambah');
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
        return view('editdata', ['data'=> Projects::find($id)]);
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
        $validasi = $request->validate([
            'name' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'leader_name' => 'required|string|max:255',
            'leader_email'=> 'required|email',
            'leader_image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date'=> 'required|date|before:end_date',
            'end_date'=> 'required|date|after:start_date',
            'progress'=> 'required',
            ]);
           if($request->hasFile('leader_image')){
              $image_path = public_path('images') . '/' . Projects::find($id)->leader_image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
               $imageName = time() . '.' . $request->leader_image->extension();
               $request->leader_image->move(public_path('images'), $imageName);

               Projects::where('id', $id)->update([
                'name' => $validasi['name'],
                'client' => $validasi['client'],
                'leader_name' => $validasi['leader_name'],
                'leader_email' => $validasi['leader_email'],
                'leader_image' => $imageName,
                'start_date' => $validasi['start_date'],
                'end_date' => $validasi['end_date'],
                'progress' => $validasi['progress'],
            ]);
            return back()->with('msg', 'data berhasil diubah');
                
           }
            
            Projects::where('id', $id)->update($validasi);
            return back()->with('msg', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image_path = public_path('images') . '/' . Projects::find($id)->leader_image;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        Projects::destroy($id);
        return back()->with('msg', 'Projek berhasil dihapus');
    }
}
