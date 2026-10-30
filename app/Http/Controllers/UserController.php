<?php
namespace App\Http\Controllers;

class UserController extends Controller
{
    private const USERS = [
        ['username' => 'admin', 'full_name' => 'System Administrator'],
        ['username' => 'cashier1', 'full_name' => 'John Smith'],
        ['username' => 'cashier2', 'full_name' => 'Jane Doe'],
        ['username' => 'manager', 'full_name' => 'Robert Wilson'],
        ['username' => 'staff1', 'full_name' => 'Emily Brown'],
    ];

    public function index()
    {
        return view('users.index', ['users' => self::USERS]);
    }
}
