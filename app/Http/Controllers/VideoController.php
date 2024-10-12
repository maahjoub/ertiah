<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Type;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\AttachFilesTrait;

class VideoController extends Controller
{
    use AttachFilesTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        $classRoms = Classroom::all();
        $categories= Category::all();
        $types = Type::all();
        return view('video.create', compact(['grades', 'classRoms', 'categories', 'types']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'description' => 'required',
            'video_src' => ['required','mimetypes:video/mp4,video/mpeg'],
            'video_img_src' => ['required', 'mimetypes:image/jpeg,image/png,image/jpg'],
            'grade_id' => 'required',
            'class_id' => 'required',
            'type_id' => 'required',
            'category_id' => 'required',
        ]);
     $videoSrc = $this->newUploade($request, 'video_src' , 'video', $request->name_en);
     $image = $this->newUploade($request, 'video_img_src' , 'image', $request->name_en);

        $video = new Video();
           $video->title = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $video->video_url = $videoSrc;
            $video->image_url = $image;
            $video->description = $request->description;
            $video->user_id = \auth()->id();
            $video->grade_id = $request->grade_id;
            $video->classroom_id = $request->class_id;
            $video->category_id = $request->type_id;
            $video->type_id = $request->category_id;
            $video->save();

        return redirect()->route('video.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('video.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('video.edit');
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
        $validated = $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'description' => 'required',
            'video_src' => 'mimetypes:video/mp4,video/mpeg',
            'video_img_src' => 'mimetypes:image/jpeg,image/png,image/jpg',
            'grade_id' => 'required',
            'class_id' => 'required',
            'type_id' => 'required',
            'category_id' => 'required',
        ]);
        if ($request->file(('video_src'))) {
            deleteFile('public/attachments/video', $$video->video_url);
            $videoSrc = $this->newUploade($request, 'video_src' , 'video', $request->name_en);
        }
        if ($request->file(('video_img_src'))) {
            deleteFile('public/attachments/image', $$video->image_url);
            $image = $this->newUploade($request, 'video_img_src' , 'image', $request->name_en);
        }

        $video->title = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $video->video_url = $videoSrc;
        $video->image_url = $image;
        $video->description = $request->description;
        $video->user_id = \auth()->id();
        $video->grade_id = $request->grade_id;
        $video->classroom_id = $request->class_id;
        $video->category_id = $request->type_id;
        $video->type_id = $request->category_id;
        $video->save();

        return redirect()->route('video.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        Auth::guard('web')->check()->delete();
        return redirect()->back();
    }
}
