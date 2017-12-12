<?php
 
namespace App\Http\Controllers;
 
use App\Candidate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
class CandidateController extends Controller
{
 
    public function createCandidate(Request $request)
    {
    	$candidate = Candidate::create($request->all());
    	return response()->json($candidate);
	}
 
    public function updateCandidate(Request $request, $id)
    {
    	$candidate  = Candidate::find($id);
    	$candidate->name = $request->input('name');
    	$candidate->age = $request->input('age');
    	$candidate->save();
    	return response()->json($candidate);
	}  
 
    public function deleteCandidate($id)
    {
    	$candidate  = Candidate::find($id);
    	$candidate->delete();
    	return response()->json('Removed successfully.');
	}
 
    public function index()
    {
    	$candidates  = Candidate::all();
    	return response()->json($candidates);
	}
}
