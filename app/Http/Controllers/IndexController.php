<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index(Project $project){
        $projects = $project->get();
        return view('index', compact('projects'));
    }

    public function storeProject()
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        Project::forceCreate([
            'name' => request('name'),
            'description' => request('description')
        ]);

        return ['message' => 'Project Created!'];
    }

}
