@extends('layouts.index')

@section('main')
    <main class="px-16">
        <h1 class="text-3xl mt-16 capitalize">{{ $post->created_at }} | {{ $post->title }}</h1>

        {{-- solution to split end of line https://stackoverflow.com/a/3997367/15254140 --}}
        @php
            $paragraphs = preg_split('/\r\n|\r|\n/', $post->text);
        @endphp
        @foreach ($paragraphs as $paragraph)
            <p class="text-xl mt-8">{{ $paragraph }}</p>
        @endforeach

        <div class="mt-16">
            @include('partials.social')
        </div>
        <nav class="mt-16">
            <a href="{{ $post->id - 1 }}" class="px-3 py-[6px] bg-white text-slate-900 rounded-md text-sm">Previous Post</a>
            <a href="{{ $post->id + 1 }}" class="px-3 py-[6px] bg-white text-slate-900 rounded-md text-sm">Next Post</a>
        </nav>
    </main>
@endsection