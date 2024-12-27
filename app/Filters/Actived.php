<?php

namespace App\Filters;

use App\Models\ModelUser;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Config\JwtConfig;
use Firebase\JWT\Key;

class Actived implements FilterInterface
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
        $token = $request->getUri()->getSegment(3);
        
        $jwtConfig = new JwtConfig();
        
        try {
            $tokenDecode = JWT::decode($token, new Key($jwtConfig->key,$jwtConfig->algorithm));
        } catch (\Exception $e) {
            echo view('errors/html/costum',[
                'title' => 'Wooops',
                'message' => 'Invalid OR Expired Token'
            ]);
            exit;
        }

        $modelUser = new ModelUser();
        $user = $modelUser->select('user.actived')->find($tokenDecode->id);

        if ($user['actived']) {

            echo view('errors/html/costum',[
                'title' => 'Done',
                'message' => 'Your account is already active'
            ]);
            exit;
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
        
    }
}
