<?php

namespace Aquatic\FedEx\Response\Mixin;

use Aquatic\FedEx\Response\Notification;

trait NotificationParser
{
    public function parseNotifications($response)
    {
        $this->notifications_highest_severity = $response->HighestSeverity;
        $this->notifications = [];

        foreach($response->Notifications as $note)
        {
            $notification = new Notification($note->Severity, $note->Source, $note->Code, $note->Message, $note->LocalizedMessage);
            $this->notifications[] = $notification;
        }

        return $this;
    }

    public function getNotifications(): array
    {
        return $this->notifications;
    }

    public function getNotificationHighestSeverity(): string
    {
        return $this->notifications_highest_severity;
    }
}