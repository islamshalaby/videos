<?php
namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class BackEndController extends Controller {
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $title = $this->getPluralModule();
        $titleS = $this->getSModule();
        $pageTitle = "Control " . $title ;

        $pageDes = "Here you can add " . $titleS;
        $routeName = $this->getClassNameFromModel();
        $rows = $this->model;
        $rows = $this->filter($rows);
        $rows = $rows->paginate(10);
        return view('back-end/'. $this->getClassNameFromModel() . '/index', compact('rows', 'title', 'pageTitle', 'pageDes', 'titleS', 'routeName'));
    }

    public function create()
    {
        $title = $this->getPluralModule();
        $titleS = $this->getSModule();
        $pageTitle = "Create " . $titleS ;
        $pageDes = "Here you can add " . $titleS;
        $routeName = $this->getClassNameFromModel();
        $append = $this->append();
        return view('back-end/'. $this->getClassNameFromModel() .'/create', compact( 'title', 'pageTitle', 'pageDes', 'titleS', 'routeName'))->with($append);
    }

    public function edit($id)
    {
        $title = $this->getPluralModule();
        $titleS = $this->getSModule();
        $pageTitle = "Edit " . $titleS ;
        $pageDes = "Here you can add " . $titleS;
        $row = $this->model::findOrFail($id);
        $routeName = $this->getClassNameFromModel();
        $append = $this->append();
        return view('back-end/'. $this->getClassNameFromModel() .'/edit', compact('row', 'title', 'pageTitle', 'pageDes', 'titleS', 'routeName'))->with($append);
    }

    public function destroy($id)
    {
        $this->model::findOrFail($id)->delete();

        return redirect()->back();
    }

    protected function filter($rows)
    {
        return $rows;
    }

    protected function getClassNameFromModel()
    {
        return str_plural(strtolower($this->getSModule()));
    }

    protected function getPluralModule()
    {
        return str_plural($this->getSModule());
    }

    protected function getSModule()
    {
        return class_basename($this->model);
    }

    protected function append() {
        return [];
    }
}
