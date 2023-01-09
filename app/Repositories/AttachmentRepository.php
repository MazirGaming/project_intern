<?php

namespace App\Repositories;

use App\Models\Attachment;

class AttachmentRepository extends BaseRepository
{
    public function __construct(Attachment $model)
    {
        $this->model = $model;
    }

    public function updateAttachment($id, $inputs)
    {
        return $this->model->where('attachments.attachable_id', $id)->update([
            'file_path' => substr($inputs['photo']->store('public/attachments'), strlen('public/')),
            'file_name' => time() . '.' . $inputs['photo']->getClientOriginalExtension(),
            'extension' => $inputs['photo']->extension(),
            'size' => $inputs['photo']->getSize(),
            'mime_type' => $inputs['photo']->getClientMimeType()
        ]);
    }
}
