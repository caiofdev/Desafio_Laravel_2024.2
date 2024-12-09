<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div id="updateModal-{{ $admin->id }}" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center hidden z-50">
        <div class="bg-slate-900 p-6 rounded-lg shadow-lg w-1/12 sm:w-1/2 h-5/6 overflow-y-auto custom-scrollbar">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-white">Update {{ $admin->name }}'s Profile</h2>
                <button onclick="closeModal('updateModal-{{ $admin->id }}')" class="text-white">&times;</button>
            </div>
            <form method="POST" action="{{ route('admin.update', $admin->id) }}" enctype="multipart/form-data" class="max-w-3xl mx-auto bg-slate-900 p-8 rounded-lg shadow-md">
                @csrf
                @method('PATCH')
                <div class="flex items-center mb-6">
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

                <div class="mt-8 text-center flex justify-center">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                    <button type="button" onclick="closeModal('updateModal-{{ $admin->id }}')" class="text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ml-1">Close</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>