@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Adicionar tag</div>
        </div>
        <div class="card-body">
          <div class="row mb-5">
            <div class="col-12">
              <h3>{{ $parameters['repo'] }}</h3>
              <form action="{{ route('github.tags.add') }}" method="post">
                @csrf
                <div class="form-row">
                  <div class="col-12 col-md-4 col-lg-4 form-group @error('tag') has-danger @enderror">
                    <label for="tag">Tag</label>
                    <input type="text" id="tag" name="tag"
                           class="form-control @error('tag') is-invalid @enderror" required>
                    @error('tag')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-12 col-md-4 col-lg-4 form-group @error('message') has-danger @enderror">
                    <label for="message">Message</label>
                    <input type="text" id="message" name="message"
                           class="form-control @error('message') is-invalid @enderror" required>
                    @error('message')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-12 col-md-4 col-lg-4 form-group @error('type') has-danger @enderror">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                      <option value="commit">commit</option>
                      <option value="tree">tree</option>
                      <option value="blob">blob</option>
                    </select>
                    @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="btn-group float-right">
                  <input type="hidden" name="object" value="{{ $parameters['node_id'] }}">
                  <input type="hidden" name="owner" value="{{ $parameters['owner'] }}">
                  <input type="hidden" name="repo" value="{{ $parameters['repo'] }}">
                  <button type="submit" class="btn btn-info btn-md">Adicionar tag</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection