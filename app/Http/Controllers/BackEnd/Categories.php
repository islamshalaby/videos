<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Categories\Store;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Categories extends BackEndController
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function store(Store $request)
    {
        $post = $request->all();
        Category::create($post);

        return redirect()->route($this->getClassNameFromModel() . '.index');
    }


    public function update($id, Store $request)
    {

        $post = $request->all();


        Category::findOrFail($id)->update($post);

        return redirect()->route($this->getClassNameFromModel() . '.index');
    }
}
