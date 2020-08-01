<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTagRequest;
use App\Http\Requests\SearchRepositoriesRequest;
use App\Services\GithubService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class GithubController extends Controller
{
  protected GithubService $service;

  /**
   * GithubController constructor.
   * @param GithubService $service
   */
  public function __construct(GithubService $service)
  {
    $this->service = $service;
  }

  /**
   * @return Application|Factory|View
   */
  public function index()
  {
    return view('index');
  }

  public function search(SearchRepositoriesRequest $request)
  {
    $validated = $request->validated();

    if ($validated) {

      $response = $this->service->findRepositories($validated);

      return view('index', [
          'repositories' => $response->object()
      ]);

    }

    return back();

  }

  /**
   * @param Request $request
   * @return Application|Factory|View
   */
  public function showAddTag(Request $request)
  {
    $parameters = $request->only(['owner', 'repo', 'node_id']);

    return view('add-tags', [
        'parameters' => $parameters
    ]);
  }

  public function addTag(AddTagRequest $request)
  {
    $validated = $request->validated();

    if ($validated) {
      $this->service->addTag($validated);
    }

    return back();
  }
}
