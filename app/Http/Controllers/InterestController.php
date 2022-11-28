<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\InterestRepository;

class InterestController extends Controller
{
    private InterestRepository $repo;

    public function __construct(InterestRepository $repo) {
        $this->repo = $repo;
    }

    public function index()
    {
        return $this->repo->getInterests();
    }

    public function get($id) {
        return $this->repo->getInterest($id);
    }

    public function store(Request $request)
    {
        return $this->repo->createInterest($request);
    }

    public function delete($id) {
        return $this->repo->deleteInterest($id);
    }
}
