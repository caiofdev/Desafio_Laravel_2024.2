<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div id="createModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center hidden z-50">
        <div class="bg-slate-900 p-6 rounded-lg shadow-lg w-1/12 sm:w-1/2 h-5/6 overflow-y-auto custom-scrollbar">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-white">Create a new administrator</h2>
                <button onclick="closeModal('createModal')" class="text-white">&times;</button>
            </div>
            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="max-w-3xl mx-auto bg-slate-900 p-8 rounded-lg shadow-md">
                @csrf
                <h3 class="text-lg font-semibold text-white mb-4">Personal Details</h3>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

                    <div class="mb-5 relative">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="fas fa-user text-gray-500"></i>
                            </div>
                            <input type="text" name="name" id="name" class="block w-full pl-10 p-2.5 bg-gray-50 border text-sm border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your name">
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="example@gmail.com" required />
                    </div>
                    
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                    </div>

                    <div class="mb-5">
                        <label for="cpf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CPF</label>
                        <input type="text" name="cpf" id="cpf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Example: 123.456.789-10" required />
                    </div>

                    <div class="mb-5">
                        <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birthday</label>
                        <input type="date" name="birth_date" id="birth_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                    </div>

                    <div class="mb-5">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
                        <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Example: 999-999-9999" required />
                    </div>

                    <div class="mb-5">
                        <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile photo</label>
                        <input type="file" name="photo" id="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5" required />
                    </div>

                    <div class="col-span-2">
                        <h3 class="text-lg font-semibold text-white mb-4">Address Details</h3>
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div class="mb-5">
                                <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                                <input type="text" name="country" id="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Brazil" required />
                            </div>

                            <div class="mb-5">
                                <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State</label>
                                <input type="text" name="state" id="state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Minas Gerais" required />
                            </div>

                            <div class="mb-5">
                                <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                                <input type="text" name="city" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Juiz de Fora" required />
                            </div>

                            <div class="mb-5">
                                <label for="street" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Street</label>
                                <input type="text" name="street" id="street" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Example Street" required />
                            </div>

                            <div class="mb-5">
                                <label for="building_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Building number</label>
                                <input type="number" name="building_number" id="building_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="999" required />
                            </div>
                        
                            <div class="mb-5">
                                <label for="postcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Postcode</label>
                                <input type="text" name="postcode" id="postcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="00000-00" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 text-center">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                    <button type="button" onclick="closeModal('createModal')" class="text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Close</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>