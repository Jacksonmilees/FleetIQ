@extends ('layouts.out')

@section ('body')

<div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-b from-slate-50 to-slate-100 p-6">
    <!-- Floating Card - Apple Style -->
    <div class="w-full max-w-sm">
        <!-- Title Section -->
        <div class="text-center mb-10">
            <h1 class="text-3xl font-semibold text-slate-900 tracking-tight mb-2">Almak</h1>
            <p class="text-slate-500 text-sm font-medium">GPS Tracking System</p>
        </div>

        <!-- Glass Card -->
        <div class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] p-8 border border-slate-100">
            <form method="post" class="space-y-4">
                <x-message type="error" class="mb-4" />

                <input type="hidden" name="_action" value="authCredentials">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <!-- Email Input -->
                <div>
                    <input type="email" name="email" placeholder="Email" autofocus required
                        class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200 text-slate-900 placeholder-slate-400 outline-none text-base">
                </div>

                <!-- Password Input -->
                <div>
                    <input type="password" name="password" placeholder="Password" required
                        class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-200 text-slate-900 placeholder-slate-400 outline-none text-base">
                </div>

                <!-- Login Button -->
                <button type="submit"
                    class="w-full py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl shadow-lg shadow-blue-600/25 transition-all duration-200 mt-2">
                    Sign In
                </button>
            </form>
        </div>

        <!-- Footer -->
        <p class="text-center text-slate-400 text-xs mt-8">
            &copy; {{ date('Y') }} Almak. All rights reserved.
        </p>
    </div>
</div>

@stop
