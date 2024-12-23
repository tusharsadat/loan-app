@extends('admin.dashboard')
@section('content')
    <div class="flex p-6 mx-auto  ">
        <div class="w-1/2 bg-white shadow-md rounded-lg p-4">
            <h2 class="text-2xl font-semibold mb-4">Loan Management</h2>
            <form action="{{ route('admin.addLoanType') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="loanType" class="block text-gray-700 font-medium">Loan Type</label>
                    <input type="text" id="loanType" name="name" placeholder="Loan type"
                        class="bg-gray-100 p-2 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300">
                    <div>
                        @error('name')
                            <div class="rounded-md bg-red-50 p-3 text-sm font-medium text-red-800">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50 w-full">Submit</button>
            </form>
        </div>
        <div class="w-1/2 ml-4 bg-white shadow-md rounded-lg p-4">
            <h2 class="text-2xl font-semibold mb-4">Loan Type Records</h2>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Loan Type</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loan_types as $key => $loan_type)
                        <tr>
                            <td class="px-4 py-2">{{ $key + 1 }}</td>
                            <td class="px-4 py-2">{{ $loan_type->name }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('edit.LoanType', $loan_type->id) }}"
                                    class="bg-blue-500 text-white py-1 px-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50">Update</a>
                                <button type="submit" onclick="confirmDelete({{ $loan_type->id }})"
                                    class="bg-red-500 text-white py-1 px-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50">Delete</button>
                                <form id="deleteForm-{{ $loan_type->id }}"
                                    action="{{ route('delete.LoanType', $loan_type->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')

                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <!-- Add more records as needed -->
                </tbody>
            </table>
            {{ $loan_types->links() }}
        </div>
    </div>
@endsection
