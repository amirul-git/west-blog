@extends('layouts.index')

@section('main')
    <main>
        <div class="flex mt-16 gap-3">
            <h1 class="text-3xl capitalize">{{ $post->created_at }} | {{ $post->title }}</h1>
        </div>

        {{-- solution to split end of line https://stackoverflow.com/a/3997367/15254140 --}}
        @php
            $paragraphs = preg_split('/\r\n|\r|\n/', $post->text);
        @endphp
        @foreach ($paragraphs as $paragraph)
            <p class="text-xl mt-8">{{ $paragraph }}</p>
        @endforeach
        @auth
            <a href="{{ route('posts.edit', ['post' => $post]) }}"
                class="px-3 mt-3 inline-block py-[6px] bg-white text-slate-900 rounded-md text-sm">Edit</a>
        @endauth

        <div class="mt-16">
            @include('partials.social')
        </div>
        <nav class="mt-16">
            <a href="{{ $post->id - 1 }}" class="px-3 py-[6px] bg-white text-slate-900 rounded-md text-sm">Previous Post</a>
            <a href="{{ $post->id + 1 }}" class="px-3 py-[6px] bg-white text-slate-900 rounded-md text-sm">Next Post</a>
        </nav>
    </main>
@endsection
