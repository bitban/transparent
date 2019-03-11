<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Responses\Transcoder;

use JMS\Serializer\Annotation\Type;

class AllowedValuesResponse
{
    /**
     * @var string[]
     *
     * @Type("array<string>")
     */
    private $audio_codecs;

    /**
     * @var string[]
     *
     * @Type("array<string>")
     */
    private $video_formats;

    /**
     * @var string[]
     *
     * @Type("array<string>")
     */
    private $aspect_ratio;

    /**
     * @var string[]
     *
     * @Type("array<string>")
     */
    private $video_codecs;

    /**
     * @return string[]
     */
    public function getAudioCodecs(): array
    {
        return $this->audio_codecs;
    }

    /**
     * @return string[]
     */
    public function getVideoFormats(): array
    {
        return $this->video_formats;
    }

    /**
     * @return string[]
     */
    public function getAspectRatio(): array
    {
        return $this->aspect_ratio;
    }

    /**
     * @return string[]
     */
    public function getVideoCodecs(): array
    {
        return $this->video_codecs;
    }
}
