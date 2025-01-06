<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=B, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Homescreen</title>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="bg-[#222] py-4 px-6">
        <div class="container mx-auto flex items-center justify-between">
          <div class="flex items-center space-x-8">
            <h1 class="text-red-600 text-2xl font-bold">
                <a href="/">NONTON</a>
            </h1>
            <div class="hidden md:flex items-center space-x-4">
              <!-- Movies -->
              <button
                class="flex items-center text-gray-300 hover:text-white space-x-1"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="size-5"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h1.5C5.496 19.5 6 18.996 6 18.375m-3.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-1.5A1.125 1.125 0 0 1 18 18.375M20.625 4.5H3.375m17.25 0c.621 0 1.125.504 1.125 1.125M20.625 4.5h-1.5C18.504 4.5 18 5.004 18 5.625m3.75 0v1.5c0 .621-.504 1.125-1.125 1.125M3.375 4.5c-.621 0-1.125.504-1.125 1.125M3.375 4.5h1.5C5.496 4.5 6 5.004 6 5.625m-3.75 0v1.5c0 .621.504 1.125 1.125 1.125m0 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m1.5-3.75C5.496 8.25 6 7.746 6 7.125v-1.5M4.875 8.25C5.496 8.25 6 8.754 6 9.375v1.5m0-5.25v5.25m0-5.25C6 5.004 6.504 4.5 7.125 4.5h9.75c.621 0 1.125.504 1.125 1.125m1.125 2.625h1.5m-1.5 0A1.125 1.125 0 0 1 18 7.125v-1.5m1.125 2.625c-.621 0-1.125.504-1.125 1.125v1.5m2.625-2.625c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125M18 5.625v5.25M7.125 12h9.75m-9.75 0A1.125 1.125 0 0 1 6 10.875M7.125 12C6.504 12 6 12.504 6 13.125m0-2.25C6 11.496 5.496 12 4.875 12M18 10.875c0 .621-.504 1.125-1.125 1.125M18 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m-12 5.25v-5.25m0 5.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125m-12 0v-1.5c0-.621-.504-1.125-1.125-1.125M18 18.375v-5.25m0 5.25v-1.5c0-.621.504-1.125 1.125-1.125M18 13.125v1.5c0 .621.504 1.125 1.125 1.125M18 13.125c0-.621.504-1.125 1.125-1.125M6 13.125v1.5c0 .621-.504 1.125-1.125 1.125M6 13.125C6 12.504 5.496 12 4.875 12m-1.5 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M19.125 12h1.5m0 0c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h1.5m14.25 0h1.5"
                  />
                </svg>

                <span>Movies</span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-4 h-4"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 9l6 6 6-6"
                  />
                </svg>
              </button>
              <!-- TV Series -->
              <button
                class="flex items-center text-gray-300 hover:text-white space-x-1"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="size-5"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 20.25h12m-7.5-3v3m3-3v3m-10.125-3h17.25c.621 0 1.125-.504 1.125-1.125V4.875c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125Z"
                  />
                </svg>

                <span>TV Series</span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-4 h-4"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 9l6 6 6-6"
                  />
                </svg>
              </button>
              <!-- Genre -->
              <button
                class="flex items-center text-gray-300 hover:text-white space-x-1"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="size-5 mr-2"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776"
                  />
                </svg>
                Genre
              </button>
              <!-- Year -->
              <button
                class="flex items-center text-gray-300 hover:text-white space-x-1"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="size-5 mr-2"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776"
                  />
                </svg>
                Year
              </button>
            </div>
          </div>
          <!-- Search and Mobile Menu -->
          <div class="flex items-center space-x-4">
            <div
              class="hidden md:flex items-center bg-[#333] rounded-full px-4 py-2"
            >
              <input
                type="text"
                placeholder="Search..."
                class="bg-transparent outline-none w-64 text-gray-300"
              />
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5 text-gray-400"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M21 21l-4.35-4.35m0 0a8.5 8.5 0 1 0-12.02-12.02 8.5 8.5 0 0 0 12.02 12.02z"
                />
              </svg>
            </div>
            <button class="md:hidden">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M4.5 6h15m-15 6h15m-15 6h15"
                />
              </svg>
            </button>
          </div>
        </div>
    </nav>

    <!-- Alert Banner -->
    <div class="bg-[#222] p-4 text-center text-white text-sm">
    <p class="container mx-auto mb-2">
      <span class="bg-red-600 text-white px-2 py-1 rounded mr-2"
        >ATTENTION !!</span
      >
    </p>
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut fugiat velit
    deleniti optio corporis odio amet nulla, at placeat eveniet quas, facilis
    voluptate quo animi! Laudantium perferendis non velit optio?
    </div>

    <!-- Contents -->
    <div>
        @section('contents')
        @show
    </div>


    <!-- Footer -->
    <div class="container mx-auto p-6 bg-[#1a1a1a] text-white">
        <!-- Email Input Section -->
        <div class="text-center mb-8">
          <p class="text-lg font-semibold">
            Siap menonton? Masukkan email untuk membuat atau memulai lagi
            keanggotaanmu.
          </p>
          <div class="mt-4 flex justify-center">
            <input
              type="email"
              placeholder="Alamat email"
              class="bg-gray-800 text-white px-4 py-2 rounded-l focus:outline-none"
            />
            <button
              class="bg-red-600 text-white px-6 py-2 rounded-r flex items-center gap-x-2"
            >
              Mulai
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="w-5 h-5"
              >
                <path
                  d="M13.172 12l-4.95-4.95a1 1 0 011.414-1.414l6.364 6.364a1 1 0 010 1.414l-6.364 6.364a1 1 0 01-1.414-1.414l4.95-4.95z"
                />
              </svg>
            </button>
          </div>
        </div>

        <!-- Contact Section -->
        <div class="text-center mb-8">
          <p class="text-sm">
            Ada pertanyaan? Hubungi
            <a href="#" class="text-blue-400">007-803-321-8275</a>
          </p>
        </div>

        <!-- Links Section -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center text-sm">
          <a href="#" class="hover:underline">Tanya Jawab</a>
          <a href="#" class="hover:underline">Pusat Bantuan</a>
          <a href="#" class="hover:underline">Akun</a>
          <a href="#" class="hover:underline">Pusat Media</a>
          <a href="#" class="hover:underline">Hubungan Investor</a>
          <a href="#" class="hover:underline">Lowongan Kerja</a>
          <a href="#" class="hover:underline">Tukar Kartu Hadiah</a>
          <a href="#" class="hover:underline">Beli Kartu Hadiah</a>
          <a href="#" class="hover:underline">Cara Menonton</a>
          <a href="#" class="hover:underline">Ketentuan Penggunaan</a>
          <a href="#" class="hover:underline">Privasi</a>
          <a href="#" class="hover:underline">Preferensi Cookie</a>
          <a href="#" class="hover:underline">Informasi Perusahaan</a>
          <a href="#" class="hover:underline">Hubungi Kami</a>
          <a href="#" class="hover:underline">Uji Kecepatan</a>
          <a href="#" class="hover:underline">Informasi Legal</a>
          <a href="#" class="hover:underline">Hanya di Netflix</a>
        </div>

        <!-- Language Selector -->
        <div class="mt-8 text-center">
          <button
            class="bg-gray-800 text-white px-4 py-2 rounded flex items-center gap-x-2 mx-auto"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 16 16"
              class="w-5 h-5"
            >
              <path
                d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zm4.146 8.854l-2.5 2.5a.5.5 0 0 1-.708 0l-2.5-2.5a.5.5 0 0 1 .708-.708L8 9.293l2.646-2.647a.5.5 0 0 1 .708.708z"
              />
            </svg>
            Bahasa Indonesia
          </button>
        </div>
    </div>
</body>

</html>
