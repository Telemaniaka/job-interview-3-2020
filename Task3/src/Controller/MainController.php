<?php

declare(strict_types=1);

namespace Recruitment\ApiConsumeTask\Controller;

use Bigcommerce\Api\Client as Bigcommerce;
use Recruitment\ApiConsumeTask\Model\User;
use Recruitment\ApiConsumeTask\Service\Request;
use Recruitment\ApiConsumeTask\Service\Router;

class MainController
{
    private $template;
    private $perPage = 10;

    public function __construct($template)
    {
        $this->template = $template;
    }

    public function indexAction()
    {
        if (User::getCurrent()) {
            Router::redirect('/listCustomers');
        }
        $this->template->display('Login.html');
    }

    public function errorAction()
    {
        $this->template->display('Error.html');
    }

    public function authAction()
    {
        $user = User::getCurrent();

        if (!$user) {
            Router::redirect('/error');
        }

        // TODO: https://developer.bigcommerce.com/api-docs/apps/guide/auth

        $object = new \stdClass();
        $object->client_id = $user->clientId;
        $object->client_secret = $user->clientSecret;
        $object->redirect_uri = 'https://app.com/redirect';
        $object->code = Request::get('code');
        $object->context = Request::get('context');
        $object->scope = Request::get('scope');

        $authTokenResponse = Bigcommerce::getAuthToken($object);

        $user->accessToken = $authTokenResponse->access_token;
        $user->save();

        Router::redirect('/listCustomers');
    }

    public function listCustomersAction()
    {
        $user = User::getCurrent();

        if (!$user) {
            Router::redirect('/');
        }

        Bigcommerce::configure([
            'client_id' => $user->clientId,
            'auth_token' => $user->accessToken,
            'store_hash' => $user->storeHash,
        ]);

        $customers = [];

        $customerCount = Bigcommerce::getCustomersCount();

        for ($page = 1; $page <= ceil($customerCount / $this->perPage); ++$page) {
            $filter = ['page' => $page, 'limit' => $this->perPage];
            $fetchedCustomer = Bigcommerce::getCustomers($filter);
            $customers = array_merge($customers, $this->filteredCustomers($fetchedCustomer));
        }

        echo json_encode($customers);
    }

    private function filteredCustomers($customers)
    {
        $filteredCustomers = [];

        foreach ($customers as $customer) {
            if ($this->endsWith($customer->email, '@gmail.com')) {
                $filteredCustomers[] = $customer;
            }
        }

        return $filteredCustomers;
    }

    private function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if (!$length) {
            return true;
        }

        return substr($haystack, -$length) === $needle;
    }
}
