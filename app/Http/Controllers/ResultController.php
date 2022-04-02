<?php

namespace App\Http\Controllers;
use App\Models\Result;
use Illuminate\Http\Request;
use PDF;
use Response;
class ResultController extends Controller
{
    public function generatePDF()
    {

        $data = ['title' => 'Welcome to ...'];
        $pdf = PDF::loadView('myResult', $data);

        return $pdf->stream('itsolun.pdf');
    }

     function __construct()
    {
         $this->middleware('permission:result-list|result-create|result-edit|result-delete', ['only' => ['index','show']]);
         $this->middleware('permission:result-create', ['only' => ['create','store']]);
         $this->middleware('permission:result-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:result-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $results = Result::latest()->paginate(5);
        return view('results.index',compact('results'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('results.create');
    }


    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        result::create($request->all());

        return redirect()->route('results.index')
                        ->with('success','result created successfully.');
    }


    public function show(Result $result)
    {
        return view('results.show',compact('result'));
    }


    public function edit(Result $result)
    {
        return view('results.edit',compact('result'));
    }


    public function update(Request $request, Result $result)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $result->update($request->all());

        return redirect()->route('results.index')
                        ->with('success','result updated successfully');
    }


    public function destroy(Result $result)
    {
        $result->delete();

        return redirect()->route('results.index')
                        ->with('success','result deleted successfully');
    }
}
