<?php

namespace App\TwitterApi;

class RequestRetryHelper
{
    public static function request(\closure $func, int $limit)
    {
        for ($i = 1; $i < $limit; $i++) {
            try {
                return $func();

            } catch (\Exception $e) {
                if (preg_match('/Operation timed out/', $e->getMessage()) === 1) {
                    continue;
                }
                if (preg_match('/Resolving timed out/', $e->getMessage()) === 1) {
                    continue;
                }

                throw $e;
            }
        }

        throw new \RuntimeException('Failed to request. Retry limit exeeded.');
    }
}
