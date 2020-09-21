<?php

namespace Spatie\MediaLibrary\Downloaders;

use Spatie\MediaLibrary\MediaCollections\Exceptions\UnreachableUrl;

class DefaultDownloader
{
    /**
     * @param $url
     * @return false|string
     * @throws UnreachableUrl
     */
    public function getTempFile($url)
    {
        if (!$stream = @fopen($url, 'r')) {
            throw UnreachableUrl::create($url);
        }

        $temporaryFile = tempnam(sys_get_temp_dir(), 'media-library');
        file_put_contents($temporaryFile, $stream);

        return $temporaryFile;
    }
}
