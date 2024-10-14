@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="pt-5 pb-2">
                    <h2>New Project</h2>
                </div>
            </div>
            <div class="col-12">
                <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-4">
                            <label for="" class="control-label">Image</label>
                            <input type="file" name="image" id="image" placeholder="..."
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-4">
                            <label for="" class="control-label">Title</label>
                            <input type="text" name="title" id="title" placeholder="..."
                                class="form-control form-control-sm @error('title')is-invalid @enderror"
                                value="{{ old('title') }}">
                            @error('title')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="" class="control-label">Repository</label>
                            <input type="url" name="repository" id="repository"
                                class="form-control form-control-sm @error('repository')is-invalid @enderror"
                                value="{{ old('repository') }}">
                            @error('repository')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="" class="control-label">Status</label>
                            <input type="text" name="status" id="status" placeholder="..."
                                class="form-control form-control-sm @error('status')is-invalid @enderror"
                                value="{{ old('status') }}">
                            @error('status')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="" class="control-label">Start Date</label>
                            <input type="date" name="start_date" id="start_date"
                                class="form-control form-control-sm @error('start_date')is-invalid @enderror"
                                value="{{ old('start_date') }}">
                            @error('start_date')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="" class="control-label">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control form-control-sm"
                                value="{{ old('end_date') }}">
                        </div>

                        <div class="col-4">
                            <label for="" class="control-label">Project Type</label>
                            <select name="type_id" id="" class="form-select form-select-sm">
                                <option value="">Select Type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @selected($type->id == old('type_id'))>{{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="" class="control-label">Project Technologies</label>
                            <div>
                                @foreach ($technologies as $technology)
                                    <div>
                                        <input type="checkbox" name="technologies[]" id=""
                                            class="form-check-inline" value="{{ $technology->id }}"
                                            {{ is_array(old('technologies')) && in_array($technology->id, old('technologies')) ? 'checked' : '' }}>
                                        <label>{{ $technology->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="" class="control-label">Description</label>
                            <textarea name="description" id="description" rows="10" cols="30"
                                class="form-control form-control-sm @error('description')is-invalid @enderror" value="{{ old('description') }}"></textarea>
                            @error('description')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="pt-1">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
