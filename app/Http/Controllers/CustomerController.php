<?php
namespace App\Http\Controllers;

class CustomerController extends Controller
{
    private const CUSTOMERS = [
        ['full_name' => 'Juan Dela Cruz', 'email' => 'juan@example.com', 'phone' => '09171234567'],
        ['full_name' => 'Maria Santos', 'email' => 'maria@example.com', 'phone' => '09181234567'],
        ['full_name' => 'Pedro Reyes', 'email' => 'pedro@example.com', 'phone' => '09191234567'],
        ['full_name' => 'Ana Garcia', 'email' => 'ana@example.com', 'phone' => '09201234567'],
        ['full_name' => 'Carlos Mendoza', 'email' => 'carlos@example.com', 'phone' => '09211234567'],
    ];

    public function index()
    {
        return view('customers.index', ['customers' => self::CUSTOMERS]);
    }
}
