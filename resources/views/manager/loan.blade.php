<title>Vertex Financial - Loan Request</title>
    
<body class="bg-slate-900">
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 fade-up">
                <!-- Loan Request Container -->
                <div class="bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- Loan Request Overview -->
                    <div class="p-6 text-white">
                        <h3 class="text-lg font-semibold mb-4">Loan Request</h3>
                        
                        <!-- Loan Request Form -->
                        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                            <h4 class="text-xl font-semibold mb-4">Request a Loan</h4>
                            <form action="#" method="POST">
                                <!-- Loan Amount -->
                                <div class="mb-4">
                                    <label for="loan_amount" class="block mb-2 text-sm font-medium text-gray-300">Loan Amount</label>
                                    <input type="number" name="loan_amount" id="loan_amount" class="bg-gray-700 border border-gray-600 text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter amount" required />
                                </div>

                                <!-- Purpose of Loan -->
                                <div class="mb-4">
                                    <label for="loan_purpose" class="block mb-2 text-sm font-medium text-gray-300">Purpose of Loan</label>
                                    <textarea name="loan_purpose" id="loan_purpose" class="bg-gray-700 border border-gray-600 text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Describe the purpose of the loan" rows="4" required></textarea>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">
                                    Submit Request
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
