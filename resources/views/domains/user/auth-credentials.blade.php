@extends ('layouts.out')

@section ('body')

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 p-4">
    <div class="w-full max-w-md">
        <!-- Logo and Title Section -->
        <div class="text-center mb-8">
            <div class="w-20 h-20 bg-white rounded-2xl shadow-2xl flex items-center justify-center mx-auto mb-6 transform hover:scale-105 transition-transform duration-300">
                <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2 tracking-tight">Almak</h1>
            <p class="text-blue-200 text-sm">GPS Tracking System</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl p-8 border border-white/20">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-1">Welcome Back</h2>
                <p class="text-gray-500 text-sm">Sign in to your account</p>
            </div>

            <form method="post" class="space-y-5">
                <x-message type="error" class="mb-4" />

                <input type="hidden" name="_action" value="authCredentials">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <!-- Email Input -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                    </div>
                    <input type="email" name="email" placeholder="{{ __('user-auth-credentials.email') }}" autofocus required
                        class="w-full pl-12 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 text-gray-700 placeholder-gray-400 outline-none">
                </div>

                <!-- Password Input -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <input type="password" name="password" placeholder="{{ __('user-auth-credentials.password') }}" required
                        class="w-full pl-12 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 text-gray-700 placeholder-gray-400 outline-none">
                </div>

                <!-- Login Button -->
                <button type="submit"
                    class="w-full py-4 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-xl shadow-lg shadow-blue-600/30 transform hover:-translate-y-0.5 transition-all duration-200">
                    {{ __('user-auth-credentials.login') }}
                </button>
            </form>

            <!-- Footer -->
            <div class="mt-6 text-center">
                <p class="text-xs text-gray-400">
                    &copy; {{ date('Y') }} Almak. All rights reserved.
                </p>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute top-10 left-10 w-32 h-32 bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-10 right-10 w-40 h-40 bg-blue-400/20 rounded-full blur-3xl pointer-events-none"></div>
    </div>
</div>

@stop
