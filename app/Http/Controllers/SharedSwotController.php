<?php

namespace App\Http\Controllers;

use App\Models\SharedSwot;
use Illuminate\Http\Request;

class SharedSwotController extends Controller
{
    public function index()
    {
        return SharedSwot::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'swot_id' => 'required|exists:swots,id',
        ]);

        return SharedSwot::create($validated);
    }

    public function show($id)
    {
        return SharedSwot::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'swot_id' => 'sometimes|required|exists:swots,id',
        ]);

        $sharedSwot = SharedSwot::findOrFail($id);
        $sharedSwot->update($validated);

        return $sharedSwot;
    }

    public function destroy($id)
    {
        SharedSwot::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
