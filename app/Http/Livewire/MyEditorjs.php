<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use UniSharp\LaravelFilemanager\Events\ImageIsUploading;
use UniSharp\LaravelFilemanager\Events\ImageWasUploaded;
use UniSharp\LaravelFilemanager\Lfm;
use UniSharp\LaravelFilemanager\LfmPath;
use GuzzleHttp\Client;

class MyEditorjs extends Component
{
    use WithFileUploads;

    public $uploads = [];

    public $editorId;

    public $data;

    public $class;

    public $style;

    public $readOnly;

    public $placeholder;

    public $uploadDisk;

    public $downloadDisk;

    public $logLevel;

    public function mount(
        $editorId,
        $value = [],
        $class = '',
        $style = '',
        $readOnly = false,
        $placeholder = null,
        $uploadDisk = null,
        $downloadDisk = null
    ) {
        if (is_null($uploadDisk)) {
            $uploadDisk = config('livewire-editorjs.default_img_upload_disk');
        }

        if (is_null($downloadDisk)) {
            $downloadDisk = config('livewire-editorjs.default_img_download_disk');
        }

        if (is_null($placeholder)) {
            $placeholder = config('livewire-editorjs.default_placeholder');
        }

        if (is_string($value)) {
            $value = json_decode($value, true);
        }

        $this->editorId = $editorId;
        $this->data = $value;
        $this->class = $class;
        $this->style = $style;
        $this->readOnly = $readOnly;
        $this->placeholder = $placeholder;
        $this->uploadDisk = $uploadDisk;
        $this->downloadDisk = $downloadDisk;

        $this->logLevel = config('livewire-editorjs.editorjs_log_level');
    }

    public function completedImageUpload(string $uploadedFileName, string $eventName)
    {
        /** @var TemporaryUploadedFile $tmpFile */
        $new_filename = null;

        $tmpFile = collect($this->uploads)
            ->filter(function (TemporaryUploadedFile $item) use ($uploadedFileName) {
                return $item->getFilename() === $uploadedFileName;
            })
            ->first();

        request()->merge(array('type' => 'images'));
        $storedFileName = app(LfmPath::class)->upload($tmpFile);
        $url = app(LfmPath::class)->setName($storedFileName)->url();

        $this->dispatchBrowserEvent($eventName, [
            'url' => $url
        ]);
    }

    public function loadImageFromUrl(string $url, string $eventName)
    {
        if ($this->checkUrlFile($url)) {
            $name = time() . '-' . basename($url);
            $content = file_get_contents($url);
            request()->merge(array('type' => 'images'));

            Storage::disk($this->downloadDisk)->put(app(LfmPath::class)->path('url') . '/' . $name, $content);
            app(LfmPath::class)->makeThumbnail($name);

            return $this->dispatchBrowserEvent($eventName, [
                'url' => app(LfmPath::class)->setName($name)->url(),
                'event' => $eventName,
                'status' => 1
            ]);
        }

        return $this->dispatchBrowserEvent($eventName, [
            'url' => Null,
            'event' => $eventName,
            'status' => 0
        ]);
    }

    protected function checkUrlFile($value)
    {
        $isValid = false;

        $client = new Client();
        $res = $client->request('GET', $value);

        if ($res->getStatusCode() == 200) {
            $allowedContentTypes = config('lfm-config.folder_categories.image.valid_mime');

            $contentType = $res->getHeader('content-type')[0];

            if (in_array($contentType, $allowedContentTypes)) {
                $isValid = true;
            }
        }

        return $isValid;
    }

    public function save()
    {
        $this->emitUp("editorjs-save:{$this->editorId}", $this->data);
    }

    public function render()
    {
        return view('livewire-editorjs::livewire.editorjs');
    }
}
