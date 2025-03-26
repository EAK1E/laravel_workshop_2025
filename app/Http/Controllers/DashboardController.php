<?php 

    namespace App\Http\Controllers;
    use App\Http\Controllers\DashboardController;

    class DashboardController extends Controller{
        public function dashboard() {
            return view('Welcome');
        }
    }

?>