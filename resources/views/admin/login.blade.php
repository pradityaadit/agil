<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>

<body class="min-h-screen flex items-center justify-center bg-black bg-opacity-50 relative">
    <!-- Background Image -->
    <div class="absolute inset-0 -z-10 bg-cover bg-center brightness-50"
        style="background-image: url('https://images.unsplash.com/photo-1574375927938-d5a98e8ffe85?ixlib=rb-4.0.3');">
    </div>

    <div class="w-full max-w-md bg-black bg-opacity-75 p-8 rounded-lg space-y-8">
        <!-- Header -->
        <div class="text-center">
            <h3 class="text-3xl font-bold text-red-600 tracking-wider">Admin Login</h3>
        </div>

        <!-- Form -->
        <form action="" method="post" class="space-y-6">
            @csrf
            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm text-zinc-400 mb-1">Email</label>
                <input type="email" id="email" placeholder="Email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-3 rounded bg-zinc-800 text-white border border-zinc-700 focus:outline-none focus:ring focus:ring-zinc-500"
                    required />
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm text-zinc-400 mb-1">Password</label>
                <input type="password" id="password" placeholder="password" name="password" value="{{ old('password') }}"
                    class="w-full px-4 py-3 rounded bg-zinc-800 text-white border border-zinc-700 focus:outline-none focus:ring focus:ring-zinc-500"
                    required />
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between text-sm text-zinc-400">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2 bg-zinc-800 border-zinc-700">
                    Ingat saya
                </label>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded transition duration-200">
                    Login
                </button>
            </div>
        </form>


    </div>

    <!-- Alert Script -->
    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>
</body>

</html>
