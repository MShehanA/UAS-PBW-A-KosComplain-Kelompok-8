<?php
namespace App\Http\Controllers;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
class ResidentController extends Controller {
    public function dashboard() {
        $q = auth()->user()->complaints();
        return view('resident.dashboard', [
            'total'=>(clone $q)->count(), 'processing'=>(clone $q)->where('status','Diproses')->count(),
            'done'=>(clone $q)->where('status','Selesai')->count(),
            'latest'=>(clone $q)->latest()->take(5)->get()
        ]);
    }
    public function index(Request $request) {
        $complaints = auth()->user()->complaints()
            ->when($request->filled('q'), fn($q)=>$q->where('title','like','%'.$request->q.'%'))
            ->when($request->filled('status'), fn($q)=>$q->where('status',$request->status))
            ->latest()->paginate(10)->withQueryString();
        return view('resident.complaints.index', compact('complaints'));
    }
    public function create() { return view('resident.complaints.create'); }
    public function store(Request $request) {
        $data = $request->validate([
            'title'=>'required|string|max:150',
            'category'=>['required',Rule::in(['Fasilitas Kamar','Air dan Sanitasi','Listrik','Internet/Wi-Fi','Kebersihan','Keamanan','Lainnya'])],
            'description'=>'required|string|min:10|max:5000','room_number'=>'required|string|max:30',
            'image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);
        if ($request->hasFile('image')) $data['image']=$request->file('image')->store('complaints','public');
        $data['status']='Menunggu';
        $complaint=auth()->user()->complaints()->create($data);
        $complaint->statusHistories()->create(['old_status'=>null,'new_status'=>'Menunggu','note'=>'Laporan dibuat']);
        return redirect()->route('resident.complaints.show',$complaint)->with('success','Keluhan berhasil dikirim.');
    }
    public function show(Complaint $complaint) {
        abort_unless($complaint->user_id === auth()->id(),403);
        $complaint->load(['responses.admin','statusHistories.admin']);
        return view('resident.complaints.show', compact('complaint'));
    }
    public function editProfile() { return view('profile.edit'); }
    public function updateProfile(Request $request) {
        $user=auth()->user();
        $data=$request->validate(['name'=>'required|string|max:120','email'=>['required','email','max:190',Rule::unique('users')->ignore($user->id)],'phone'=>'required|string|max:25','password'=>['nullable','confirmed',Password::min(8)]]);
        if (empty($data['password'])) unset($data['password']);
        $user->update($data);
        return back()->with('success','Profil berhasil diperbarui.');
    }
}
