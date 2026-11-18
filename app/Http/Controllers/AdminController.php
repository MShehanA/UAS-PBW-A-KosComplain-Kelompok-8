<?php
namespace App\Http\Controllers;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
class AdminController extends Controller {
    public function dashboard() {
        return view('admin.dashboard',[
            'total'=>Complaint::count(),'waiting'=>Complaint::where('status','Menunggu')->count(),
            'processing'=>Complaint::where('status','Diproses')->count(),'done'=>Complaint::where('status','Selesai')->count(),
            'latest'=>Complaint::with('user')->latest()->take(7)->get()
        ]);
    }
    public function index(Request $request) {
        $complaints=Complaint::with('user')
            ->when($request->filled('q'),fn($q)=>$q->where(fn($w)=>$w->where('title','like','%'.$request->q.'%')->orWhereHas('user',fn($u)=>$u->where('name','like','%'.$request->q.'%'))))
            ->when($request->filled('status'),fn($q)=>$q->where('status',$request->status))
            ->when($request->filled('category'),fn($q)=>$q->where('category',$request->category))
            ->latest()->paginate(12)->withQueryString();
        return view('admin.complaints.index',compact('complaints'));
    }
    public function show(Complaint $complaint) {
        $complaint->load(['user','responses.admin','statusHistories.admin']);
        return view('admin.complaints.show',compact('complaint'));
    }
    public function updateStatus(Request $request, Complaint $complaint) {
        $data=$request->validate(['status'=>['required',Rule::in(['Menunggu','Diproses','Selesai','Ditolak'])],'note'=>'nullable|string|max:500']);
        DB::transaction(function() use($complaint,$data) {
            $old=$complaint->status;
            $complaint->update(['status'=>$data['status']]);
            if ($old !== $data['status']) $complaint->statusHistories()->create([
                'admin_id'=>auth()->id(),'old_status'=>$old,'new_status'=>$data['status'],'note'=>$data['note'] ?? null
            ]);
        });
        return back()->with('success','Status keluhan berhasil diperbarui.');
    }
    public function respond(Request $request, Complaint $complaint) {
        $data=$request->validate(['response'=>'required|string|min:3|max:3000']);
        $complaint->responses()->create(['admin_id'=>auth()->id(),'response'=>$data['response']]);
        return back()->with('success','Tanggapan berhasil dikirim.');
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
