<?php

namespace App\Processors;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;

abstract class Processor
{
    use AuthorizesRequests, DispatchesJobs;
}
