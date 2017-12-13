<?php
 
namespace App\Http\Controllers;
 
use App\Candidates;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
 
class CandidatesController extends Controller
{
 
	public function list()
    {
    	$candidates  = Candidates::all();
    	return response()->json($candidates);
	}

    public function create(Request $request)
    {
    	$candidate = Candidates::create($request->all());
    	return response()->json($candidate);
	}
 
    public function update(Request $request, $id)
    {
    	$candidate  = Candidates::find($id);
    	$candidate->name = $request->input('name');
    	$candidate->age = $request->input('age');
    	$candidate->save();
    	return response()->json($candidate);
	}  
 
    public function delete($id)
    {
    	$candidate  = Candidates::find($id);
    	$candidate->delete();
    	return response()->json('Removed successfully.');
	}

	public function detail(Request $request, $id)
    {
    	$candidate  = Candidates::find($id);
    	return response()->json($candidate);
	}
}
