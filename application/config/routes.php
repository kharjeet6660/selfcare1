<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['login']['POST']  = 'login/sign_in';
$route['login']['GET']   = 'login/index';
$route['logout']['GET'] = 'login/sign_out';

## Admin Routes
$route['admin']='admin/admin/index';
$route['admin/users/new']='admin/users/new';
$route['admin/users']['POST']='admin/users/create';
$route['admin/users/(:num)/edit']='admin/users/edit/$1';
$route['admin/users/(:num)']['POST']='admin/users/update/$1';
$route['admin/users/(:num)/delete']['GET']='admin/users/destroy/$1';
$route['admin/setup'] = 'admin/admin/setup';

$route['admin/branches']['GET']='admin/branches/index';
$route['admin/branches/new']='admin/branches/new';
$route['admin/branches']['POST']='admin/branches/create';
$route['admin/branches/(:num)/edit']='admin/branches/edit/$1';
$route['admin/branches/(:num)']['POST']='admin/branches/update/$1';
$route['admin/branches/(:num)/delete']['GET']='admin/branches/destroy/$1';

//$route['admin/user/']='admin/users/show_user_profile/$1';
$route['admin/users/(:any)']='admin/users/show_user_profile/$1';


$route['admin/requests/internet-banking']['GET']='admin/requests/internetbanking';
$route['admin/requests/mobile-banking']['GET']='admin/requests/mobilebanking';
$route['admin/requests/atmcard-services']['GET']='admin/requests/atmcardservices';

$route['admin/locations']['GET']='admin/locations/index';
$route['admin/locations/new']='admin/locations/new';
$route['admin/locations']['POST']='admin/locations/create';
$route['admin/locations/(:num)/edit']='admin/locations/edit/$1';
$route['admin/locations/(:num)']['POST']='admin/locations/update/$1';
$route['admin/locations/(:num)/delete']['GET']='admin/locations/destroy/$1';

$route['admin/circular']['GET']='admin/circular/index';
$route['admin/circular']['POST']='admin/circular/create';
$route['admin/circular/new']='admin/circular/new';
$route['admin/circular/(:num)/edit']='admin/circular/edit/$1';
$route['admin/circular/(:num)']['POST']='admin/circular/update/$1';
$route['admin/circular/(:num)/file-edit']='admin/circular/fileEdit/$1';
$route['admin/circular/(:num)/file-update']['POST']='admin/circular/fileUpdate/$1';
$route['admin/circular/(:num)/delete']['GET']='admin/circular/destroy/$1';
$route['admin/circular/(:num)/display/download']='admin/circular/download/$1';
$route['admin/circular/(:num)/download']='admin/circular/download/$1';

$route['admin/directory'] = 'admin/admin/directory';
$route['admin/directory/(:num)/delete'] = 'admin/admin/delete_directory/$1';

$route['admin/announcements/new']='admin/announcements/new';
$route['admin/announcements']['POST']='admin/announcements/create';
$route['admin/announcements/(:num)/edit']='admin/announcements/edit/$1';
$route['admin/announcements/(:num)']['POST']='admin/announcements/update/$1';
$route['admin/announcements/(:num)/delete']['GET']='admin/announcements/destroy/$1';

$route['admin/departments']['GET']='admin/departments/index';
$route['admin/departments/new']='admin/departments/new';
$route['admin/departments']['POST']='admin/departments/create';
$route['admin/departments/(:num)/edit']='admin/departments/edit/$1';
$route['admin/departments/(:num)']['POST']='admin/departments/update/$1';
$route['admin/departments/(:num)/delete']['GET']='admin/departments/destroy/$1';

//payroll routes
$route['admin/payroll']['GET']='admin/payroll/index';
$route['admin/payroll/new']='admin/excel_import_data/new';

$route['admin/payroll/(:num)/edit']='admin/payroll/edit/$1';
$route['admin/payroll/(:num)']['POST']='admin/payroll/update/$1';

$route['admin/payroll/(:num)/delete']['GET']='admin/payroll/destroy/$1';
$route['admin/payroll/(:num)/download']='admin/payroll/download/$1';


$route['admin/hardware']['GET']='admin/hardware/index';
$route['admin/hardware/new']='admin/hardware/new';
$route['admin/hardware']['POST']='admin/hardware/create';
$route['admin/hardware/(:num)/edit']='admin/hardware/edit/$1';
$route['admin/hardware/(:num)']['POST']='admin/hardware/update/$1';
$route['admin/hardware/(:num)/delete']['GET']='admin/hardware/delete/$1';
$route['admin/hardware/(:num)/assign']['GET']='admin/hardware/assign/$1';
$route['admin/hardware/(:num)/assign']['POST']='admin/hardware/updateassign/$1';
$route['admin/hardware/(:num)/collect']['POST']='admin/hardware/collect/$1';

## User Routes
$route['profile']['GET'] = 'user/profile';
$route['profile']['POST']= 'user/updateprofile';
$route['profile/edit']   = 'user/editprofile';
$route['notifications'] = 'user/notifications';

//Internet Banking Routes
$route['internet-banking-request']['GET']='Internetbanking/index';
$route['internet-banking-request/new']='Internetbanking/new';
$route['internet-banking-request']['POST']='Internetbanking/create';

//Mobile Banking Routes
$route['mobile-banking-request']['GET']='Mobilebanking/index';
$route['mobile-banking-request/new']='Mobilebanking/new';
$route['mobile-banking-request']['POST']='Mobilebanking/create';

//ATM Card Servises Routes
$route['atmcard-services']['GET']='Atmcardservices/index';
$route['atmcard-services/new']='Atmcardservices/new';
$route['atmcard-services']['POST']='Atmcardservices/create';

//Covid Data Routes
$route['covid-data']['GET']='Coviddata/index';
$route['covid-data/new']='Coviddata/new';
$route['covid-data']['POST']='Coviddata/create';


//User Routes
$route['circular']['GET']='circular/index';
$route['circular/(:num)/display/download']='circular/download/$1';

$route['directory']               = 'bankdirectory/index';
$route['hardware/alloted']['GET'] = 'hardware/alloted';

$route['annual_holidays']       = 'timeoff/annual_holidays';
$route['timeoff']['GET']        = 'timeoff/index';
$route['timeoff/new']['GET']    = 'timeoff/new';
$route['timeoff/(:num)/cancel'] = 'timeoff/cancel/$1';
$route['timeoff']['POST']       = 'timeoff/create';

$route['payslips'] 					= 'dashboard/payslips';
$route['payslips/download/(:num)']  = 'dashboard/payslip_pdf/$1';
$route['forms']						= 'dashboard/forms';
$route['forms/(:any)']				= 'dashboard/forms/$1';

$route['forget-password']['GET'] = 'login/forgetPassword';
$route['forget-password']['POST'] = 'login/getPassword';
$route['reset-password']['GET'] = 'login/setnewpassword';
$route['reset-password']['POST'] = 'login/updatenewpassword';

$route['password']['GET']    = 'user/password';
$route['password']['POST'] = 'user/update_password';

$route['hr-policy']['GET']    = 'hrpolicy/index';

$route['translate_uri_dashes'] = false;
$route['default_controller'] = 'dashboard/index';
$route['404_override'] = 'login/page404';
