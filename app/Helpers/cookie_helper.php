<?php
if (!function_exists('setAppCookie')) {
    /**
     * Set a cookie with the specified parameters.
     *
     * @param string $name
     * @param string $value
     * @param int $expire Expiration time in seconds (default: 7 days)
     * @param bool $secure Use HTTPS only (default: false)
     * @param bool $httpOnly Prevent access via JavaScript (default: true)
     * @param string $path Cookie path (default: '/')
     * @param string|null $domain Cookie domain (default: null)
     * @param string $sameSite SameSite policy ('Lax', 'Strict', 'None') (default: 'Lax')
     * @return void
     */
    function setAppCookie(
        string $name,
        string $value,
        int $expire = 60 * 60 * 24 *7,
        bool $secure = false,
        bool $httpOnly = true,
        string $path = '/',
        ?string $domain = null,
        string $sameSite = 'Lax'
    ): void {
        $cookieOptions = [
            'name'     => $name,
            'value'    => $value,
            'expire'   => $expire,
            'path'     => $path,
            'domain'   => $domain,
            'secure'   => $secure,
            'httponly' => $httpOnly,
            'samesite' => $sameSite,
        ];
        set_cookie($cookieOptions);
    }
}
