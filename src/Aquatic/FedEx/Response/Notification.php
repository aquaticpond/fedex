<?php

namespace Aquatic\FedEx\Response;

use Aquatic\FedEx\Contract\Response\Notification as Contract;

class Notification implements Contract
{
    protected $severity = '',
              $source = '',
              $code = 0,
              $message = '',
              $localized_message = '',
              $message_parameters = [];

    public function __construct(string $severity, string $source, int $code, string $message, string $localized_message)
    {
        $this->severity = $severity;
        $this->source = $source;
        $this->code = $code;
        $this->message = $message;
        $this->localized_message = $localized_message;
    }

    public function getSeverity(): string
    {
        return $this->serverity;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getLocalizedMessage(): string
    {
        return $this->localized_message;
    }
}

