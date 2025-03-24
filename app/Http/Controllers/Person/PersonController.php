<?php

namespace App\Http\Controllers\Person;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class PersonController extends Controller
{
    protected $data;
    protected $apiVersion;

    public function __construct()
    {
        // Carregar os dados e a versão da API uma vez
        $this->data = include __DIR__ . '/data.php';
        $this->apiVersion = env('API_VERSION');
    }
    public function allData(): JsonResponse
    {
        return response()->json([
            'Status' => 200,
            'Message' => 'success',
            'Data' => $this->data,
            'Api Version' => $this->apiVersion,
        ]);
    }
    public function allNames(): JsonResponse
    {
        $names = [];
        foreach ($this->data as $item) {
            $names[] = $item['name'];
        }
        return response()->json([
            'Status' => 200,
            'Message' => 'success',
            'Data' => $names,
            'Api Version' => $this->apiVersion,
        ]);
    }
    public function allRecords(): JsonResponse
    {
        return response()->json([
            'Status' => 200,
            'Message' => 'success',
            'Data' => ['total_records' => count($this->data)],
            'Api Version' => $this->apiVersion,
        ]);
    }
    public function emailDomains(): JsonResponse
    {
        $email_domains = [];
        foreach ($this->data as $person) {
            if (filter_var($person['email'], FILTER_VALIDATE_EMAIL)) {
                $email_domain = explode('@', $person['email'])[1];
                if (!in_array($email_domain, $email_domains)) {
                    $email_domains[] = $email_domain;
                }
            }
        }
        return response()->json([
            'Status' => 200,
            'Message' => 'success',
            'Data' => $email_domains,
            'Api Version' => $this->apiVersion,
        ]);
    }
    public function personData(): JsonResponse
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            return response()->json([
                'Status' => 400,
                'Message' => 'error',
                'Data' => 'Missing id parameter',
                'Api Version' => $this->apiVersion,
            ]);
        }
        if ($id < 0 || $id > count($this->data) - 1) {
            return response()->json([
                'Status' => 400,
                'Message' => 'error',
                'Data' => 'Person not found',
                'Api Version' => $this->apiVersion,
            ]);
        }
        return response()->json([
            'Status' => 200,
            'Message' => 'success',
            'Data' => $this->data[$id],
            'Api Version' => $this->apiVersion,
        ]);
    }
    public function status(): JsonResponse
    {
        return response()->json([
            'Status' => 200,
            'Message' => 'API is running!',
            'Api Version' => $this->apiVersion,
        ]);
    }
}
