<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $primaryKey = 'document_id';

    protected $fillable = [
        'title',
        'upload_date',
        'file_path',
        'uploaded_by',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'uploaded_by');
    }
}
