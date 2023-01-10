<?php

namespace App\Repositories;

use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

class AttachmentRepository extends BaseRepository
{
    public function __construct(Attachment $model)
    {
        $this->model = $model;
    }

    public function updateAttachment($id, $inputs)
    {
        return $this->model->where('attachments.attachable_id', $id)->update([
            'file_path' => Storage::putFile('public\attachments', $inputs['photo']),
            'file_name' => $inputs['photo']->hashName(),
            'extension' => $inputs['photo']->extension(),
            'size' => $inputs['photo']->getSize(),
            'mime_type' => $inputs['photo']->getClientMimeType()
        ]);
    }
}
