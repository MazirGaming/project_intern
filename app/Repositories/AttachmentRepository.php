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
            'file_path' => $inputs['photo']->store('public/attachments'),
            'file_name' => substr($inputs['photo']->store('public/attachments'), strlen('public/attachments/')),
            'extension' => $inputs['photo']->extension(),
            'size' => $inputs['photo']->getSize(),
            'mime_type' => $inputs['photo']->getClientMimeType()
        ]);
    }
}
