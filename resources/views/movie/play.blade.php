@extends('layout.base')

@section('contents')

<body class="bg-[#1a1a1a] text-white font-sans">
    <div class="container mx-auto px-4 py-8 pb-20">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-yellow-400">{{ $movie->title }}</h1>
            <p class="text-gray-400">{{ $movie->movie_info }} | {{ $movie->date }} | {{ $movie->video_type }}</p>
        </div>

        <!-- Video Player -->
        <div class="relative aspect-video bg-black rounded-lg overflow-hidden mb-6">
            <img src="{{ url('/thumbnails/' . $movie->thumbnail) }}" alt="{{ $movie->title }} Poster"
                class="w-full h-auto object-fit">
            <div class="absolute inset-0 flex items-center justify-center">
                <button class="bg-gray-800 hover:bg-white/30 p-4 rounded-full transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="48" height="48" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14.752 11.168l-5.197-3.482A1 1 0 008 8.482v7.036a1 1 0 001.555.832l5.197-3.482a1 1 0 000-1.664z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Description -->
        <div class="text-gray-300 mb-6">
            <p>{{ $movie->description }}</p>
        </div>
    </div>
</body>

@endsection
