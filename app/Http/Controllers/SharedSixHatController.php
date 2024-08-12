<?php

namespace App\Http\Controllers;

use App\Models\SharedSixHat;
use Illuminate\Http\Request;

class SharedSixHatController extends Controller
{
    public function index()
    {
        return SharedSixHat::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'sixHats_id' => 'required|exists:sixHats,id',
        ]);

        return SharedSixHat::create($validated);
    }

    public function show($id)
    {
        return SharedSixHat::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'sixHats_id' => 'sometimes|required|exists:sixHats,id',
        ]);

        $sharedSixHat = SharedSixHat::findOrFail($id);
        $sharedSixHat->update($validated);

        return $sharedSixHat;
    }

    public function destroy($id)
    {
        SharedSixHat::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}

