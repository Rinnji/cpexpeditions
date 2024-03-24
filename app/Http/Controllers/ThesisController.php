<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Thesis;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class ThesisController extends Controller
{

    public function index(Request $request)
    {
        $theses = Thesis::latest()->paginate(10);

        return view('thesis.index', compact('theses'));
    }
    public function create(Request $request)
    {
        error_log(json_encode($request));
        return view('thesis.create');
    }
    public function store(Request $request)
    {
        error_log(json_encode($request->all()));
        $request->validate([
            'title' => 'required',
            'abstract' => 'required',
            'body' => 'required',
            'date_published' => 'required',
            'first_name' => 'required|array|min:1', // Ensure at least one first name
            'first_name.*' => 'required|string', // Validate each first name
            'last_name' => 'required|array|min:1', // Ensure at least one last name
            'last_name.*' => 'required|string', // Validate each last name

        ]);

        $authors = [];

        foreach ($request->input('first_name') as $key => $value) {
            $author = new Author();
            $author->first_name = $request->input('first_name')[$key];
            $author->middle_name = $request->input('middle_name')[$key];
            $author->last_name = $request->input('last_name')[$key];
            $find_author = Author::where('first_name', $author->first_name)->where('middle_name', $author->middle_name)->where('last_name', $author->last_name)->first();

            if (!$find_author) {
                $author->save();
            }
            $author = Author::where('first_name', $author->first_name)->where('middle_name', $author->middle_name)->where('last_name', $author->last_name)->first();

            $authors[] = $author->id;
        }
        error_log(json_encode($authors));

        $thesis = new Thesis();
        $thesis->title = $request->input('title');
        $thesis->abstract = $request->input('abstract');
        $thesis->body = $request->input('body');
        $thesis->date_published = $request->input('date_published');
        $thesis->save();
        $thesis->authors()->attach($authors);
        return redirect('thesis');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $theses = Thesis::where('title', 'like', "%$search%")->orWhere('abstract', 'like', "%$search%")->orWhere('body', 'like', "%$search%")->latest()->paginate(3);

        return view('thesis.search', compact('theses'));
    }
    public function show(Request $request, $thesis_id)
    {
        $thesis = Thesis::findOrFail($thesis_id);
        return view('thesis.details', compact('thesis'));
    }
    public function update(Request $request)
    {
    }
}
