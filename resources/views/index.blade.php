@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">MadeiraMadeira</div>
        </div>
        <div class="card-body">
          <div class="row mb-5">
            <div class="col-12">
              <h3>Buscar repositórios</h3>
              <form action="{{ route('github.search') }}" method="post">
                @csrf
                <div class="form-row">
                  <div class="col-12 col-md-4 col-lg-4 form-group @error('q') has-danger @enderror">
                    <label for="search">Search</label>
                    <input type="text" id="search" name="q"
                           class="form-control @error('q') is-invalid @enderror" required>
                    @error('q')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-12 col-md-4 col-lg-4 form-group @error('sort') has-danger @enderror">
                    <label for="sort">Ordenar por</label>
                    <select name="sort" id="sort" class="form-control @error('sort') is-invalid @enderror" required>
                      <option value="stars">Estrelas</option>
                      <option value="created">Data de criação</option>
                    </select>
                    @error('sort')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-12 col-md-4 col-lg-4 form-group @error('direction') has-danger @enderror">
                    <label for="direction">Direção</label>
                    <select name="direction" id="direction"
                            class="form-control @error('direction') is-invalid @enderror" required>
                      <option value="asc">Ascendente</option>
                      <option value="desc">Decrescente</option>
                    </select>
                    @error('direction')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="btn-group">
                  <button type="submit" class="btn btn-info btn-sm">Buscar</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              @isset($repositories)
                @forelse($repositories->items as $item)
                  <div class="card bg-gradient-default">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <!-- Avatar -->
                          <a href="#" class="avatar avatar-xl rounded-circle">
                            <img alt="{{ $item->owner->login }}"
                                 src="{{ $item->owner->avatar_url ?? 'https://picsum.photos/100/100' }}">
                          </a>
                        </div>
                        <div class="col ml--2">
                          <h4 class="mb-0 text-light">
                            <a href="{{ $item->html_url }}" target="_blank">
                              {{ $item->owner->login }} / {{ $item->name }}
                            </a>
                          </h4>
                          <p class="text-sm text-light mb-0">{{ $item->owner->type }}</p>
                          <span class="text-success">●</span>
                          <small>Stars: {{ $item->stargazers_count }}</small>
                          <p class="card-text text-white mb-4">{{ $item->description }}</p>
{{--                          <button type="button" class="btn btn-outline-white btn-sm"--}}
{{--                                  onclick="event.preventDefault();--}}
{{--                                  document.getElementById('frm-{{ $item->id }}').submit();">--}}
{{--                            Adicionar tag--}}
{{--                          </button>--}}
{{--                          <form action="{{ route('github.tags.show.add') }}" id="frm-{{ $item->id }}"--}}
{{--                                method="get" class="d-none">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="node_id" value="{{ $item->node_id }}">--}}
{{--                            <input type="hidden" name="owner" value="{{ $item->owner->login }}">--}}
{{--                            <input type="hidden" name="repo" value="{{ $item->name }}">--}}
{{--                          </form>--}}
                        </div>
                        <div class="col-auto">
                          <a href="{{ $item->html_url }}" target="_blank" class="btn btn-sm btn-primary">Ver</a>
                        </div>
                      </div>
                    </div>
                  </div>
                @empty
                @endforelse
              @endisset
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection