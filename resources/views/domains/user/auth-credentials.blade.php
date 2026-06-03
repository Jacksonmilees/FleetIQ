@extends ('layouts.out')

@section ('body')

<div class="min-h-screen flex items-center justify-center bg-blue-500 relative overflow-hidden">
    <!-- Blue Wave Background -->
    <div class="absolute inset-0">
        <svg class="absolute bottom-0 left-0 w-full h-full" viewBox="0 0 1440 900" fill="none" preserveAspectRatio="xMidYMid slice">
            <path d="M0 600C200 500 400 700 600 600C800 500 1000 400 1200 500C1400 600 1440 500 1440 500V900H0V600Z" fill="#2563EB"/>
            <path d="M0 700C300 600 500 800 800 700C1100 600 1300 500 1440 600V900H0V700Z" fill="#1D4ED8"/>
        </svg>
    </div>

    <!-- Floating Card -->
    <div class="relative z-10 w-full max-w-md px-4">
        <div class="bg-white rounded-3xl shadow-2xl p-10">
            <!-- Title -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-normal text-gray-900 mb-2">AlMak</h1>
                <p class="text-gray-400 text-sm">Enter your credentials</p>
            </div>

            <form method="post" class="space-y-4">
                @if(session('error') || $errors->any())
                    <x-message type="error" class="mb-4" />
                @endif

                <input type="hidden" name="_action" value="authCredentials">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <!-- Email Input -->
                <div>
                    <input type="email" name="email" placeholder="Email address" autofocus required
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all text-gray-700 placeholder-gray-400">
                </div>

                <!-- Password Input -->
                <div>
                    <input type="password" name="password" placeholder="Password" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all text-gray-700 placeholder-gray-400">
                </div>

                <!-- Login Button -->
                <button type="submit"
                    class="w-full py-3 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md transition-all duration-200 mt-4">
                    LOGIN
                </button>
            </form>
        </div>
    </div>
</div>

@stop
