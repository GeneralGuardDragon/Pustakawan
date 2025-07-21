<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleCheck implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Cek role sesuai yang dipassing ke route
        if ($arguments && ! in_array(session()->get('role'), $arguments)) {
            return redirect()->to('/unauthorized');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // tidak perlu apa-apa
    }
}
