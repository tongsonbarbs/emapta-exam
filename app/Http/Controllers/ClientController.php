<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Repositories\ClientInterestRepository;
use App\Models\User;

class ClientController extends Controller
{
    private ClientInterestRepository $interest_repo;

    public function __construct(ClientInterestRepository $interest_repo) {
        $this->interest_repo = $interest_repo;
    }
    
    public function index() {
        return auth()->user()->clients()->get();
    }

    public function get($id) {
        return auth()->user()->clients()->where('id', $id)->with('interests:user_id,interest_id')->firstOrFail();
    }

    public function store(Request $request) {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'contact_no' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        ]);

        $client = new User;
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->contact_no = $request->contact_no;
        $client->email = $request->email;
        $client->role_id = 2;


        DB::transaction(function() use ($client, $request) {
            auth()->user()->clients()->save($client);
            $this->interest_repo->createClientInterests($client, $request->interests);
        });

        return $client;
    }

    public function update(Request $request) {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'contact_no' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->id)],
        ]);

        $client = auth()->user()->clients()->where('id', $request->id)->firstOrFail();
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->contact_no = $request->contact_no;
        $client->email = $request->email;
        $client->role_id = 2;

        $client->save();

        $this->interest_repo->createClientInterests($client, $request->interests);

        return $client;
    }

    public function delete(Request $request) {
        $client = auth()->user()->clients()->where('id', $request->id)->firstOrFail();

        $client->interests()->delete();
        $client->delete();
    }
}
