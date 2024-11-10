<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" >
    <title>Administrator Dashboard</title>
</head>
<body>
    <x-app-layout>
        <!-- Header -->
        <header>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-white text-xl flex justify-center font-bold">
                            {{ __("ADMINISTRATOR DASHBOARD") }}
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                <!-- Administrator Section -->
                <div class="bg-slate-900 text-white rounded-lg shadow-md p-6 flex flex-col justify-between hover:scale-110 hover:bg-slate-800">
                    <h2 class="text-xl font-semibold mb-4">Administrators</h2>
                    <p class="text-lg">View and manage administrators</p>
                    <div class="flex justify-end pt-4">
                        <a href="{{route('admin.admin')}}">
                            <button class="rounded-md bg-blue-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2 hover:bg-blue-900" type="button">View</button>
                        </a>
                    </div>
                </div>

                <!-- Manager Section -->
                <div class="bg-slate-900 text-white rounded-lg shadow-md p-6 flex flex-col justify-between hover:scale-110 hover:bg-slate-800">
                    <h2 class="text-xl font-semibold mb-4">Managers</h2>
                    <p class="text-lg">View and manage managers</p>
                    <div class="flex justify-end pt-4">
                        <a href="{{ route('admin.manager') }}">
                            <button class="rounded-md bg-blue-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none hover:bg-blue-900" type="button">View</button>
                        </a>
                    </div>
                </div>

                <!-- Send Email Section -->
                <div class="bg-slate-900 text-white rounded-lg shadow-md p-6 flex flex-col justify-between hover:scale-110 hover:bg-slate-800">
                    <h2 class="text-xl font-semibold mb-4">Send Email</h2>
                    <p class="text-lg">Send email to all users</p>
                    <div class="flex justify-end pt-4">
                        <a href="{{ route('admin.email') }}">
                            <button class="rounded-md bg-blue-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none hover:bg-blue-900" type="button">Send</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>


