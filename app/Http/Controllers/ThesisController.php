<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Thesis;
use Illuminate\Http\Request;
use DateTime;
use function Laravel\Prompts\error;

class ThesisController extends Controller
{

    public function index(Request $request)
    {
        $theses = Thesis::latest()->paginate(10);

        return view('thesis.index');
    }
    public function json_pagination(Request $request)
    {
        $page = $request->input('page');

        $theses = Thesis::with('authors')->latest()->paginate(10, ['*'], 'page', $page);
        return response()->json($theses);
    }

    public function create(Request $request)
    {
        error_log(json_encode($request));
        return view('thesis.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'abstract' => 'required',
            'summary_of_findings' => 'required',
            'conclusion' => 'required',
            'recommendations' => 'required',
            'start_school_year' => 'required',
            'end_school_year' => 'required',
            'adviser' => 'required',
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

        error_log("test");
        try {

            $thesis = new Thesis();
            $thesis->title = $request->input('title');
            $thesis->abstract = $request->input('abstract');
            $thesis->summary_of_findings = $request->input('summary_of_findings');
            $thesis->conclusion = $request->input('conclusion');
            $thesis->recommendations = $request->input('recommendations');
            $thesis->start_schoolyear = DateTime::createFromFormat('Y', $request->input('start_school_year'));
            $thesis->end_schoolyear =  DateTime::createFromFormat('Y', $request->input('end_school_year'));
            $thesis->adviser = $request->input('adviser');
            $thesis->date_published = $request->input('date_published');
            $thesis->save();
            $thesis->authors()->attach($authors);

            return redirect('thesis');
        } catch (\Exception $e) {

            return redirect('thesis/create')->withErrors(['error' => 'An error occurred']);
        }
    }
    public function search(Request $request)
    {
        $search = $request->input('search');

        return view('thesis.search', compact("search"));
    }
    public function json_searchbar(Request $request)
    {
        $search = $request->input('search');

        $theses = Thesis::where('title', 'like', "%$search%")->orWhere('abstract', 'like', "%$search%")->orWhere('summary_of_findings', 'like', "%$search%")->orWhere('start_schoolyear', 'like', "%$search%")->orWhere('end_schoolyear', 'like', "%$search%")->orWhere('adviser', 'like', "%$search%")->latest('date_published')->take(4)->get();

        return response()->json($theses);
    }
    public function json_search(Request $request)
    {
        $search = $request->input("search");
        $page = $request->input('page');
        $theses = Thesis::with('authors')
            ->where('title', 'like', "%$search%")
            ->orWhere('abstract', 'like', "%$search%")
            ->orWhere('summary_of_findings', 'like', "%$search%")
            ->orWhere('start_schoolyear', 'like', "%$search%")
            ->orWhere('end_schoolyear', 'like', "%$search%")
            ->orWhere('adviser', 'like', "%$search%")
            ->latest()
            ->paginate(10, ['*'], 'page', $page);
        return response()->json($theses);
    }
    public function show(Request $request, $thesis_id)
    {
        $thesis = Thesis::findOrFail($thesis_id);
        return view('thesis.details', compact('thesis'));
    }
    public function update(Request $request)
    {
    }
    public function destroy(Request $request, $id)
    {
        $thesis = Thesis::findOrFail($id);
        $thesis->delete();
        return redirect('thesis');
    }
}
