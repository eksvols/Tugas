<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::latest()->paginate(5);

        return view('videos.index', compact('videos'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.create');
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
            'title' => 'required|string|max:255',
            'filename' => 'required|file|mimetypes:video/mp4',
        ]);

        $video = new Video;
        $video->title = $request->title;

        if($request->hasFile('filename'))
        {
            $path = $request->file('filename')->store('videos', ['disk' => 'my_files']);
            $video->filename = $path;
        }

        $video->save();
        return redirect()->route('videos.index')
                        ->with('success', 'Video Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
         $request->validate([
            'title' => 'required',
            'filename' => 'file|mimetypes:video/mp4',
        ]);
    
        $video->title = $request->title;
        $oldfile = $video->filename;
        if($request->hasFile('filename'))
        {
            $path = $request->file('filename')->store('videosfile', ['disk' => 'my_files']);
            $video->filename = $path;
            Storage::disk('my_files')->delete($oldfile);
            $video->save();
        }else{
            $video->save();
        }


    
        return redirect()->route('videos.index')
                        ->with('success','Video updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        Storage::disk('my_files')->delete($video->filename);
        $video->delete();
        return redirect()->route('videos.index')
                        ->with('success', 'Video deleted Successfully');
    }
}
