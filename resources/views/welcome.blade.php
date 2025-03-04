<x-guest-layout>
    <x-slot name="title">
        Home
    </x-slot>

    <section class="h-screen w-screen flex justify-center items-center bg-gradient-to-tl from-gray-300 to-gray-50">
        <div class="text-center space-y-10">
            <!-- Title -->
            <h1 class="text-3xl md:text-4xl lg:text-6xl font-semibold text-gray-400">Home Page</h1>

            <!-- Links Container -->
            <div class="flex flex-col justify-center items-center space-y-4">
                <!-- Admin Link -->
                <a href="{{ route('filament.admin.auth.login') }}"
                   class="w-full px-6 py-2 bg-gray-200 border border-2 border-gray-600 lg:hover:bg-gray-300 rounded-lg text-gray-600 font-medium transition duration-300 ease-in-out">
                    Admin
                </a>

                <!-- Doctor Link -->
                <a href="{{ route('filament.doctor.auth.login') }}"
                   class="w-full px-6 py-2 bg-gray-200 border border-2 border-gray-600 lg:hover:bg-gray-300 rounded-lg text-gray-600 font-medium transition duration-300 ease-in-out">
                    Doctor
                </a>

                <!-- Patient Link -->
                <a href="{{ route('filament.patient.auth.login') }}"
                   class="w-full px-6 py-2 bg-gray-200 border border-2 border-gray-600 lg:hover:bg-gray-300 rounded-lg text-gray-600 font-medium transition duration-300 ease-in-out">
                    Patient
                </a>
            </div>
        </div>
    </section>
</x-guest-layout>
