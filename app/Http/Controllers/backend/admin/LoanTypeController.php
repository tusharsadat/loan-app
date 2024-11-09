<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoanTypeController extends Controller
{
    public function allLoanType()
    {
        return view('admin.loan_type.all_loanType');
    }
}
