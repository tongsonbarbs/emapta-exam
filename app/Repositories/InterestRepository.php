<?php

namespace App\Repositories;

use App\Models\Interest;
use Illuminate\Database\Eloquent\Collection;

class InterestRepository 
{
    public function getInterests() {
        return Interest::all();
    }

    public function getInterest($id) {
        return Interest::where('id', $id)->first();
    }

    public function createInterest($request) {
        $interest = new Interest;

        if (Interest::where('name', $request->name)->exists()) {
            return response()->json('Interest already exist.', 400);
        }

        $interest->name = $request->name;

        $interest->save();

        return $interest;
    }

    public function deleteInterest($id) {
        $interest = Interest::where('id', $id)->first();

        if ($interest === null) {
            return response()->json('Interest doesn\'t exist.', 400);
        }

        $interest->delete();
    }
}