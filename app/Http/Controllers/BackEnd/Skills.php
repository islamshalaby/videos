<?php

namespace App\Http\Controllers\BackEnd;



use App\Http\Requests\BackEnd\Skills\Store;
use App\Models\Skill;

class Skills extends BackEndController
{
    public function __construct(Skill $model)
    {
        parent::__construct($model);
    }

    public function store(Store $request)
    {
        $post = $request->all();
        Skill::create($post);

        return redirect()->route($this->getClassNameFromModel() . '.index');
    }


    public function update($id, Store $request)
    {

        $post = $request->all();


        Skill::findOrFail($id)->update($post);

        return redirect()->route($this->getClassNameFromModel() . '.index');
    }
}
