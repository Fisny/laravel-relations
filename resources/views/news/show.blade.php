@extends('home')

@section('article')

<div class="container">
    <div class="row">
        <div class="content col">

            <div class="principale">
                <div class="user">
                    <h1>{{($article->title)}}</h1>
                    <h4>By: {{($article->author->name) }} {{($article->author->surname) }} </h4>
                    <div>{{($article->position) }}</div>
                </div>

                <div class="img-container">
                    <img src="{{ $article->picture }}" alt="{{ $article->title }}'">
                </div>

            </div>
            
            <p>{{ $article->abstract }}</p>

            <div class="">{{ $article->publication_year }}</div>
        </div>
    </div>
</div>

@endsection