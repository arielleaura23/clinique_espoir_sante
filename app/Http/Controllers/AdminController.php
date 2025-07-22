<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medicine;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\ContactUs;
use App\Models\DoctorSpecilization;
use Illuminate\Support\Facades\Hash;
use App\Models\MedicalHistory;
use App\Models\ContactQuery;
use App\Models\MedicineCategory;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalDoctors = User::where('role', 'medecin')->count();
        $totalPatients = User::where('role', 'patient')->count();
        $totalAppointments = Appointment::count();
        $totalNewQueries = ContactUs::whereNull('IsRead')->count();

        return view('admin.admin.dashboard', compact(
            'totalUsers',
            'totalDoctors',
            'totalAppointments',
            'totalPatients',
            'totalNewQueries'
        ));
    }


    public function doctorSpecialization()
    {
        $specializations = DoctorSpecilization::orderBy('creationDate', 'desc')->get();
        return view('admin.admin.doctor-specilization', compact('specializations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctorspecilization' => 'required|string|max:255|unique:doctor_specilizations,specilization',
        ]);

        DoctorSpecilization::create([
            'specilization' => $request->doctorspecilization,
            'creationDate' => now(),
        ]);

        return redirect()->route('admin.doctor.specialization')
            ->with('success', 'Doctor Specialization added successfully!');
    }

    public function editDoctorSpecialization($id)
    {
        $spec = DoctorSpecilization::findOrFail($id);
        return view('admin.admin.edit-doctor-specialization', compact('spec'));
    }

    public function updateDoctorSpecialization(Request $request, $id)
    {
        $request->validate([
            'doctorspecilization' => 'required|string|max:255|unique:doctor_specilizations,specilization,' . $id,
        ]);

        $spec = DoctorSpecilization::findOrFail($id);
        $spec->specilization = $request->doctorspecilization;
        $spec->updationDate = now();
        $spec->save();

        return redirect()->route('admin.doctor.specialization')->with('success', 'Doctor Specialization updated successfully!');
    }

    public function manageDoctors()
    {
        $doctors = User::where('role', 'medecin')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.admin.manage-doctors', compact('doctors'));
    }

    public function deleteDoctor($id)
    {
        $doctor = User::where('role', 'medecin')->findOrFail($id);
        $doctor->delete();

        return redirect()->route('admin.doctor.manage')->with('success', 'Doctor deleted successfully!');
    }

    public function editDoctor($id)
    {
        $medecin = User::where('id', $id)
            ->where('role', 'medecin')
            ->firstOrFail();

        $specializations = DoctorSpecilization::orderBy('specilization')->get();

        return view('admin.admin.edit-doctor', compact('medecin', 'specializations'));
    }


    public function updateDoctor(Request $request, $id)
    {
        $request->validate([
            'Doctorspecialization' => 'required|string|max:255',
            'docname' => 'required|string|max:255',
            'clinicaddress' => 'required|string|max:500',
            'docfees' => 'required|numeric|min:0',
            'doccontact' => 'required|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|same:password'
        ]);


        $medecin = User::where('id', $id)
            ->where('role', 'medecin')
            ->firstOrFail();


        $medecin->name = $request->docname;
        $medecin->address = $request->clinicaddress;
        $medecin->consultancy_fees = $request->docfees;
        $medecin->phone = $request->doccontact;
        $medecin->specialization = $request->Doctorspecialization;
        $medecin->password = Hash::make($request->password);


        $medecin->save();

        return redirect()->back()->with('success', 'Le profil du médecin a été mis à jour avec succès.');
    }



    public function destroy($id)
    {
        $spec = DoctorSpecilization::findOrFail($id);
        $spec->delete();

        return redirect()->route('admin.doctor.specialization')
            ->with('success', 'Doctor Specialization deleted!');
    }


    public function addDoctorForm()
    {
        $specializations = DoctorSpecilization::orderBy('specilization')->get();
        return view('admin.admin.add-doctor', compact('specializations'));
    }

    public function addDoctor(Request $request)
    {
        $request->validate([
            'Doctorspecialization' => 'required|exists:doctor_specilizations,specilization',
            'docname' => 'required|string|max:255',
            'clinicaddress' => 'required|string|max:255',
            'docfees' => 'required|numeric',
            'doccontact' => 'required|string|max:20',
            'docemail' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->docname,
            'phone' => $request->doccontact,
            'email' => $request->docemail,
            'consultancy_fees' => $request->docfees,
            'specialization' => $request->Doctorspecialization,
            'password' => Hash::make($request->password),
            'role' => 'medecin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.doctor.add')->with('success', 'Doctor info added Successfully');
    }



    // patients

    public function managePatients(Request $request)
    {
        $query = User::where('role', 'patient');

        $patients = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.admin.manage-patient', compact('patients'));
    }



    public function searchPatients(Request $request)
    {
        $query = User::where('role', 'patient');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('phone', 'like', "%$search%");
            });
        }

        $patients = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.admin.patient-search', compact('patients'));
    }



    public function viewPatient($id)
    {
        $patient = User::where('id', $id)
            ->where('role', 'patient')
            ->firstOrFail();

        $medicalHistory = MedicalHistory::where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.admin.view-patient', compact('patient', 'medicalHistory'));
    }


    public function addMedicalHistory(Request $request, $id)
    {
        $request->validate([
            'bp' => 'required|string|max:255',
            'bs' => 'required|string|max:255',
            'weight' => 'required|string|max:255',
            'temp' => 'required|string|max:255',
            'pres' => 'required|string',
        ]);


        $patient = User::where('id', $id)->where('role', 'patient')->firstOrFail();

        MedicalHistory::create([
            'user_id' => $id,
            'BloodPressure' => $request->bp,
            'BloodSugar' => $request->bs,
            'Weight' => $request->weight,
            'Temperature' => $request->temp,
            'MedicalPres' => $request->pres,
            'created_at' => now(),
        ]);


        return redirect()
            ->route('admin.patient.view', $id)
            ->with('success', 'L\'historique médical a bien été ajouté.');
    }



    // appointment history
    public function appointmentHistory()
    {
        $appointments = Appointment::with(['doctor', 'patient'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.admin.appointment-history', compact('appointments'));
    }


    // contact us

    public function unreadQueries()
    {
        $queries = ContactQuery::where('IsRead', 0)->orderByDesc('PostingDate')->get();
        return view('admin.admin.unread-queries', compact('queries'));
    }

    public function queryDetails($id)
    {
        $query = ContactQuery::findOrFail($id);
        return view('admin.admin.query-details', compact('query'));
    }

    public function updateQuery(Request $request, $id)
    {
        $request->validate([
            'AdminRemark' => 'required|string|max:1000',
        ]);

        $query = ContactQuery::findOrFail($id);

        $query->update([
            'AdminRemark' => $request->AdminRemark,
            'IsRead' => 1,
            'LastupdationDate' => now(),
        ]);


        return redirect()->route('admin.queries.read')->with('success', 'Remarque enregistrée. Message déplacé dans Read Queries.');
    }


    public function readQueries()
    {
        $queries = ContactQuery::where('IsRead', 1)->orderByDesc('LastupdationDate')->get();
        return view('admin.admin.read-query', compact('queries'));
    }

    public function editRemark(Request $request, $id)
    {
        $request->validate([
            'AdminRemark' => 'required|string|max:1000',
        ]);

        $query = ContactQuery::findOrFail($id);

        $query->update([
            'AdminRemark' => $request->AdminRemark,
            'LastupdationDate' => now(),
        ]);

        return redirect()->back()->with('success', 'Remarque mise à jour avec succès.');
    }


    // medicines

    // Afficher le formulaire d'ajout de médicament avec catégories
    public function create_medicine()
    {
        $categories = MedicineCategory::all();
        return view('admin.admin.add-medicine', compact('categories'));
    }

    // Enregistrer un nouveau médicament avec tous les champs
    public function store_medicine(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|max:2048',
            'dosage' => 'nullable|string|max:100',
            'expiration_date' => 'nullable|date',
            'form' => 'nullable|string|max:100',
            'manufacturer' => 'nullable|string|max:255',
            'instructions' => 'nullable|string',
            'medicine_category_id' => 'nullable|exists:medicine_categories,id',
        ]);

        $imagePath = $request->file('image')->store('medicines', 'public');

        Medicine::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'image' => $imagePath,
            'dosage' => $request->dosage,
            'expiration_date' => $request->expiration_date,
            'form' => $request->form,
            'manufacturer' => $request->manufacturer,
            'instructions' => $request->instructions,
            'medicine_category_id' => $request->medicine_category_id,
        ]);

        return redirect()->route('medicine.add')->with('success', 'Medicine added successfully!');
    }

    // Afficher la liste des médicaments avec catégorie chargée
    public function manage_medicine()
    {
        $medicines = Medicine::with('category')->get();
        return view('admin.admin.manage-medicines', compact('medicines'));
    }

    // Afficher le formulaire d’édition d’un médicament avec catégories
    public function edit_medicine($id)
    {
        $medicine = Medicine::findOrFail($id);
        $categories = MedicineCategory::all();
        return view('admin.admin.edit-medicine', compact('medicine', 'categories'));
    }

    // Mettre à jour un médicament avec tous les champs
    public function update_medicine(Request $request, $id)
    {
        $medicine = Medicine::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'dosage' => 'nullable|string|max:100',
            'expiration_date' => 'nullable|date',
            'form' => 'nullable|string|max:100',
            'manufacturer' => 'nullable|string|max:255',
            'instructions' => 'nullable|string',
            'medicine_category_id' => 'nullable|exists:medicine_categories,id',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('medicines', 'public');
            $medicine->image = $imagePath;
        }

        $medicine->update([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'dosage' => $request->dosage,
            'expiration_date' => $request->expiration_date,
            'form' => $request->form,
            'manufacturer' => $request->manufacturer,
            'instructions' => $request->instructions,
            'medicine_category_id' => $request->medicine_category_id,
        ]);

        return redirect()->route('medicine.manage')->with('success', 'Medicine updated successfully!');
    }

    // Supprimer un médicament
    public function destroy_medicine($id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();

        return redirect()->route('medicine.manage')->with('success', 'Medicine deleted successfully.');
    }



        // Afficher la liste + formulaire d'ajout
    public function manageMedicineCategory()
    {
        $categories = MedicineCategory::orderBy('created_at', 'desc')->get();
        return view('admin.admin.add-medicine-category', compact('categories'));
    }

    // Stocker une nouvelle catégorie
    public function storeMedicineCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:medicine_categories,name|max:255',
            'description' => 'nullable|string',
        ]);

        MedicineCategory::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('medicine.category.manage')->with('success', 'Medicine category added successfully.');
    }

    // Afficher le formulaire d'édition
    public function editMedicineCategory($id)
    {
        $category = MedicineCategory::findOrFail($id);
        return view('admin.admin.edit-medicine-category', compact('category'));
    }

    // Mettre à jour la catégorie
    public function updateMedicineCategory(Request $request, $id)
    {
        $category = MedicineCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:medicine_categories,name,' . $category->id,
            'description' => 'nullable|string',
        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('medicine.category.manage')->with('success', 'Medicine category updated successfully.');
    }

    // Supprimer une catégorie de medicament
    public function deleteMedicineCategory($id)
    {
        $category = MedicineCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('medicine.category.manage')->with('success', 'Medicine category deleted successfully.');
    }
}
