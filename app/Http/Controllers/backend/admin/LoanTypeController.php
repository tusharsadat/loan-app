<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\LoanType;
use Illuminate\Http\Request;

class LoanTypeController extends Controller
{
    public function allLoanType()
    {
        $loan_types = LoanType::paginate(5);
        return view('admin.loan_type.all_loanType', compact('loan_types'));
    }

    //Store loan type data
    public function addLoanType(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:loan_types'],
        ]);
        LoanType::create([
            'name' => $request->name,
        ]);
        // Redirect back with a success message
        toastr()->success('Create successfully!');
        return redirect()->back();
    }

    public function editLoanType($id)
    {
        $LoanType = LoanType::findOrFail($id);

        return view('admin.loan_type.edit_loanType', compact('LoanType'));
    }

    public function updateLoanType(Request $request, $id)
    {
        // Find the loan type by its ID
        $LoanType = LoanType::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:loan_types'],
        ]);

        $LoanType->update($request->all());

        toastr()->success('Update successfully!');
        return redirect()->route('admin.allLoanType');
    }

    public function deleteLoanType($id)
    {
        // Find the loan type by its ID
        $LoanType = LoanType::findOrFail($id);

        // Delete the loan type from the database
        $LoanType->delete();

        // Redirect back with a success message
        toastr()->success('Delete successfully!');
        return redirect()->back();
    }
}
