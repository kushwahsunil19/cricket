<!-- resources/views/feedback/show.blade.php -->

@extends('layouts.app')
@section('title','Feedback | MVT')
@section('description','MVT BETTING')
@section('keyword','feedback')

@section('title', 'Feedback Details')

@section('content')
    <h1>Feedback Details</h1>

<p>{{ $feedback->message }}</p>

    <p>ID: {{ $feedback->id }}</p>
    <p>Rating: {{ $feedback->rating }}</p>
    <p>Comment: {{ $feedback->comment }}</p>
@endsection
