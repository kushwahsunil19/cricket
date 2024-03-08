@extends('admin.layouts.app')
@section('title', 'Feedback | MVT')
@section('description', 'MVT BETTING')
@section('keyword', 'feedback')
@section('content')
    <h1>Edit Feedback</h1>

    <form action="{{ route('admin.feedback.edit', ['id' => $feedback->id]) }}" method="POST">
        @csrf
        @method('put')

        <label for="rating">Rating:</label>
        <select name="rating" id="rating">
            <option value="Very Good" {{ $feedback->rating === 'Very Good' ? 'selected' : '' }}>Very Good</option>
            <option value="Good" {{ $feedback->rating === 'Good' ? 'selected' : '' }}>Good</option>
            <option value="Mediocre" {{ $feedback->rating === 'Mediocre' ? 'selected' : '' }}>Mediocre</option>
            <option value="Bad" {{ $feedback->rating === 'Bad' ? 'selected' : '' }}>Bad</option>
            <option value="Very Bad" {{ $feedback->rating === 'Very Bad' ? 'selected' : '' }}>Very Bad</option>
        </select>

        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment">{{ $feedback->comment }}</textarea>

        <button type="submit">Update Feedback</button>
    </form>
@endsection
