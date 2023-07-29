@extends('layouts.index')

@section('main')
    <section>
        <h1 class="text-4xl text-center"><span class="underline">Amirul</span> 🚀</h1>
        <div class="mt-8 text-center">
            <h2>Time travel:</h2>
            <div class="mt-2 flex gap-2 flex-wrap justify-center">
                <a href="#" class="px-3 py-[6px] bg-white text-slate-900 rounded-md text-sm">2023</a>
            </div>
        </div>
        <div class="text-xl text-center mt-8 flex flex-col gap-8">
            <p>
                {{ $timeTravelPost->text }}
            </p>
        </div>
        <div class="text-sm text-center mt-4">
            <a href="#" class="px-2 py-1 bg-blue-600 rounded-md">github</a>
            <a href="#" class="px-2 py-1 bg-blue-600 rounded-md">linkedin</a>
        </div>
    </section>
    <section class="mt-16">
        <nav class="text-xl gap-6 flex justify-center">
            <a href="{{ route('posts.index', ['category' => '1'], false) }}" class="text-center"><span
                    class="@if ($states['category'] === '1') underline text-blue-300 @endif">Daily Update</span> ✨</a>
            <a href="{{ route('posts.index', ['category' => '2'], false) }}" class="text-center"><span
                    class="@if ($states['category'] === '2') underline text-blue-300 @endif">Long
                    Essays</span> 🌟</a>
            <a href="{{ route('posts.index', ['category' => '3'], false) }}" class="text-center"><span
                    class="@if ($states['category'] === '3') underline text-blue-300 @endif">Apps</span>
                🚀</a>
        </nav>
        <div class="mt-8 flex gap-2 flex-wrap justify-center">
            <a href="{{ route('posts.index', ['sort' => 'desc'], false) }}"
                class="px-3 py-[6px] bg-white text-slate-900 rounded-md text-sm @if ($states['sort'] !== 'desc') opacity-50 @endif">Newest
                To Oldest</a>
            <a href="{{ route('posts.index', ['sort' => 'asc'], false) }}"
                class="px-3 py-[6px] bg-white text-slate-900 rounded-md text-sm @if ($states['sort'] !== 'asc') opacity-50 @endif">Oldest
                To
                Newest</a>
        </div>
    </section>
    <section class="mt-8 flex flex-col gap-6">
        @foreach ($posts as $post)
            <a href="{{ route('posts.show', ['post' => $post]) }}">
                <div class="p-4 bg-[#171717] rounded-md text-center">
                    <h2 class="text-2xl">🗓️ {{ $post->created_at }} | {{ $post->title }}</h2>
                    <p class="mt-4">{{ $post->text }}</p>
                </div>
            </a>
        @endforeach
    </section>
@endsection
