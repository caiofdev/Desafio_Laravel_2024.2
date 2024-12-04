<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div id="deleteModal-{{ $admin->id }}" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center hidden z-50">
        <div class="bg-slate-900 p-6 rounded-lg shadow-lg w-11/12 sm:w-1/3">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-white">Confirm Deletion</h2>
                <button onclick="closeModal('deleteModal-{{ $admin->id }}')" class="text-white">&times;</button>
            </div>
            <p class="text-white mb-4">Are you sure you want to delete this admin? This action cannot be undone.</p>
            <div class="flex justify-end gap-4">
                <button type="button" onclick="closeModal('deleteModal-{{ $admin->id }}')" class="text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-700">Cancel</button>
                <form id="deleteForm-{{ $admin->id }}" action="{{ route('admin.destroy', $admin->id) }}" method="POST" class="w-full sm:w-auto">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Yes, Delete</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


