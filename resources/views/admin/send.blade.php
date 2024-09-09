<title>Vertex Financial</title>

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    @if(session('Sucess'))
                        <p class="text-green-600">{{ session('Sucess')}}</p>
                    @endif
                    <form method="POST" action="{{route('admin.email')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="subject" class="block text-sm font-medium text-white">Email</label>
                            <input type="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-black" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="block text-sm font-medium text-white">Subject</label>
                            <input type="text" class="mt-1 text-black focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="subject" name="subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="block text-sm font-medium text-white">Message</label>
                            <textarea class="mt-1 text-black focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="message" name="message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-success bg-green-600">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>