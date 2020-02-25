<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;

class UserController extends Controller
{
    public function allUsers(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.all_users');
    }
}
