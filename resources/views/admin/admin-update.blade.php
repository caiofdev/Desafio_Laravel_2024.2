<title>Vertex Financial</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-white flex justify-center">
            {{ __('Update ' . $admin->name . " Profile") }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto bg-slate-900 p-6 rounded-lg shadow-md">
            <form method="POST" action="{{ route('admin.edit', $admin->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                
                <div class="flex items-center mb-6">
                    <!-- Display Admin Photo -->
                    <div class="w-32 h-32 flex-shrink-0">
                        <img src="{{ '/' . $admin->photo }}" alt="Admin Photo" class="w-full h-full object-cover rounded-full border border-gray-300">
                    </div>
                    <div class="ml-6">
                        <h3 class="text-2xl font-bold text-white">{{ $admin->name }}</h3>
                        <p class="text-sm text-white">{{ $admin->email }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <!-- Admin Information -->
                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium text-white">Name</label>
                        <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ old('name', $admin->name) }}" required />
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium text-white">Email Address</label>
                        <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ old('email', $admin->email) }}" required />
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium text-white">CPF</label>
                        <input type="text" name="cpf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ old('cpf', $admin->cpf) }}" required />
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium text-white">Birth Date</label>
                        <input type="date" name="birth_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ old('birth_date', $admin->birth_date) }}" required />
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium text-white">Phone Number</label>
                        <input type="text" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ old('phone', $admin->phone) }}" required />
                    </div>

                    <!-- Address Information -->
                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium text-white">Country</label>
                        <input type="text" name="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ old('address.country', $admin->address->country ?? 'N/A') }}" />
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium text-white">State</label>
                        <input type="text" name="state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ old('address.state', $admin->address->state ?? 'N/A') }}" />
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium text-white">City</label>
                        <input type="text" name="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ old('address.city', $admin->address->city ?? 'N/A') }}" />
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium text-white">Street</label>
                        <input type="text" name="street" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ old('address.street', $admin->address->street ?? 'N/A') }}" />
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium text-white">Building Number</label>
                        <input type="text" name="building_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ old('address.building_number', $admin->address->building_number ?? 'N/A') }}" />
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium text-white">Postcode</label>
                        <input type="text" name="postcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ old('address.postcode', $admin->address->postcode ?? 'N/A') }}" />
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-sm font-medium text-white">Profile Photo</label>
                        <input type="file" name="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                    </div>
                </div>

                <!-- Update Button -->
                <div class="mt-6 text-center">
                    <button href="{{route('admin.update', $admin->id)}}" type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Update Profile
                    </button>
                </div>
            </form>

            <!-- Back Button -->
            <div class="mt-6 text-center">
                <a href="{{ route('admin.admin') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Back to Admin List
                </a>
            </div>
        </div>
    </div>
</x-app-layout>