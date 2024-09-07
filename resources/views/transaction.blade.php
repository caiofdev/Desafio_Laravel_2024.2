<title>Vertex Financial</title>
    
<body class="bg-slate-900">
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 fade-up">
                <!-- Dashboard Container -->
                <div class="bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- Dashboard Overview -->
                    <div class="p-6 text-white">
                        <h3 class="text-lg font-semibold mb-4">Transactions Dashboard</h3>
                        
                        <!-- User Info Card -->
                        <div class="bg-gray-800 p-4 rounded-lg shadow-lg mb-6">
                            <h4 class="text-xl font-semibold mb-2">Account Summary</h4>
                            <p><span class="font-semibold">Account Holder:</span> {{$user->name}}</p>
                            <p><span class="font-semibold">Account Balance: $</span> {{$user->account()->first()->account_balance}}</p>
                            <p><span class="font-semibold">Account Number:</span> {{$user->account()->first()->account_number}}</p>
                            @if(session('Error'))
                                <p class="text-red-600">{{ session('Error')}}</p>
                            @endif
                        </div>

                        <!-- Deposit and Withdrawal Forms -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <!-- Deposit Form -->
                            <div class="bg-gray-800 p-4 rounded-lg shadow-lg">
                                <h4 class="text-xl font-semibold mb-2">Deposit Funds</h4>
                                @if(Auth::guard('manager')->check())
                                <form action="{{route('manager.deposit')}}" method="POST">
                                @elseif(Auth::guard('web')->check())
                                <form action="{{route('user.deposit')}}" method="POST">
                                @endif
                                    @csrf
                                    <div class="mb-4">
                                        <label for="deposit_amount" class="block mb-2 text-sm font-medium text-gray-300">Amount</label>
                                        <input type="number" name="amount" id="deposit_amount" class="bg-gray-700 border border-gray-600 text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter amount" required />
                                        
                                        <input hidden name="sender_id" value="{{ $user->id }}">
                                        <input hidden name="account_id" value="{{ $user->account_id }}">
                                        <input hidden name="title" value="deposit">

                                    </div>
                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">
                                        Deposit
                                    </button>
                                </form>
                            </div>

                            <!-- Withdrawal Form -->
                            <div class="bg-gray-800 p-4 rounded-lg shadow-lg">
                                <h4 class="text-xl font-semibold mb-2">Withdraw Funds</h4>
                                @if(Auth::guard('manager')->check())
                                <form action="{{route('manager.deposit')}}" method="POST">
                                @elseif(Auth::guard('web')->check())
                                <form action="{{route('user.deposit')}}" method="POST">
                                @endif
                                    @csrf
                                    <div class="mb-4">
                                        <label for="withdraw_amount" class="block mb-2 text-sm font-medium text-gray-300">Amount</label>
                                        <input type="number" name="amount" id="withdraw_amount" class="bg-gray-700 border border-gray-600 text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter amount" required />
    
                                        <input hidden name="sender_id" value="{{ $user->id }}">
                                        <input hidden name="account_id" value="{{ $user->account_id }}">
                                        <input hidden name="title" value="withdraw">
                                        <input hidden name="balance" value="{{ $user->account()->first()->account_balance }}">
                                        
                                    </div>
                                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">
                                        Withdraw
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Recent Transactions Section -->
                        <div class="bg-gray-800 p-4 rounded-lg shadow-lg mb-6">
                            <h4 class="text-xl font-semibold mb-2">Recent Transactions</h4>
                            <ul class="list-disc list-inside mb-4">
                                <!-- Example transactions -->
                                <li>Deposit: $500 - 01/09/2024</li>
                                <li>Withdrawal: $200 - 30/08/2024</li>
                                <li>Transfer: $150 - 28/08/2024</li>
                                <!-- Add more transaction examples as needed -->
                            </ul>
                            <button onclick="generatePDF()" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Generate PDF
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="pdfModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-1/3">
                <h3 class="text-lg font-semibold text-white mb-4">Generating PDF</h3>
                <p class="text-white">Your PDF is being generated. Please wait...</p>
                <button onclick="closeModal()" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-4">
                    Close
                </button>
            </div>
        </div>

        <script>
            function generatePDF() {
                // Open the modal
                document.getElementById('pdfModal').classList.remove('hidden');

                // Simulate PDF generation process
                setTimeout(function() {
                    // Close the modal after some time (simulate the process)
                    document.getElementById('pdfModal').classList.add('hidden');
                    alert('PDF generated successfully!');
                }, 2000); // Simulate a 2-second process
            }

            function closeModal() {
                document.getElementById('pdfModal').classList.add('hidden');
            }
        </script>
    </x-app-layout>
</body>
</html>
