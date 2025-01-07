
@extends('layout.base')

@section('contents')

<body class="bg-[#1a1a1a] text-white font-sans">
    <div class="container mx-auto px-4 py-8 pb-20">
        <!-- Header -->
        <div class="flex flex-col md:flex-row items-center justify-between mb-8">
            <h1 class="text-4xl font-bold text-gray-100 mb-4 md:mb-0">{{ $movie->title }}</h1>
            <div class="flex items-center gap-4">
                <button class="bg-yellow-500 px-6 py-3 rounded-full flex items-center gap-3 text-white hover:bg-yellow-400 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 text-white" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" />
                    </svg>
                    <span>Rate</span>
                </button>
                <button class="bg-gray-700 px-6 py-3 rounded-full text-white hover:bg-gray-600 transition duration-300">Watchlist</button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Poster -->
            <div class="w-full md:w-[260px] md:h-[320px] flex justify-center">
                <img src="{{ url('/thumbnails/' . $movie->thumbnail) }}" alt="{{ $movie->title }} Poster" class="shadow-lg w-full h-auto object-cover rounded-md" />
            </div>

            <!-- Details -->
            <div class="flex flex-col gap-6 md:w-[calc(100%-260px)]">
                <div class="text-gray-400 mb-4">
                    <p><strong>{{ $movie->movie_info }}</strong> | {{ $movie->date }} | {{ $movie->video_type }}</p>
                    <p class="text-yellow-400 font-bold text-xl mt-2">Rating: 9/10</p>
                </div>

                <a href="https://tv7.idlix.asia/">
                    <div class="flex gap-2 mb-6">
                        <a href="{{ route('movie.play', ['id' => $movie->id]) }}">
                            <button class="bg-yellow-400 px-2 py-3 rounded-md flex items-center text-white hover:bg-yellow-600 transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M4.5 5.653c0-1.427 1.529-2.33 2.779-1.643l11.54 6.347c1.295.712 1.295 2.573 0 3.286L7.28 19.99c-1.25.687-2.779-.217-2.779-1.643V5.653Z" clip-rule="evenodd" />
                                </svg>
                                Play Film
                            </button>
                        </a>


                    </div>
                </a>

                <div class="mb-8">
                    <p class="text-lg text-gray-300">{{ $movie->description }}</p>
                </div>
            </div>
        </div>
    </div>
</body>


@endsection

