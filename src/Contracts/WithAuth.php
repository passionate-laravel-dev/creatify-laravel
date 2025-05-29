<?php

namespace Passionatelaraveldev\CreatifyLaravel\Contracts;

interface WithAuth
{
    public function authHeader() : array;
    public function ensureAuth() : bool;
}
