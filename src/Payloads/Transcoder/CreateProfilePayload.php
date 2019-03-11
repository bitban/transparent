<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Payloads\Transcoder;

use JMS\Serializer\Annotation\Type;

class CreateProfilePayload
{
    /**
     * @var string
     *
     * @Type("string")
     */
    private $name;

    /**
     * @var string
     *
     * @Type("string")
     */
    private $video_format;

    /**
     * @var string
     *
     * @Type("string")
     */
    private $video_codec;

    /**
     * @var int|null
     *
     * @Type("int")
     */
    private $video_width;

    /**
     * @var int|null
     *
     * @Type("int")
     */
    private $video_height;

    /**
     * @var int
     *
     * @Type("int")
     */
    private $video_bitrate;

    /**
     * @var string
     *
     * @Type("string")
     */
    private $video_aspect;

    /**
     * @var int
     *
     * @Type("int")
     */
    private $audio_bitrate;

    /**
     * @var string
     *
     * @Type("string")
     */
    private $audio_codec;

    /**
     * @var int
     *
     * @Type("int")
     */
    private $company;

    public function __construct(
        string $name,
        string $video_format,
        string $video_codec,
        ?int $video_width,
        ?int $video_height,
        int $video_bitrate,
        string $video_aspect,
        int $audio_bitrate,
        string $audio_codec,
        int $company
    ) {
        $this->name = $name;
        $this->video_format = $video_format;
        $this->video_codec = $video_codec;
        $this->video_width = $video_width;
        $this->video_height = $video_height;
        $this->video_bitrate = $video_bitrate;
        $this->video_aspect = $video_aspect;
        $this->audio_bitrate = $audio_bitrate;
        $this->audio_codec = $audio_codec;
        $this->company = $company;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getVideoFormat(): string
    {
        return $this->video_format;
    }

    public function getVideoCodec(): string
    {
        return $this->video_codec;
    }

    public function getVideoWidth(): ?int
    {
        return $this->video_width;
    }

    public function getVideoHeight(): ?int
    {
        return $this->video_height;
    }

    public function getVideoBitrate(): int
    {
        return $this->video_bitrate;
    }

    public function getVideoAspect(): string
    {
        return $this->video_aspect;
    }

    public function getAudioBitrate(): int
    {
        return $this->audio_bitrate;
    }

    public function getAudioCodec(): string
    {
        return $this->audio_codec;
    }

    public function getCompany(): int
    {
        return $this->company;
    }
}
