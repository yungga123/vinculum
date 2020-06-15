<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'LoginController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dashboard'] = 'DashboardController';

//Login Controller
$route['login'] = 'LoginController';

//Item Controller
$route['masterlistofitems'] = 'ItemsController/items_masterlist';
$route['masterlistofindirectitems'] = 'ItemsController/indirect_items_masterlist';
$route['addnewitem'] = 'ItemsController/register_new_item';
$route['print-items/(:any)/(:any)'] = 'ItemsController/print_items/$1/$2';


//Logs Controller
$route['logs'] = 'LogsController';
$route['print-logs'] = 'LogsController/print_register_logs';
$route['specific-logs'] = 'LogsController/get_specific_register_logs';

//Dispatch form
$route['dispatchform'] = 'DispatchFormController/addDispatch';
$route['dispatchtable'] = 'DispatchFormController/DispatchTable';
$route['printdispatch/(:num)'] = 'DispatchFormController/printDispatch/$1';
$route['updatedispatch/(:any)'] = 'DispatchFormController/updateDispatch/$1';
$route['deletedispatch/(:any)'] = 'DispatchFormController/deleteDispatch/$1';

//Schedules Controller
$route['schedules'] = 'SchedulesController';

//Sales Dispatch
$route['sales-dispatch'] = 'SalesDispatchController';
$route['print-salesdispatch/(:any)'] = 'SalesDispatchController/print_sales_dispatch/$1';
$route['salesdispatch-table'] = 'SalesDispatchController/sales_dispatch_table';
$route['update-salesdispatch/(:any)'] = 'SalesDispatchController/update_sales_dispatch/$1';

//Customers Controller
$route['customers'] = 'CustomersController';
$route['customers-add'] = 'CustomersController/customer_add';
$route['customers-update/(:num)'] = 'CustomersController/customer_update/$1';
$route['customers-print'] = 'CustomersController/customers_print';
$route['customer-details/(:any)'] = 'CustomersController/customer_details/$1';
$route['customers-addbranch/(:any)'] = 'CustomersController/customer_addbranch/$1';

//Pullouts Controller
$route['Pull-Out-item'] = 'PullOutsController';
$route['pending-pullouts'] = 'PullOutsController/pending_pullouts';
$route['confirmed-pullouts'] = 'PullOutsController/confirmed_pullouts';
$route['specific_confirmed_pullouts'] = 'PullOutsController/get_confirmed_pullouts';
$route['print-pullout/(:any)/(:any)/(:any)'] = 'PullOutsController/print_confirmed_pullout/$1/$2/$3';
$route['return-history'] = 'PullOutsController/return_history';
$route['specific-return-history'] = 'PullOutsController/specific_return_history';
$route['print-return/(:any)/(:any)'] = 'PullOutsController/print_return_history/$1/$2';

//Technicians Controller
$route['technicians'] = 'TechniciansController';
$route['technicians-edit/(:any)'] = 'TechniciansController/technicians_edit/$1';

//Project Report Controller
$route['project-report'] = 'ProjectReportController';
$route['project-report-list'] = 'ProjectReportController/projectReportList';
$route['project-report-view/(:any)'] = 'ProjectReportController/projectReportView/$1';
$route['project-report-update/(:any)'] = 'ProjectReportController/project_report_update/$1';

//Tools Controller
$route['tools'] = 'ToolsController';
$route['addtools'] = 'ToolsController/add_tools';
$route['printtools'] = 'ToolsController/print_tools';
$route['tools-pullout'] = 'ToolsController/tools_pullout';
$route['tool-return-history'] = 'ToolsController/return_history';

//Service Report Controller
$route['service-report'] = 'ServiceReportController';
$route['service-report-list'] = 'ServiceReportController/service_report_table';
$route['service-report-view/(:any)'] = 'ServiceReportController/service_report_view/$1';
$route['service-report-update/(:any)'] = 'ServiceReportController/update_service_report/$1';