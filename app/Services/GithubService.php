<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class GithubService
{
  protected string $url;

  protected array $headers;

  /**
   * GithubService constructor.
   */
  public function __construct()
  {
    $this->url = config('github.url');
    $this->headers = config('github.headers');
  }

  /**
   * @param array $parameters
   * @return array|Response
   */
  public function findRepositories(array $parameters)
  {
    $response = Http::withHeaders($this->headers)
        ->get($this->setUri('search/repositories'), [
            'q' => $parameters['q'],
//            'per_page' => 10,
            'sort' => $parameters['sort'],
            'order' => $parameters['direction'],
            'type' => 'Repositories'
        ]);

    if ($response->successful()) {
      return $response;
    }

    return [];
  }

  public function addTag(array $data)
  {
    $response = Http::withHeaders($this->headers)
        ->post($this->setUri("repos/{$data['owner']}/{$data['repo']}/git/tags"), [
            'tag' => $data['tag'],
            'message' => $data['message'],
            'object' => $data['object'],
            'type' => $data['type'],
        ]);

    dd($response->json());
  }

  private function setUri(string $uri)
  {
    return "{$this->url}/{$uri}";
  }


}