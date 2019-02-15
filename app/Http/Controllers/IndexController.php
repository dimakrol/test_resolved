<?php

namespace App\Http\Controllers;

use App\Repositories\EloquentPostSearchRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * @param Request $request
     * @param EloquentPostSearchRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home(Request $request, EloquentPostSearchRepository $repository)
    {
        $query = $repository->search($request->get('keyword'));

        if ($request->filled('active')) {
            switch ((bool)$request->get('active')) {
                case true:
                    $query->active();
                    break;
                case false:
                    $query->inactive();
                    break;
            }
        }

        if ($request->filled('sort')) {
            switch ($request->get('sort')) {
                case 'alphabetical':
                    $query->alphabetically();
                    break;
                case 'latest':
                    $query->latest();
                    break;
            }
        }

        return view('home')->with([
            'posts' => $query->fetch(),
        ]);
    }
}
