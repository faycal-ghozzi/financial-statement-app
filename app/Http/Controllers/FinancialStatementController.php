<?php
namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\FsEntryPoint;
use App\Models\FinancialStatement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class FinancialStatementController extends Controller {

    public function index(){

        $actifs = FsEntryPoint::where('category', 'like', 'Actifs%')->orderBy('id', 'asc')->get();
        $capitaux = FsEntryPoint::where('category', 'like', 'Capitaux%')->orderBy('id', 'asc')->get();
        $passifs = FsEntryPoint::where('category', 'like', '%Passifs%')->orderBy('id', 'asc')->get();
        $resultats = FsEntryPoint::where('category', 'like', 'Résultat de%')->orderBy('id', 'asc')->get();

        return view('financial-statement', compact('actifs', 'capitaux', 'passifs', 'resultats'));
    }

    public function store(Request $request)
    {
        // Step 1: Clean input data
        $cleanedRequestData = $this->cleanNumericFields($request->all());
        $request->merge($cleanedRequestData);

        // Step 2: Static validation
        $validatedStatic = $request->validate([
            'company_name' => 'required|string|max:255',
            'current_year' => 'required|date',
        ]);

        // Step 3: Dynamic rules
        $dynamicRules = [];
        foreach (['actifs', 'capitaux', 'passifs', 'resultats'] as $category) {
            if ($request->has($category)) {
                foreach ($request->$category as $id => $values) {
                    foreach ($values as $year => $value) {
                        $fieldKey = "{$category}.{$id}.{$year}";
                        $dynamicRules[$fieldKey] = 'nullable|numeric';
                    }
                }
            }
        }

        $validatedDynamic = $request->validate($dynamicRules);

        // Step 4: Save the company
        $company = Company::firstOrCreate(['name' => $validatedStatic['company_name']]);

        // Step 5: Save financial data
        $this->saveData($validatedDynamic, $company, $validatedStatic['current_year']);

        return response()->json(['message' => 'Data saved successfully!']);
    }

    private function cleanNumericFields(array $data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = $this->cleanNumericFields($value);
            } elseif (is_string($value)) {
                if (preg_match('/^\d[\d\s\.]+$/', $value)) {
                    $data[$key] = preg_replace('/\s+/', '', $value);
                }
            }
        }

        return $data;
    }

    private function saveData($validatedDynamic, $company, $date)
    {
        $currentDate = \Carbon\Carbon::parse($date);

        foreach (['actifs', 'capitaux', 'passifs', 'resultats'] as $category) {
            if (isset($validatedDynamic[$category])) {
                foreach ($validatedDynamic[$category] as $id => $values) {
                    foreach ($values as $year => $value) {
                        $date = null;
                        if ($year === 'n') {
                            $date = $currentDate;
                        } elseif ($year === 'n-1') {
                            $date = $currentDate->copy()->subYear();
                        }

                        FinancialStatement::create([
                            'entry_point_id' => $id,
                            'date' => $date ? $date->format('Y-m-d') : null,
                            'value' => $value !== null ? (float)$value : 0.0,
                            'company_id' => $company->id,
                        ]);
                    }
                }
            }
        }
    }

}
