<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelUser;

class Auth implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        session()->remove('actived_token');
        $encripter = \Config\Services::encrypter();
        $modelUser = new ModelUser();

        try {
            if (session('user')) {
                $session = session()->get('user');
                $user = $modelUser->find($session);
                if ($user['role']) {
                    return redirect()->to('/admin/dashboard')->with('error', "can't access that page");
                } else {
                    return redirect()->to('/')->with('error', "can't access that page");
                }
            } else {
                $cookie = base64_decode(get_cookie('remember_me'));
                if ($cookie) {
                    $decriptCookie = $encripter->decrypt($cookie);
                    $user = $modelUser->find($decriptCookie);
                    session()->set('user', $user['id_user']);
                    if ($user['role']) {
                        return redirect()->to('/admin/dashboard')->with('success', "Selamat Datang " . $user['username']);
                    }
                    return redirect()->to('/')->with('success', "Selamat Datang " . $user['username']);
                }
            }
        } catch (\CodeIgniter\Encryption\Exceptions\EncryptionException $e) {
            delete_cookie('remember_me');
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}