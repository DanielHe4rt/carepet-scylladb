<?php

namespace App\Owner\Controllers;

use App\Core\Http\BaseController;
use App\Owner\Actions\GetOwnerById;

final class OwnerController extends BaseController
{
    public function __invoke(string $ownerId)
    {
        $this->responseJson(GetOwnerById::handle($ownerId));
    }
}