<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ComplaintStatusHistory extends Model {
    protected $fillable = ['complaint_id','admin_id','old_status','new_status','note'];
    public function complaint(): BelongsTo { return $this->belongsTo(Complaint::class); }
    public function admin(): BelongsTo { return $this->belongsTo(User::class, 'admin_id'); }
}
