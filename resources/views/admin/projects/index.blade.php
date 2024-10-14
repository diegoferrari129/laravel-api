@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="pt-4 d-flex justify-content-between align-items-center">
                    <div>
                        <h2>Projects</h2>
                    </div>
                    <div>
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-success">Add Project</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>TITLE</td>
                            <td>DESCRIPTION</td>
                            <td>REPOSITORY</td>
                            <td>STATUS</td>
                            <td>START</td>
                            <td>END</td>
                            <td>SLUG</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->repository }}</td>
                                <td>{{ $project->status }}</td>
                                <td>{{ $project->start_date }}</td>
                                <td>{{ $project->end_date }}</td>
                                <td>{{ $project->slug }}</td>
                                <td>
                                    <div class="d-flex">

                                        <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger delete-project">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.projects.partials.modal_delete')
@endsection
