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
        $cleanedRequestData = $this->cleanNumericFields($request->all());
        $request->merge($cleanedRequestData);

        $validatedStatic = $request->validate([
            'company_name' => 'required|string|max:255',
            'current_year' => 'required|date',
        ]);

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

        $company = Company::firstOrCreate(['name' => $validatedStatic['company_name']]);

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

    public function fetchAll(Request $request)
    {
        $search = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $financialStatements = \App\Models\FinancialStatementFile::with('company')
            ->when($search, function ($query, $search) {
                $query->whereHas('company', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
            })
            ->when($startDate, function ($query, $startDate) {
                $query->where('date', '>=', $startDate);
            })
            ->when($endDate, function ($query, $endDate) {
                $query->where('date', '<=', $endDate);
            })
            ->paginate(10);

        return view('financial_statements.fetch_all', compact('financialStatements', 'search', 'startDate', 'endDate'));
    }

    public function show($id, Request $request)
    {
        $date = $request->input('date');

        $financialStatements = \App\Models\FinancialStatement::where('date', $date)
            ->where('company_id', function ($query) use ($id) {
                $query->select('company_id')
                    ->from('financial_statement_files')
                    ->where('id', $id);
            })
            ->get();

        return view('financial_statements.show', compact('financialStatements', 'date'));
    }

}
