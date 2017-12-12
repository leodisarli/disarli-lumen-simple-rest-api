<?php
 
namespace App\Http\Controllers;
 
use App\Candidate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
 
class CandidateController extends Controller
{
 
	public function list()
    {
    	$candidates  = Candidate::all();
    	return response()->json($candidates);
	}

    public function create(Request $request)
    {
    	$candidate = Candidate::create($request->all());
    	return response()->json($candidate);
	}
 
    public function update(Request $request, $id)
    {
    	$candidate  = Candidate::find($id);
    	$candidate->name = $request->input('name');
    	$candidate->age = $request->input('age');
    	$candidate->save();
    	return response()->json($candidate);
	}  
 
    public function delete($id)
    {
    	$candidate  = Candidate::find($id);
    	$candidate->delete();
    	return response()->json('Removed successfully.');
	}
}
