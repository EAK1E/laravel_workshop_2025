<?php 
namespace App\Http\Controllers;

class CompanyController extends Controller
{
    public function index()
    {
        //ใช้ dd เช็ค Debug เช่น dd('company');
        
        return view('company');
    }
}
?>