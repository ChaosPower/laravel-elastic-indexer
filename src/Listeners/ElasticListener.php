<?php

namespace ElasticEqb\Listeners;

use Illuminate\Queue\SerializesModels;

class ElasticListener extends Event
{
    use SerializesModels;

}