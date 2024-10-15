@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="py-5">
                    <span>ID= {{ $project->id }}</span>
                    <span class="ps-5">SLUG= {{ $project->slug }}</span>
                    <div>
                        <img src="{{ $project->image !== null ? asset('./storage/' . $project->image) : 'https://placehold.co/600x400?text=Hello+World' }}"
                            alt="{{ $project->title }}" class="img-fluid">
                    </div>
                    <h3 class="pt-2">
                        Title: {{ $project->title }}
                    </h3>
                    <h5>{{ $project->type !== null ? $project->type->name : '' }}</h5>
                    <p>
                        @forelse($project->technologies as $technology)
                            {{ $technology->name }},
                        @empty
                            This project has no selected technologies
                        @endempty
                </p>
                <p class="pt-2">Description: {{ $project->description }}</p>
                <p>
                    <span>
                        Status: {{ $project->status }}
                    </span>
                    <span class="ps-5">
                        Started:
                        {{ $project->start_date }}
                    </span>
                    <span class="ps-5">
                        Ended:
                        {{ $project->end_date }}
                    </span>
                </p>
                <p>Repository: {{ $project->repository }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
