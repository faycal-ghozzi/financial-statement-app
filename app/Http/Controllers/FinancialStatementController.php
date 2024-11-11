<?php
namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\FsEntryPoint;
use App\Models\FinancialStatement;
use Illuminate\Http\Request;

class FinancialStatementController extends Controller {

    public function index(){

        $actifs = FsEntryPoint::where('category', 'like', 'Actifs%')->orderBy('id', 'asc')->get();
        $capitaux = FsEntryPoint::where('category', 'like', 'Capitaux%')->orderBy('id', 'asc')->get();
        $passifs = FsEntryPoint::where('category', 'like', '%Passifs%')->orderBy('id', 'asc')->get();
        $resultats = FsEntryPoint::where('category', 'like', 'Résultat de%')->orderBy('id', 'asc')->get();

        return view('financial-statement', compact('actifs', 'capitaux', 'passifs', 'resultats'));
    }

    public function store(Request $request){
        $request->validate([
            'company_name' => 'required|string|max:255',
            'current_year' => 'required|integer',
        ]);

        $company = Company::firstOrCreate(['name' => $request->input('company_name')]);

        // // Store in session
        
        // session(['company_id' => $company->id, 'current_year' => $request->input('current_year')]);

        // Fetch Actifs
        // $actifs = FsEntryPoint::where('category', 'like', 'Actifs%')->orderBy('id', 'asc')->get();

        // return view('financials.step2', compact('test'));

    }

    // public function stepOne() {
    //     // Render step 1 form
    //     return view('financials.step1');
    // }

    // public function stepTwo(Request $request) {
    //     // Validate company name and year
    //     $request->validate([
    //         'company_name' => 'required|string|max:255',
    //         'current_year' => 'required|integer',
    //     ]);

    //     // Create or find the company
    //     $company = Company::firstOrCreate(['name' => $request->input('company_name')]);

    //     // Store in session
        
    //     session(['company_id' => $company->id, 'current_year' => $request->input('current_year')]);

    //     // Fetch Actifs
    //     $actifs = FsEntryPoint::where('category', 'like', 'Actifs%')->orderBy('id', 'asc')->get();
    //     return view('financials.step2', compact('actifs'));
    // }

    // public function stepThree(Request $request) {
    //     // Store Actifs in session
    //     session(['actifs' => $request->input('actifs')]);

    //     // Fetch Passifs
    //     $passifs = FsEntryPoint::where('category', 'like', 'Passifs%')->orderBy('rank')->get();
    //     return view('financials.step3', compact('passifs'));
    // }

    // public function validateTotals(Request $request) {
    //     // Store Passifs in session
    //     session(['passifs' => $request->input('passifs')]);

    //     // Get Actifs and Passifs from session
    //     $actifs = session('actifs');
    //     $passifs = session('passifs');

    //     // Calculate totals
    //     $total_actifs_current = array_sum(array_column($actifs, 'current_year'));
    //     $total_actifs_previous = array_sum(array_column($actifs, 'previous_year'));
    //     $total_passifs_current = array_sum(array_column($passifs, 'current_year'));
    //     $total_passifs_previous = array_sum(array_column($passifs, 'previous_year'));

    //     // Ensure totals match before proceeding
    //     if ($total_actifs_current !== $total_passifs_current || $total_actifs_previous !== $total_passifs_previous) {
    //         return redirect()->back()->withErrors(['total_mismatch' => 'Actifs and Passifs totals do not match.']);
    //     }

    //     return redirect()->route('financial.step.four');
    // }

    // public function stepFour() {
    //     return view('financials.step4');
    // }

    // public function store(Request $request) {
    //     // Handle image upload and store all data
    //     $company_id = session('company_id');
    //     $current_year = session('current_year');
    //     $actifs = session('actifs');
    //     $passifs = session('passifs');

    //     foreach ($actifs as $entry_id => $data) {
    //         FinancialStatement::create(['company_id' => $company_id, 'entry_point_id' => $entry_id, 'year' => $current_year, 'value' => $data['current_year']]);
    //         FinancialStatement::create(['company_id' => $company_id, 'entry_point_id' => $entry_id, 'year' => $current_year - 1, 'value' => $data['previous_year']]);
    //     }

    //     foreach ($passifs as $entry_id => $data) {
    //         FinancialStatement::create(['company_id' => $company_id, 'entry_point_id' => $entry_id, 'year' => $current_year, 'value' => $data['current_year']]);
    //         FinancialStatement::create(['company_id' => $company_id, 'entry_point_id' => $entry_id, 'year' => $current_year - 1, 'value' => $data['previous_year']]);
    //     }

    //     return redirect()->route('financial.success')->with('success', 'Financial data saved successfully.');
    // }
}
