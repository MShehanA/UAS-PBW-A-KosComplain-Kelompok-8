<?php
namespace Database\Seeders;
use App\Models\User;
use App\Models\Complaint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder {
 public function run(): void {
  $admin=User::updateOrCreate(['email'=>'admin@koscomplain.test'],['name'=>'Admin Kos','phone'=>'081234567890','password'=>Hash::make('password123'),'role'=>'admin']);
  $user=User::updateOrCreate(['email'=>'penghuni@koscomplain.test'],['name'=>'Andi Penghuni','phone'=>'081234567891','password'=>Hash::make('password123'),'role'=>'penghuni']);
  if (!Complaint::where('user_id',$user->id)->exists()) {
   $c=Complaint::create(['user_id'=>$user->id,'title'=>'Lampu kamar tidak menyala','category'=>'Listrik','description'=>'Lampu utama kamar tidak dapat dinyalakan sejak tadi malam. Mohon diperiksa.','room_number'=>'A-03','status'=>'Menunggu']);
   $c->statusHistories()->create(['new_status'=>'Menunggu','note'=>'Laporan contoh']);
  }
 }
}
