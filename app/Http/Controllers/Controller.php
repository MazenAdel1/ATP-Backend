<?php

namespace App\Http\Controllers;

use App\Traits\MessageTrait;
use Illuminate\Validation\Concerns\FormatsMessages;

abstract class Controller
{
    use MessageTrait;
}
