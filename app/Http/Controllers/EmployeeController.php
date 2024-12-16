<?php
// app/Http/Controllers/EmployeeController.php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Tax;
use App\Models\PaySlip;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    // DashboardController.php
    public function getDashboardView()
    {
        $totalEmployees = Employee::count();
        $totalPayed = Employee::sum('salaire_brut');
        $employees = Employee::all();
        return view('employees.dashboardView', compact('totalEmployees', 'totalPayed', 'employees'));
    }

    public function dashboard()
    {
        $totalEmployees = Employee::count();
        $totalPayed = Employee::sum('salaire_brut');
        $employees = Employee::all();
        $user = Auth::user();

        return view('employees.dashboard', ['userName' => $user->name], compact('totalEmployees', 'totalPayed', 'employees'));
    }

    public function index()
    {
        $employees = Employee::all();
        // Récupérer les données des taxes
        $taxes = Tax::all();

        // Récupérer les bulletins de salaire
        $paySlips = PaySlip::all();

        $user = Auth::user();

        // Passer les données à la vue
        return view('employees.index', ['userName' => $user->name], compact('employees', 'taxes', 'paySlips'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'employee_id' => 'required|string|unique:employees',
            'naissances' => 'required|date', // Date of birth
            'poste' => 'required|string', // Position
            'is_active' => 'required|integer', // Employment status (active/inactive)
            'type_de_contrat' => 'required|string', // Type of contract (e.g., permanent, temporary)
            'salaire_brut' => 'required|numeric', // Gross salary
            'taxe' => 'required|numeric', // Tax rate
            'date_de_prise_de_service' => 'required|date', // Hire date
            'date_de_fin_de_contrat' => 'required|date', // End date of the contract (nullable)
            'nombre_heure_par_semaine' => 'required|numeric', // Number of hours per week
            'bank_account' => 'required|string',
        ]);

        try {
            Employee::create($request->all());
            return response()->json(['success' => 'Employé ajouté avec succès.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur est survenue lors de l\'ajout de l\'employé.']);
        }
    }

    public function edit($id)
    {
        // Find the employee by ID
        $employee  = Employee::find($id);

        // Check if the employee exists
        if ($employee) {
            // Return the employee data as a JSON response
            return response()->json([
                'success' => true,
                'data' => $employee
            ]);
        } else {
            // Return an error response if employee not found
            return response()->json([
                'success' => false,
                'message' => 'Employé introuvable.'
            ]);
        }
    }



    public function delete($id)
    {
        // Find the employee by ID
        $employee  = Employee::find($id)->delete();

        // Check if the employee exists
        if ($employee) {
            // Return the employee data as a JSON response
            return response()->json([
                'success' => true,
                'message' => 'Employé supprimé'
            ]);
        } else {
            // Return an error response if employee not found
            return response()->json([
                'success' => false,
                'message' => 'Employé introuvable.'
            ]);
        }
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            // 'employee_id' => 'required|string|unique:employees',
            'naissances' => 'required|date', // Date of birth
            'poste' => 'required|string', // Position
            'is_active' => 'required|integer', // Employment status (active/inactive)
            'type_de_contrat' => 'required|string', // Type of contract (e.g., permanent, temporary)
            'salaire_brut' => 'required|numeric', // Gross salary
            'taxe' => 'required|numeric', // Tax rate
            'date_de_prise_de_service' => 'required|date', // Hire date
            'date_de_fin_de_contrat' => 'required|date', // End date of the contract (nullable)
            'nombre_heure_par_semaine' => 'required|numeric', // Number of hours per week
            'bank_account' => 'required|string',
        ]);

        // $employee->update($request->all());
        try {
            $employee->update($request->all());
            return response()->json(['success' => 'Employé mis à jour avec succès.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur est survenue lors de l\'ajout de l\'employé.']);
        }
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employé supprimé avec succès.');
    }
}
