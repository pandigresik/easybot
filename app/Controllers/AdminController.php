<?php

namespace App\Controllers;

use App\View\Themeable;
use CodeIgniter\Config\Factories;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;


class AdminController extends BaseController    
{
    use Themeable;
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Pagination should use App's pagination views
        $config            = config('Pager');
        $config->templates = [
            'default_full'   => 'App\Views\_pager_full',
            'default_simple' => 'App\Views\_pager_simple',
            'default_head'   => 'App\Views\_pager_head',
        ];
        Factories::injectMock('config', 'Pager', $config);

        parent::initController($request, $response, $logger);
    }

    protected function writeLog()
    {
        if (ENVIRONMENT !== 'production') {
            $query = $this->db->getLastQuery();
            log_message('critical', (string) $query);
        }
    }
}
