<title>Vertex Financial</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-white flex justify-center">
            {{ __('View ' . $user->name . " profile: ") }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-4xl mx-auto bg-slate-900 p-6 rounded-lg shadow-md">
            <div class="flex items-center mb-6">

                <!-- Display User Photo -->

                <div class="w-32 h-32 flex-shrink-0">
                    <img src="{{ '/' . $user->photo }}" alt="User Photo" class="w-full h-full object-cover rounded-full border border-gray-300">
                </div>
                <div class="ml-6">
                    <h3 class="text-2xl font-bold text-white">{{ $user->name }}</h3>
                    <p class="text-sm text-white">{{ $user->email }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                
                <!-- User Information -->

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Name</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $user->name }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Email Address</label>
                    <input type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $user->email }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">CPF</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $user->cpf }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Birth Date</label>
                    <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $user->birth_date }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Phone Number</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $user->phone }}" readonly />
                </div>

                <!-- Address Information -->
                
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Country</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $user->address->country ?? 'N/A' }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">State</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $user->address->state ?? 'N/A' }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">City</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $user->address->city ?? 'N/A' }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Street</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $user->address->street ?? 'N/A' }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Building Number</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $user->address->building_number ?? 'N/A' }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Postcode</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $user->address->postcode ?? 'N/A' }}" readonly />
                </div>
            </div>

            <!-- Back Button -->

            <div class="mt-6 text-center">
                <a href="{{ route('manager.user') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Back to User List
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
