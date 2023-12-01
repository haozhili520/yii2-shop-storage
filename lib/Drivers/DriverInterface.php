<?php

namespace Tmzkj\Storage\Drivers;

interface DriverInterface
{
    function put($localFile, $saveTo);
}