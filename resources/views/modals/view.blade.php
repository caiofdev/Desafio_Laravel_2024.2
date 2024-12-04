<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div id="viewModal-{{ $admin->id }}" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center hidden z-50">
        <div class="bg-slate-900 p-6 rounded-lg shadow-lg w-1/12 sm:w-1/2 h-5/6 overflow-y-auto custom-scrollbar">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-white">View {{ $admin->name }}'s Profile</h2>
                <button onclick="closeModal('viewModal-{{ $admin->id }}')" class="text-white">&times;</button>
            </div>
            <div class="flex items-center mb-4">
                <div class="w-32 h-32 flex-shrink-0">
                    <img src="{{ '/' . $admin->photo }}" alt="Admin Photo" class="w-full h-full object-cover rounded-full border border-gray-300">
                </div>
                <div class="ml-6">
                    <h3 class="text-2xl font-bold text-white">{{ $admin->name }}</h3>
                    <p class="text-sm text-white">{{ $admin->email }}</p>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Name</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $admin->name }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Email Address</label>
                    <input type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $admin->email }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">CPF</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $admin->cpf }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Birth Date</label>
                    <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $admin->birth_date }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Phone Number</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $admin->phone }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Country</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $admin->address->country ?? 'N/A' }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">State</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $admin->address->state ?? 'N/A' }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">City</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $admin->address->city ?? 'N/A' }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Street</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $admin->address->street ?? 'N/A' }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Building Number</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $admin->address->building_number ?? 'N/A' }}" readonly />
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-white">Postcode</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ $admin->address->postcode ?? 'N/A' }}" readonly />
                </div>
            </div>
            <div class="mt-6 text-center">
                <button onclick="closeModal('viewModal-{{ $admin->id }}')" class="text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-700">Close</button>
            </div>
        </div>
    </div>
</body>
</html>