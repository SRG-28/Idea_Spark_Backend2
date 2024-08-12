<?php

namespace App\Http\Controllers;

use App\Models\ActionBrainstorming;
use Illuminate\Http\Request;

class ActionBrainstormingController extends Controller
{
    /*
    public function index()
    {
        return ActionBrainstorming::all();
    }*/
    public function index(Request $request)
{
    $user = $request->user();
    $actionBrainstormings = ActionBrainstorming::where('user_id', $user->id)->get();
    return $actionBrainstormings;
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'stop' => 'required|string',
            'minimize' => 'required|string',
            'keepGoing' => 'required|string',
            'doMore' => 'required|string',
            'start' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        return ActionBrainstorming::create($validated);
    }

    public function show($id)
    {
        return ActionBrainstorming::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'stop' => 'sometimes|required|string',
            'minimize' => 'sometimes|required|string',
            'keepGoing' => 'sometimes|required|string',
            'doMore' => 'sometimes|required|string',
            'start' => 'sometimes|required|string',
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        $actionBrainstorming = ActionBrainstorming::findOrFail($id);
        $actionBrainstorming->update($validated);

        return $actionBrainstorming;
    }

    public function destroy($id)
    {
        ActionBrainstorming::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
