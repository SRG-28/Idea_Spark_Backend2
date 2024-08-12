<?php

namespace App\Http\Controllers;

use App\Models\SixHat;
use Illuminate\Http\Request;

class SixHatController extends Controller
{
   /* public function index()
    {
        return SixHat::all();
    }
*/
    public function index(Request $request)
    {
        $user = $request->user();
        $sixHats = SixHat::where('user_id', $user->id)->get();
        return $sixHats;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'information' => 'required|string',
            'emotions' => 'required|string',
            'discernment' => 'required|string',
            'optimisticResponse' => 'required|string',
            'creativity' => 'required|string',
            'overview' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        return SixHat::create($validated);
    }

    public function show($id)
    {
        return SixHat::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'information' => 'sometimes|required|string',
            'emotions' => 'sometimes|required|string',
            'discernment' => 'sometimes|required|string',
            'optimisticResponse' => 'sometimes|required|string',
            'creativity' => 'sometimes|required|string',
            'overview' => 'sometimes|required|string',
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        $sixHat = SixHat::findOrFail($id);
        $sixHat->update($validated);

        return $sixHat;
    }

    public function destroy($id)
    {
        SixHat::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}

