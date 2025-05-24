<?php

namespace Modules\Core\Traits\Dashboard;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia;
use Modules\Core\Traits\Attachment\Attachment;

/**
 * Handle status and file which uploaded
 */
trait HandleStatusAndFile
{

    /**
     * Status attribute in model
     * @var array
     */
    protected array $statusAttribute = [
        "status"
    ];

    /**
     * Status attribute in model
     * @var array
     */
    protected $fileAttribute = [
        "image"     => "images"
    ];



    /**
     * Handle Status in statusAttribute
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function handleStatusInRequest(Request $request): array
    {
        $statusData = [];
        foreach ($this->statusAttribute as $status) {
            if ($this->model->isFillable($status)) {
                $statusData[$status] = ($request->{$status} ? 1 : 0);
            }
        }
        return $statusData;
    }


    /**
     * Handle files in Request
     *
     * @param mixed $model
     * @param \Illuminate\Http\Request $request
     * @param bool $deleteBeforeUpdate for delete the file first
     * @return void
     */
    public function handleFileAttributeInRequest($model, Request $request, bool $deleteBeforeUpdate = false): void
    {
        if ($model instanceof HasMedia) {
            $this->handleFileIfMediaImplement($model, $request, $deleteBeforeUpdate);
        } else {
            $this->handleFileNormal($model, $request, $deleteBeforeUpdate);
        }
    }


    /**
     * Handle files in Request if implements media
     *
     * @param mixed $model
     * @param \Illuminate\Http\Request $request
     * @param bool $deleteBeforeUpdate for delete the file first
     * @return void
     */
    public function handleFileIfMediaImplement($model, Request $request, bool $deleteBeforeUpdate = false): void
    {
        foreach ($this->fileAttribute as $file => $collection) {
            if ($request->$file) {

                if ($deleteBeforeUpdate == true) {
                    $model->clearMediaCollection($collection);
                }

                if (is_array($request->$file)) {
                    foreach ($request->$file as $requestFile) {
                        $model->addMedia($requestFile)->toMediaCollection($collection);
                    }
                } else {
                    $model->addMedia($request->file($file))->toMediaCollection($collection);
                }
            }
        }
    }

    /**
     * @param $model
     * @param Request $request
     * @param bool $deleteBeforeUpdate
     */
    public function handleFileNormal($model, Request $request, bool $deleteBeforeUpdate = false): void
    {
        foreach ($this->fileAttribute as $file => $attribute) {
            if ($request->file($file)) {
                if ($deleteBeforeUpdate == true) {
                    Attachment::deleteAttachment($model->{$attribute});
                }

                Attachment::addAttachment($request->file($file), $model->getTable(), $model, $attribute);
            }
        }
    }

    /**
     * Delete file for model
     *
     * @param mixed $model
     * @return void
     */
    public function deleteFiles($model): void
    {
        if ($model instanceof HasMedia) {
            $model->clearMediaCollection();
        } else {
            foreach ($this->fileAttribute as $file => $attribute) {
                Attachment::deleteAttachment($model->{$attribute});
            }
        }
    }
}
