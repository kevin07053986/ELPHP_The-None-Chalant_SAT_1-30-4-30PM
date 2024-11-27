<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    // Fetch Budget by User ID
    public function getBudget($userId)
    {
        $budget = Budget::where('user_id', $userId)->first();
        if ($budget) {
            return response()->json($budget);
        }
        return response()->json(['message' => 'Budget not found'], 404);
    }

    // Update Budget
    public function updateBudget(Request $request, $userId)
    {
        $budget = Budget::where('user_id', $userId)->first();
        if ($budget) {
            $budget->budget_amount = $request->budget_amount;
            $budget->save();
            return response()->json(['message' => 'Budget updated successfully']);
        }
        return response()->json(['message' => 'Budget not found'], 404);
    }
}
