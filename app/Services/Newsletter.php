<?php

namespace App\Services;

class Newsletter
{
    public function subscribe(string $email, string $list=null)
    {
        $list ??= config('services.mailchimp.lists.subscriber');

        return $this->client()->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);

    }

    protected function client()
    {
    
        return (new \MailchimpMarketing\ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.server'),
        ]);

    }
}