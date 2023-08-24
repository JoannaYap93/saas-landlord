<?php

namespace App\Core\MediaLibrary;

use DateTimeInterface;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\Support\UrlGenerator\BaseUrlGenerator;

class GCSUrlGenerator extends BaseUrlGenerator
{
    /**
     * Get the url for the profile of a media item.
     *
     * @return string
     */
    public function getUrl() : string
    {
        $disk = Storage::disk('digitalocean');
        // $disk = Storage::disk('local');
        return $disk->url($this->getPathRelativeToRoot());

        // return config('media-library.s3.domain') . '/' . $this->getPathRelativeToRoot();
    }

    /**
     * Get the temporary url for a media item.
     *
     * @param \DateTimeInterface $expiration
     * @param array $options
     *
     * @return string
     */
    public function getTemporaryUrl(DateTimeInterface $expiration, array $options = []) : string
    {
        // To Do - not needed currently
    }

    /**
     * Get the url to the directory containing responsive images.
     *
     * @return string
     */
    public function getResponsiveImagesDirectoryUrl() : string
    {
        // To Do - not needed currently
    }

    /**
     * Get the url for the profile of a media item.
     *
     * @return string
     */
    public function getPath() : string
    {
        return $this->media->disk === 'public' ? $this->getStoragePath() . '/' . $this->getPathRelativeToRoot() : $this->getPathRelativeToRoot();
    }

    /*
        * Get the path where the whole medialibrary is stored.
        */
    protected function getStoragePath() : string
    {
        $diskRootPath = $this->config->get("filesystems.disks.{$this->media->disk}.root");
        return realpath($diskRootPath);
    }
}