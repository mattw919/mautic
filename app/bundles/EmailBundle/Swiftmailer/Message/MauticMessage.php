<?php

namespace Mautic\EmailBundle\Swiftmailer\Message;

class MauticMessage extends \Swift_Message
{
    /**
     * @var array
     */
    protected $metadata = [];

    /**
     * @var array
     */
    protected $attachments = [];

    /**
     * Create a new Message.
     *
     * @param string $subject
     * @param string $body
     * @param string $contentType
     * @param string $charset
     *
     * @return Swift_Message
     */
    public static function newInstance($subject = null, $body = null, $contentType = null, $charset = null)
    {
        return new self($subject, $body, $contentType, $charset);
    }

    public function addMetadata($email, array $metadata)
    {
        $this->metadata[$email] = $metadata;
    }

    /**
     * Get the metadata.
     *
     * @return array
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Clears the metadata.
     */
    public function clearMetadata()
    {
        $this->metadata = [];
    }

    /**
     * @param null       $fileName
     * @param null       $contentType
     * @param bool|false $inline
     */
    public function addAttachment($filePath, $fileName = null, $contentType = null, $inline = false)
    {
        $attachment = [
            'filePath'    => $filePath,
            'fileName'    => $fileName,
            'contentType' => $contentType,
            'inline'      => $inline,
        ];

        $this->attachments[] = $attachment;
    }

    /**
     * Get attachments.
     *
     * @return array
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * Clear attachments.
     */
    public function clearAttachments()
    {
        $this->attachments = [];
    }
}
