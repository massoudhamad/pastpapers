<?php 
	  switch((isset($_GET['ep'])?$_GET['ep'] : ''))
	  {
	    //dashboard
            case 'dashboard':
            include 'dashboard.php';
            break;  
        // upload exam past paper
            case 'upload_paper':
            include 'upload_paper.php';
            break;
        // upload exam past paper
        case 'view_data':
            include 'view_data.php';
            break;
        // view report
            case 'report':
            include 'report.php';
            break;
        //register user
            case 'registration':
            include 'registration.php';
            break;
        //users management
            case 'view_users':
            include 'users.php';
            break;
        // login
        case 'login':
            include 'login.php';
            break;
        // default home page
		  default:
		      include('dashboard.php');
	  }
	  
	  ?>