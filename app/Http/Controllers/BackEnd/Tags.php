<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Tags\Store;
use App\Models\Tag;

class Tags extends BackEndController
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

    public function store(Store $request)
    {
        $post = $request->all();
        $this->model::create($post);

        return redirect()->route($this->getClassNameFromModel() . '.index');
    }


    public function update($id, Store $request)
    {

        $post = $request->all();


        $this->model::findOrFail($id)->update($post);

        return redirect()->route($this->getClassNameFromModel() . '.index');
    }
}
