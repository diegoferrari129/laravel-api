@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="pt-5 pb-2">
                    <h2>Edit Project</h2>
                </div>
            </div>
            <div class="col-12">
                <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row gy-4">
                        <div class="col-12">
                            <img src="{{ $project->image !== null ? asset('./storage/' . $project->image) : 'https://placehold.co/600x400' }}"
                                alt="{{ $project->title }}" class="img-fluid">
                        </div>
                        <div class="col-4">
                            <label for="" class="control-label">Image</label>
                            <input type="file" name="image" id="image" placeholder="..."
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-4">
                            <label for="" class="control-label">Title</label>
                            <input type="text" name="title" id="title" placeholder="..."
                                class="form-control form-control-sm @error('title')is-invalid @enderror"
                                value="{{ old('title', $project->title) }}">
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
                                value="{{ old('repository', $project->repository) }}">
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
                                value="{{ old('status', $project->status) }}">
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
                                value="{{ old('start_date', $project->start_date) }}">
                            @error('start_date')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="" class="control-label">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control form-control-sm"
                                value="{{ old('end_date', $project->end_date) }}">
                        </div>

                        <div class="col-4">
                            <label for="" class="control-label">Project Type</label>
                            <select name="type_id" id="" class="form-select form-select-sm">
                                <option value="">Select Type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @selected($type->id == old('type_id', $project->type ? $project->type->id : ''))>{{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="" class="control-label">Project Technologies</label>
                            <div>
                                @foreach ($technologies as $technology)
                                    <div>

                                        @if ($errors->any())
                                            <input type="checkbox" name="technologies[]" id=""
                                                class="form-check-inline" value="{{ $technology->id }}"
                                                {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                                        @else
                                            <input type="checkbox" name="technologies[]" id=""
                                                class="form-check-inline" value="{{ $technology->id }}"
                                                {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>
                                        @endif


                                        <label>{{ $technology->name }}</label>

                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="" class="control-label">Description</label>
                            <textarea name="description" id="description" rows="10" cols="30"
                                class="form-control form-control-sm @error('description')is-invalid @enderror" value="{{ old('description') }}"></textarea>
                            @error('description', $project->description)
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="pt-1">
                                <button type="submit" class="btn btn-success">Edit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
