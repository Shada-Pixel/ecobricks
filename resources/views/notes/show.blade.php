@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ $note->title }}</h1>
    <p><strong>User:</strong> {{ $note->user ? $note->user->name : 'N/A' }}</p>
    <p><strong>Created:</strong> {{ $note->created_at->format('Y-m-d H:i') }}</p>
    <div class="mb-3">
        <strong>Body:</strong>
        <div class="border p-3">{{ $note->body }}</div>
    </div>
    <a href="{{ route('notes.edit', $note) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('notes.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
