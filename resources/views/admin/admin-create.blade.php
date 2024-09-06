<title>Vertex Financial</title>

<body class="bg-slate-900">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-white flex justify-center">
            {{ __('Create a new administrator:') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="max-w-3xl mx-auto bg-slate-900 p-8 rounded-lg shadow-md">
            @csrf
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

                <!-- Name -->
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Webson Codinson" required />
                </div>

                <!-- Email -->
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="example@gmail.com" required />
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                </div>

                <!-- CPF -->
                <div class="mb-5">
                    <label for="cpf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CPF</label>
                    <input type="text" name="cpf" id="cpf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Example: 123.456.789-10" required />
                </div>

                <!-- Birthday -->
                <div class="mb-5">
                    <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birthday</label>
                    <input type="date" name="birth_date" id="birth_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                </div>

                <!-- Phone Number -->
                <div class="mb-5">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
                    <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Example: 999-999-9999" required />
                </div>

                <!-- Profile Photo -->
                <div class="mb-5">
                    <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile photo</label>
                    <input type="file" name="photo" id="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5" required />
                </div>

                <!-- Address Fields -->
                <div class="col-span-2">
                    <h3 class="text-lg font-semibold text-white mb-4">Address Details</h3>
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <!-- Country -->
                        <div class="mb-5">
                            <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                            <input type="text" name="country" id="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Brazil" required />
                        </div>

                        <!-- State -->
                        <div class="mb-5">
                            <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State</label>
                            <input type="text" name="state" id="state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Minas Gerais" required />
                        </div>

                        <!-- City -->
                        <div class="mb-5">
                            <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                            <input type="text" name="city" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Juiz de Fora" required />
                        </div>

                        <!-- Street -->
                        <div class="mb-5">
                            <label for="street" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Street</label>
                            <input type="text" name="street" id="street" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Example Street" required />
                        </div>

                        <!-- Building Number -->
                        <div class="mb-5">
                            <label for="building_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Building number</label>
                            <input type="number" name="building_number" id="building_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="999" required />
                        </div>

                        <!-- Postcode -->
                        <div class="mb-5">
                            <label for="postcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Postcode</label>
                            <input type="text" name="postcode" id="postcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="00000-00" required />
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-8">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
</body>
