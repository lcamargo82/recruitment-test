<?php

namespace App\Http\Controllers;

use GrahamCampbell\GitHub\GitHubManager;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $github;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(GitHubManager $github)
    {
        $this->github = $github;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listUsers = $this->github->user()->all();

        return view('list-devs.home', compact('listUsers'));
    }

    public function show($details)
    {
        $detailsUser = $this->github->api('user')->show($details);

        return view('list-devs.details', compact('detailsUser'));
    }

    public function showRepositories($repositories)
    {
        $showRepositories = $this->github->api('user')->repositories($repositories);

        return view('list-repos.repositories', compact('showRepositories'));
    }

    public function detailRepository($developer, $repository)
    {
        $detailRepository = $this->github->repo()->show($developer, $repository);

        return view('list-repos.detail-repository', compact('detailRepository'));
    }

    public function filters(Request $request)
    {
        if ($request->get('search')['language'] === null && $request->get('search')['location'] === null) {
            return back();
        } elseif ($request->get('search')['language'] != null && $request->get('search')['location'] != null) {
            $searchtUsers = $this->github->api('search')->users('location:'.$request->get('search')['location'] .'language:'.$request->get('search')['language']);
            $listUsers = $searchtUsers['items'];

            return view('list-devs.home', compact('listUsers'));
        } elseif ($request->get('search')['location'] === null) {
            $searchtUsers = $this->github->api('search')->users('github language:'.$request->get('search')['language']);
            $listUsers = $searchtUsers['items'];

            return view('list-devs.home', compact('listUsers'));
        } else {
            $searchtUsers = $this->github->api('search')->users('location:'.$request->get('search')['location']);
            $listUsers = $searchtUsers['items'];

            return view('list-devs.home', compact('listUsers'));
        }
    }
}
