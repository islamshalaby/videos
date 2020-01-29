<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->paginate(30);
        return view('home', compact('videos'));
    }

    public function categoryVideos($id) {
        $category = Category::findOrFail($id);
        $videos = $category->videos()->paginate(30);

        return view('front-end.categories.index', compact(['videos', 'category']));
    }

    public function skillsVideos($id) {
        $skill = Skill::findOrFail($id);
        $videos = Video::whereHas('skills', function ($query) use ($id) {
            $query->where('skill_id', $id);
        })->orderBy('id', 'desc')->paginate(30);

        return view('front-end.skills.index', compact('skill', 'videos'));
    }

    public function tagsVideos($id) {
        $tag = Tag::findOrFail($id);
        $videos = Video::whereHas('tags', function ($query) use ($id) {
            $query->where('tag_id', $id);
        })->orderBy('id', 'desc')->paginate(30);

        return view('front-end.tags.index', compact('tag', 'videos'));
    }

    public function video($id) {
        $video = Video::findOrFail($id);

        return view('front-end.videos.index', compact('video'));
    }
}
