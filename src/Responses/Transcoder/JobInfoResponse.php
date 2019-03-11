<?php
/**
 * Copyright 2019 Bitban Technologies, S.L.
 * Todos los derechos reservados.
 */

namespace Bitban\Transparent\Responses\Transcoder;

use JMS\Serializer\Annotation\Type;

class JobInfoResponse
{
    public const STATUS_FINISHED = "FINISHED";
    public const STATUS_ERROR = "ERROR";
    public const STATUS_PENDING = "PENDING";
    public const STATUS_UPLOADING = "UPLOADING";
    public const STATUS_TRANSCODING = "TRANSCODING";

    /**
     * @var string
     *
     * @Type("string")
     */
    private $status;

    /**
     * @var string
     *
     * @Type("string")
     */
    private $comment;

    /**
     * @var string
     *
     * @Type("string")
     */
    private $download_user;

    /**
     * @var string
     *
     * @Type("string")
     */
    private $upload_protocol;

    /**
     * @var string
     *
     * @Type("string")
     */
    private $upload_url;

    /**
     * @var string[]
     *
     * @Type("array<string>")
     */
    private $callback_url;

    /**
     * @var string
     *
     * @Type("string")
     */
    private $order_id;

    /**
     * @var \DateTime
     *
     * @Type("DateTime<'Y-m-d H:i:sO'>")
     */
    private $timestamp;

    /**
     * @var string
     *
     * @Type("string")
     */
    private $download_url;

    /**
     * @var string
     *
     * @Type("string")
     */
    private $filename;

    /**
     * @var int
     *
     * @Type("int")
     */
    private $profile;

    /**
     * Duración del vídeo en segundos
     *
     * @var float
     *
     * @Type("float")
     */
    private $duration;

    /**
     * @var string
     *
     * @Type("string")
     */
    private $upload_user;

    /**
     * @var string
     *
     * @Type("string")
     */
    private $label;

    /**
     * @var string[]
     *
     * @Type("array<string>")
     */
    private $email;

    /**
     * @var string
     *
     * @Type("string")
     */
    private $download_protocol;

    /**
     * Tamaño del vídeo en bytes
     *
     * @var int
     *
     * @Type("int")
     */
    private $size;

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function getDownloadUser(): string
    {
        return $this->download_user ?? "";
    }

    public function getUploadProtocol(): string
    {
        return $this->upload_protocol;
    }

    public function getUploadUrl(): string
    {
        return $this->upload_url;
    }

    /**
     * @return string[]
     */
    public function getCallbackUrl(): array
    {
        return $this->callback_url;
    }

    public function getOrderId(): string
    {
        return $this->order_id;
    }

    public function getTimestamp(): \DateTime
    {
        return $this->timestamp;
    }

    public function getDownloadUrl(): string
    {
        return $this->download_url;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getProfile(): int
    {
        return $this->profile;
    }

    public function getDuration(): float
    {
        return $this->duration;
    }

    public function getUploadUser(): string
    {
        return $this->upload_user;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string[]
     */
    public function getEmail(): array
    {
        return $this->email;
    }

    public function getDownloadProtocol(): string
    {
        return $this->download_protocol;
    }

    public function getSize(): int
    {
        return $this->size;
    }
}
