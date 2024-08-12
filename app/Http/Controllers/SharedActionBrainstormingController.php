<?php

namespace App\Http\Controllers;

use App\Models\SharedActionBrainstorming;
use Illuminate\Http\Request;

class SharedActionBrainstormingController extends Controller
{
    public function index()
    {
        return SharedActionBrainstorming::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'actionBrainstorming_id' => 'required|exists:actionBrainstormings,id',
        ]);

        return SharedActionBrainstorming::create($validated);
    }

    public function show($id)
    {
        return SharedActionBrainstorming::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'actionBrainstorming_id' => 'sometimes|required|exists:actionBrainstormings,id',
        ]);

        $sharedActionBrainstorming = SharedActionBrainstorming::findOrFail($id);
        $sharedActionBrainstorming->update($validated);

        return $sharedActionBrainstorming;
    }

    public function destroy($id)
    {
        SharedActionBrainstorming::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
