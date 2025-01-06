@extends('layout.base')

@section('contents')

    <!-- Search Section -->
    <div class="bg-[#1a1a1a] text-white p-4 lg:w-full">
        <div class="relative mx-auto w-[90%]">
            <input
              type="text"
              placeholder="Search Here..."
              class="w-full bg-[#222] text-white placeholder-gray-500 pl-4 pr-10 py-2 focus:outline-none"
            />
            <button
              class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-white"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 24 24"
                class="w-5 h-5"
              >
                <path
                  d="M10 2a8 8 0 105.293 14.707l5 5a1 1 0 001.414-1.414l-5-5A8 8 0 0010 2zm0 2a6 6 0 014.472 9.95c-.111.1-.21.21-.31.32L13.95 12.85A3.5 3.5 0 1012.85 13.95l.32.32A6 6 0 0110 4z"
                />
              </svg>
            </button>
          </div>
    </div>


    <!-- Newly Arrivend Sectio -->
    <section class=" px-6 py-8 bg-[#1a1a1a] p-4 text-white ">
     <h2 class="text-xl font-semibold mb-6 flex items-center">
      <span class="w-1 h-6 bg-teal-600 mr-3"></span>
      Select Film
     </h2>
     <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-2">
      @foreach ($allMovies as $movie)
        @if ($movie->status == 1) <!-- Cek status 1 -->
          <a href="{{ route('movie.show', $movie->id) }}">
            <div class="relative group cursor-pointer">
              <div class="relative overflow-hidden rounded-lg">
                <img
                  src="{{ url('/thumbnails/' . $movie->thumbnail) }}"
                  alt="{{ $movie->title }}"
                  class="w-[220px] h-[290px] object-fit rounded-md transform group-hover:scale-125 transition duration-300"
                />
                <!-- Overlay -->
                <div
                  class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all duration-300 flex items-center justify-center"
                >
                  <!-- Play Button with SVG -->
                  <div
                    class="opacity-0 group-hover:opacity-100 transform group-hover:scale-100 scale-50 transition-all duration-300"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="white"
                      class="w-12 h-12"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z"
                      />
                    </svg>
                  </div>
                </div>
                <!-- Video Type Badge -->
                <div
                  class="absolute top-2 left-2 bg-teal-600 text-xs px-2 py-1 rounded"
                >
                  {{ $movie->video_type }}
                </div>
                <!-- Rating Badge -->
                <div
                  class="absolute bottom-2 right-2 opacity-0 group-hover:opacity-100 transition-all duration-300"
                >
                  <div
                    class="flex items-center space-x-1 bg-black bg-opacity-75 rounded px-2 py-1"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="currentColor"
                      viewBox="0 0 24 24"
                      class="w-4 h-4 text-yellow-400"
                    >
                      <path
                        d="M12 .587l3.668 7.435L23.1 9.234l-5.569 5.43 1.313 7.653L12 18.902l-6.844 3.415 1.313-7.653L.9 9.234l7.432-1.212L12 .587z"
                      />
                    </svg>
                    <span class="text-white text-xs">9.2</span> <!-- Placeholder Rating -->
                  </div>
                </div>
              </div>
              <div class="mt-2">
                <h3 class="text-sm font-medium truncate">{{ $movie->title }}</h3>
                <p class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($movie->date)->format('Y') }}</p>
              </div>
            </div>
          </a>
        @endif
      @endforeach
     </div>
    </section>

@endsection
