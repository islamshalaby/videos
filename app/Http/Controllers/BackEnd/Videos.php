<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Videos\Update;
use App\Http\Requests\BackEnd\Videos\Store;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;

class Videos extends BackEndController
{
    public function __construct(Video $model)
    {
        parent::__construct($model);
    }

    use CommentTrait;

    protected function append()
    {
        $array = [
            'categories' => Category::get(),
            'skills' => Skill::get(),
            'tags' => Tag::get(),
            'skillsArray' => [],
            'tagsArray' => [],
            'comments' => []
        ];

        if (request()->route()->parameter('video')) {
            $array['skillsArray'] = $this->model::findOrFail(request()->route()->parameter('video'))->skills()->get()->pluck('id')->toArray();
            $array['tagsArray'] = $this->model::findOrFail(request()->route()->parameter('video'))->tags()->pluck('tags.id')->toArray();
            $array['comments'] = $this->model::findOrFail(request()->route()->parameter('video'))->comments()->orderBy('id', 'desc')->with('user')->get();
        }

        return $array;
    }

    public function store(Store $request)
    {
        $post = $request->all();
        $post['user_id'] = auth()->user()->id;
        $post['image'] = $this->uploadeImage($request);
        $row = $this->model::create($post);
        $this->syncRelationships($row, $post);

        return redirect()->route($this->getClassNameFromModel() . '.index');
    }


    public function update($id, Update $request)
    {

        $post = $request->all();
        $row = $this->model::findOrFail($id);
        if ($request->hasFile('image')) {
            $post['image'] = $this->uploadeImage($request);
        }
        $row->update($post);

        $this->syncRelationships($row, $post);

        return redirect()->route($this->getClassNameFromModel() . '.index');
    }

    public function syncRelationships($row, $post) {
        if (isset($post['skills']) && !empty($post['skills'])) {
            $row->skills()->sync($post['skills']);
        }

        if (isset($post['tags']) && !empty($post['tags'])) {
            $row->tags()->sync($post['tags']);
        }
    }

    public function uploadeImage($request) {
        $file = $request->file('image');
        $imageName = time() . "_" . $file->getClientOriginalName();
        $file->move('images', $imageName);

        return $imageName;
    }
}
