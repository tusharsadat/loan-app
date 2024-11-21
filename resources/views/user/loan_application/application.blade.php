@extends('user.dashboard')
@section('content')
    <div class="p-6 mx-auto max-w-3xl  ">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-2xl font-semibold mb-4">Loan Application</h2>
            <form action="{{ route('user.apply.LoanApplication') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="amount" class="block text-gray-700 font-medium">Loan Amount</label>
                        <input type="text" id="amount" name="amount" placeholder="Enter Loan Amount"
                            class="bg-gray-100 p-2 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300">
                        <div>
                            @error('amount')
                                <div class="rounded-md bg-red-50 p-3 text-sm font-medium text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="bank" class="block text-gray-700 font-medium">Bank</label>
                        <input type="text" id="bank" name="bank" placeholder="Bank Name"
                            class="bg-gray-100 p-2 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300">
                        <div>
                            @error('bank')
                                <div class="rounded-md bg-red-50 p-3 text-sm font-medium text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="account" class="block text-gray-700 font-medium">Account Number</label>
                        <input type="text" id="account" name="account" placeholder="Enter Account Number"
                            class="bg-gray-100 p-2 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300">
                        <div>
                            @error('account')
                                <div class="rounded-md bg-red-50 p-3 text-sm font-medium text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="loanType" class="block text-gray-700 font-medium">Loan Type</label>
                        <select name="loan_type" id="loan_type" class="bg-gray-200 p-2 mt-1 block w-full border-gray-300">
                            <option value="personal">Personal Loan</option>
                            <option value="house">House Loan</option>
                        </select>
                        <div>
                            @error('loan_type')
                                <div class="rounded-md bg-red-50 p-3 text-sm font-medium text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="installment_count" class="block text-gray-700 font-medium">Installment Count</label>
                        <input type="text" id="installment_count" name="installment_count"
                            placeholder="Installment Count"
                            class="bg-gray-100 p-2 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300">
                        <div>
                            @error('installment_count')
                                <div class="rounded-md bg-red-50 p-3 text-sm font-medium text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="installment_amount" class="block text-gray-700 font-medium">Installment Amount</label>
                        <input type="text" id="installment_amount" name="installment_amount"
                            placeholder="Installment Amount"
                            class="bg-gray-100 p-2 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300">
                        <div>
                            @error('installment_amount')
                                <div class="rounded-md bg-red-50 p-3 text-sm font-medium text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="amount_payable" class="block text-gray-700 font-medium">Amount(10% Interest)</label>
                        <input type="text" id="amount_payable" name="amount_payable" placeholder="Amount 10%"
                            class="bg-gray-100 p-2 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300">
                        <div>
                            @error('amount_payable')
                                <div class="rounded-md bg-red-50 p-3 text-sm font-medium text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="bg-blue-500 text-white mt-4 py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50 w-full">Submit</button>
            </form>
        </div>

    </div>
@endsection
