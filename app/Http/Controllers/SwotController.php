<?php

namespace App\Http\Controllers;

use App\Models\Swot;
use Illuminate\Http\Request;

class SwotController extends Controller
{
    /*
    public function index()
    {
        return Swot::all();
    }
        */
    public function index(Request $request)
    {
        $user = $request->user();
        $swots = Swot::where('user_id', $user->id)->get();
        return $swots;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'strengths' => 'required|string',
            'weaknesses' => 'required|string',
            'opportunities' => 'required|string',
            'threats' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        return Swot::create($validated);
    }

    public function show($id)
    {
        return Swot::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'strengths' => 'sometimes|required|string',
            'weaknesses' => 'sometimes|required|string',
            'opportunities' => 'sometimes|required|string',
            'threats' => 'sometimes|required|string',
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        $swot = Swot::findOrFail($id);
        $swot->update($validated);

        return $swot;
    }

    public function destroy($id)
    {
        Swot::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
