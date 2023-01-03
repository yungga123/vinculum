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
|deletedispatch
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
$route['default_controller'] = 'LoginController/startpage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dashboard'] = 'DashboardController';

//Login Controller
$route['login'] = 'LoginController';

//Item Controller
$route['masterlistofitems'] = 'ItemsController/items_masterlist';
$route['masterlistofindirectitems'] = 'ItemsController/indirect_items_masterlist';
$route['addnewitem'] = 'ItemsController/register_new_item';
$route['addnewitem-scan'] = 'ItemsController/register_new_item_by_scan';
$route['print-items/(:any)/(:any)'] = 'ItemsController/print_items/$1/$2';
$route['exportitems/(:any)'] = 'ItemsController/exportItems/$1';
$route['prf-form/(:any)/(:any)/(:any)'] = 'PRFController/prf_form/$1/$2/$3';
$route['prf-return/(:any)'] = 'PRFController/prf_return/$1';
$route['prf-list/(:any)'] = 'PRFController/prf_list/$1';
$route['prf-print/(:any)'] = 'PRFController/prf_print/$1';


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

//Sales Quotation
$route['makequotation'] = 'SalesQuotationController';
$route['sales_quotation_list'] = 'SalesQuotationController/salesquotationlist';
$route['sales_quotation_view/(:any)/(:any)'] = 'SalesQuotationController/salesquotationview/$1/$2';
$route['sales_quotation_update/(:any)'] = 'SalesQuotationController/sales_quotation_update_view/$1';
$route['deletequotation/(:any)'] = 'SalesQuotationController/deleteQuotation/$1';
//$route['sales_quotation_update/(:any)'] = 'SalesQuotationController/$1';

//Customers Controller
$route['customers'] = 'CustomersController';
$route['customers-add'] = 'CustomersController/customer_add';
$route['customers-update/(:num)'] = 'CustomersController/customer_update/$1';
$route['customers-print'] = 'CustomersController/customers_print';
$route['customer-details/(:any)'] = 'CustomersController/customer_details/$1';
$route['customers-addbranch/(:any)'] = 'CustomersController/customer_addbranch/$1';
$route['exportcustomers'] = 'CustomersController/exportCustomers';

//Pullouts Controller
$route['Pull-Out-item'] = 'PullOutsController';
$route['pending-pullouts'] = 'PullOutsController/pending_pullouts';
$route['confirmed-pullouts'] = 'PullOutsController/confirmed_pullouts';
$route['specific_confirmed_pullouts'] = 'PullOutsController/get_confirmed_pullouts';
$route['print-pullout/(:any)/(:any)/(:any)'] = 'PullOutsController/print_confirmed_pullout/$1/$2/$3';
$route['return-history'] = 'PullOutsController/return_history';
$route['specific-return-history'] = 'PullOutsController/specific_return_history';
$route['print-return/(:any)/(:any)'] = 'PullOutsController/print_return_history/$1/$2';
$route['pulloutbyscan'] = 'PullOutsController/pullout_scan';


//Delivery Receipt
$route['generate_dr'] = 'DeliveryReceiptController/get_delivery_receipt';


//Technicians Controller
$route['technicians'] = 'TechniciansController';
$route['technicians-edit/(:any)'] = 'TechniciansController/technicians_edit/$1';
$route['technicians-add'] = 'TechniciansController/add_tech';

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
$route['export-excel'] = 'ToolsController/exportTools';
$route['export-pullout-excel'] = 'ToolsController/exportpulloutTools';
$route['export-all-excel'] = 'ToolsController/exportAllTools';

//Service Report Controller
$route['service-report'] = 'ServiceReportController';
$route['service-report-list'] = 'ServiceReportController/service_report_table';
$route['service-report-view/(:any)'] = 'ServiceReportController/service_report_view/$1';
$route['service-report-update/(:any)'] = 'ServiceReportController/update_service_report/$1';

//Consumeables Controller
$route['consumeables'] = 'ConsumeablesController';

//Payroll Controller
$route['payroll'] = 'PayrollController';
$route['payroll-table'] = 'PayrollController/payroll_table';
$route['payslip/(:any)'] = 'PayrollController/payslip_view/$1';
$route['payslip-update/(:any)'] = 'PayrollController/update_payroll/$1';
$route['payroll-filter'] = 'PayrollController/payroll_table_filter';
$route['payroll-print/(:any)/(:any)'] = 'PayrollController/payslip_print/$1/$2';
$route['payroll-print-all'] = 'PayrollController/payslip_print_all';
$route['payroll-delete/(:any)'] = 'PayrollController/deletePayroll/$1';
$route['payroll-exportitems/(:any)/(:any)'] = 'PayrollController/exportItems/$1/$2';

//Job Order Controller
$route['joborder'] = 'JobOrderController';
$route['joborder-list/(:any)'] = 'JobOrderController/job_order_list/$1';
$route['print-joborder/(:any)'] = 'JobOrderController/print_joborder/$1';
$route['edit-pending-joborder/(:any)'] = 'JobOrderController/edit_pending_joborder/$1';
$route['edit-accepted-joborder/(:any)'] = 'JobOrderController/edit_accepted_joborder/$1';

//CovidSurveyController
$route['covidsurvey'] = 'CovidSurveyController';
$route['covidsurvey-table'] = 'CovidSurveyController/covidsurvey_table';
$route['covidsurvey-delete/(:any)'] = 'CovidSurveyController/update_delete/$1';
$route['covidsurvey-export'] = 'CovidSurveyController/export';

//RequisitionFormController
$route['requisition-form'] = 'RequisitionFormController';
$route['requisition-update/(:any)'] = 'RequisitionFormController/update_requisition/$1';
$route['requisition-pending'] = 'RequisitionFormController/pending_requisitions';
$route['requisition-view/(:any)'] = 'RequisitionFormController/requisition_view/$1';
$route['requisition-accepted'] = 'RequisitionFormController/accepted_requisitions';
$route['requisition-filed'] = 'RequisitionFormController/filed_requisitions';
$route['requisition-discarded'] = 'RequisitionFormController/discarded_requisitions';
$route['requisition-generate-po'] = 'RequisitionFormController/requistion_generate_po';

//Vendor
$route['vendor-database'] = 'VendorController';
$route['vendor-update/(:any)'] = 'VendorController/Vendor_Update/$1';
$route['vendor-add'] = 'VendorController/Vendor_Add';
$route['vendor-export'] = 'VendorController/exportvendorlist';

//Sales Inquiry
$route['inquiry-tempo-clients/(:any)'] = 'SalesInquiryController/new_client_list/$1';
$route['inquiry-existing-clients/(:any)'] = 'SalesInquiryController/existing_client_list/$1';
$route['inquiry-add-project/(:any)'] = 'SalesInquiryController/add_project/$1';
$route['inquiry-add-existingclient-project/(:any)'] = 'SalesInquiryController/add_existingclient_project/$1';
$route['inquiry-edit-project/(:any)'] = 'SalesInquiryController/edit_project/$1/$2';
$route['inquiry-edit-existingclient-project/(:any)'] = 'SalesInquiryController/edit_existingclient_project/$1/$2';
$route['exportnewclientsproject'] = 'SalesInquiryController/exportnewclientsproject';
$route['exportexistingclientsproject'] = 'SalesInquiryController/exportexistingclientsproject';
$route['inquiry-archive-projects'] = 'SalesInquiryController/archive_projects_list';
$route['inquiry-archive-project-confirmation/(:any)'] = 'SalesInquiryController/archive_project_confirmation/$1';

//Generated PO
$route['generated-po-list/(:any)'] = 'POController/index/$1';
$route['items-update/(:any)'] = 'POController/Items_PO_Update/$1';
$route['generate-po/(:any)'] = 'POController/generate_po_view/$1';
$route['generate-po-proceed/(:any)'] = 'POController/generate_po_view/$1';
$route['export_po_report'] = 'POController/exportreport';
$route['generate-po-filed/(:any)'] = 'POController/generate_po_view/$1';

//OFFLIMITS PAGE
$route['offlimits'] = 'LoginController/offlimits_page';

//START PAGE
$route['start'] = 'LoginController/startpage';

//LEAVEController
$route['aflaform'] = 'LeaveController';
$route['filed-leaves/(:any)'] = 'LeaveController/filed_leaves/$1';
$route['print-leaves/(:any)'] = 'LeaveController/print_filed_leave/$1';


//Accounts
$route['accounts'] = 'AccountsController';