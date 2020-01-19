<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Pages\Store;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Pages extends BackEndController
{
    public function __construct(Page $model)
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
