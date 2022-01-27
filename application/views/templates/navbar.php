<?php
defined('BASEPATH') or exit('No direct script access allowed.');
?>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?php echo site_url('dashboard') ?>" class="nav-link">Home</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?php echo site_url('customers') ?>" class="nav-link">Customers</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?php echo site_url('technicians') ?>" class="nav-link">Employee List</a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('LoginController/logout') ?>" style="color: #17a2b8">
						<u>Logout</u>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->


		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="#" class="brand-link">
				<img src="<?php echo base_url('assets/images/') ?>vcmlogo.jpg" alt="Vinculum Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">Vinculum M.I.S.</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<!-- Image 160x160 -->
						<img src="<?php echo base_url('assets/AdminLTE/') ?>dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block">Hi! <?php echo $this->session->userdata('logged_in')['firstname'] . ' ' . $this->session->userdata('logged_in')['lastname'] ?></a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

						<li class="nav-item">
							<a href="<?php echo site_url('dashboard') ?>" class="nav-link<?php echo $dashboard ?>">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>

						<!-- INVENTORY GROUP -->
						<li class="nav-item has-treeview">

							<a href="javascript:void(0)" class="nav-link<?php echo $ul_items_tree ?>">
								<i class="nav-icon fas fa-warehouse"></i>
								<p>
									Inventory
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">

								<li class="nav-item has-treeview<?php echo $items_menu_status; ?>">
									<a href="javascript:void(0)" class="nav-link<?php echo $ul_items ?>">
										<i class="nav-icon fas fa-cubes"></i>
										<p>
											Items Inventory
											<i class="fas fa-angle-left right"></i>
										</p>
									</a>
									<ul class="nav nav-treeview" style="display: <?php echo $items_menu_display ?>;">

										<li class="nav-item">
											<a href="<?php echo site_url('masterlistofitems') ?>" class="nav-link<?php echo $registration ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>Direct Items List</p>
											</a>
										</li>

										<li class="nav-item">
											<a href="<?php echo site_url('masterlistofindirectitems') ?>" class="nav-link<?php echo $indirect_list ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>Indirect Item List</p>
											</a>
										</li>

										<li class="nav-item">
											<a href="<?php echo site_url('Pull-Out-item') ?>" class="nav-link<?php echo $pullout_items ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>Pull-out Items (Manual)</p>
											</a>
										</li>

										<li class="nav-item">
											<a href="<?php echo site_url('pulloutbyscan') ?>" class="nav-link<?php echo $pullout_scan ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>Pull-out Items (Scanner)</p>
											</a>
										</li>

										<li class="nav-item">
											<a href="<?php echo site_url('confirmed-pullouts') ?>" class="nav-link<?php echo $listof_pullouts ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>Confirmed Pullouts</p>
											</a>
										</li>
									</ul>
								</li>

								<li class="nav-item">
									<a href="<?php echo site_url('tools') ?>" class="nav-link<?php echo $ul_tools ?>">
										<i class="nav-icon fas fa-wrench"></i>
										<p>
											Tools
										</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="<?php echo site_url('consumeables') ?>" class="nav-link<?php echo $consumeables ?>">
										<i class="nav-icon fas fa-cube"></i>
										<p>Consumeables</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="<?php echo site_url('logs') ?>" class="nav-link<?php echo $history ?>">
										<i class="nav-icon fas fa-history"></i>
										<p>History</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="#" class="nav-link<?php echo $listof_warranty ?>">
										<i class="nav-icon fas fa-certificate"></i>
										<p>List of Warranty</p>
									</a>
								</li>

								<li class="nav-item has-treeview<?php echo $consumeables; ?>">
									<a href="javascript:void(0)" class="nav-link<?php echo $consumeables ?>">
										<i class="nav-icon fas fa-copy"></i>
										<p>
											Project Request Form
											<i class="fas fa-angle-left right"></i>
										</p>
									</a>

									<ul class="nav nav-treeview" style="display: <?php echo $consumeables ?>;">


										<li class="nav-item">
											<a href="<?php echo site_url('prf/prf') ?>" class="nav-link<?php echo $consumeables ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>PRF</p>
											</a>
										</li>

										<li class="nav-item">
											<a href="<?php echo site_url('prf/prf_list') ?>" class="nav-link<?php echo $consumeables ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>PRF List</p>
											</a>
										</li>

									</ul>
							</ul>
						</li>

						<!-- PURCHASING GROUP -->
						<li class="nav-item has-treeview">

							<a href="javascript:void(0)" class="nav-link<?php echo $ul_purchasing_tree ?>">
								<i class="nav-icon fas fa-shopping-cart"></i>
								<p>
									Purchasing
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item has-treeview<?php echo $requisition_tree ?>">
									<a href="javascript:void(0)" class="nav-link<?php echo $requisition_form ?>">
										<i class="nav-icon far fa-edit"></i>
										<p>Item Requisition</p>
										<i class="fas fa-angle-left right"></i>
									</a>

									<ul class="nav nav-treeview" style="display: <?php echo $requisition_display ?>">
										<li class="nav-item">
											<a href="<?php echo site_url('requisition-form') ?>" class="nav-link <?php echo $requisition_add ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>Purchase Request</p>
											</a>
										</li>

										<li class="nav-item">
											<a href="<?php echo site_url('requisition-pending') ?>" class="nav-link <?php echo $requisition_pending ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>Pending PR <span class="right badge badge-danger"><?php echo $this->CountsModel->count_pending_requisitions() ?></span></p>
											</a>
										</li>

										<li class="nav-item">
											<a href="#" class="nav-link <?php echo $requisition_accepted ?>" data-toggle="modal" data-target="#acceptedrequest_validate">
												<i class="far fa-circle nav-icon"></i>
												<p>Approved Requests <span class="right badge badge-danger"><?php echo $this->CountsModel->count_accepted_requisitions() ?></span></p>
											</a>
										</li>

										<li class="nav-item">
											<a href="#" class="nav-link <?php echo $requisition_filed ?>" data-toggle="modal" data-target="#filedrequest_validate">
												<i class="far fa-circle nav-icon"></i>
												<p>Filed Requests <span class="right badge badge-danger"><?php echo $this->CountsModel->count_filed_requisitions() ?></span></p>
											</a>
										</li>

										<li class="nav-item">
											<a href="<?php echo site_url('requisition-discarded') ?>" class="nav-link <?php echo $requisition_discarded ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>Discarded Requests <span class="right badge badge-danger"><?php echo $this->CountsModel->count_discarded_requisitions() ?></span></p>
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-item">
									<a href="<?php echo site_url('generated-po-list') ?>/pending" class="nav-link<?php echo $li_generated_po ?>">
										<i class="nav-icon fas fa-file"></i>
										<p>Generated P.O</p>
										<span class="badge badge-danger"> NEW</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo site_url('vendor-database') ?>" class="nav-link<?php echo $li_vendor_list ?>">
										<i class="nav-icon fas fa-database"></i>
										<p>Vendor</p>
									</a>
								</li>
							</ul>
						</li>

						<!-- PROJECT AND SERVICES GROUP -->
						<li class="nav-item has-treeview">

							<a href="javascript:void(0)" class="nav-link<?php echo $ul_project_tree ?>">
								<i class="nav-icon fas fa-project-diagram"></i>
								<p>
									Project and Services
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item has-treeview<?php echo $project_report ?>">
									<a href="javascript:void(0)" class="nav-link <?php echo $project_report_href ?>">
										<i class="nav-icon fas fa-file-alt"></i>
										<p>
											Project Report
											<i class="fas fa-angle-left right"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="<?php echo site_url('project-report') ?>" class="nav-link <?php echo $project_report_add ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>Add Project Report</p>
											</a>
										</li>

										<li class="nav-item">
											<a href="<?php echo site_url('project-report-list') ?>" class="nav-link <?php echo $project_report_list ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>Project Report List</p>
											</a>
										</li>
									</ul>

								</li>

								<!-- BILLING INVOICE -->
								<li class="nav-item has-treeview">

									<a href="javascript:void(0)" class="nav-link<?php echo $ul_hr_tree ?>">
										<i class="nav-icon fas fa-file-invoice-dollar"></i>
										<p>
											Billing Invoice
											<i class="fas fa-angle-left right"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="<?php echo site_url('billing_invoice/billinginvoice') ?>" class="nav-link<?php echo $li_payroll ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>
													billing invoice
												</p>
											</a>
										</li>
									</ul>
								</li>

								<li class="nav-item has-treeview<?php echo $li_servicereport ?>">
									<a href="#" class="nav-link<?php echo $ul_servicereport ?>">
										<i class="nav-icon fas fa-screwdriver"></i>
										<p>
											Service Report
											<i class="fas fa-angle-left right"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">

										<li class="nav-item">
											<a href="<?php echo site_url('service-report') ?>" class="nav-link<?php echo $encode_sr ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>Encode SR</p>
											</a>
										</li>

										<li class="nav-item">
											<a href="<?php echo site_url('service-report-list') ?>" class="nav-link<?php echo $sr_listing ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>SR Listing</p>
											</a>
										</li>
									</ul>
								</li>

								<li class="nav-item">
									<a href="<?php echo site_url('schedules') ?>" class="nav-link<?php echo $schedules ?>">
										<i class="nav-icon fas fa-calendar"></i>
										<p>Schedules</p>
									</a>
								</li>

								<li class="nav-item has-treeview<?php echo $forms_menu_status ?>">
									<a href="#" class="nav-link<?php echo $ul_forms ?>">
										<i class="nav-icon fas fa-copy"></i>
										<p>
											Forms
											<i class="fas fa-angle-left right"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item has-treeview<?php echo $dispatch_menu_status; ?>">
											<a href="#" class="nav-link<?php echo $dispatch_forms ?>">
												<i class="nav-icon fas fa-reply"></i>
												<p>
													Dispatch
													<i class="fas fa-angle-left right"></i>
												</p>
											</a>
											<ul class="nav nav-treeview">
												<li class="nav-item">
													<a href="<?php echo site_url('dispatchform') ?>" class="nav-link<?php echo $Generate_dispatch ?>">
														<i class="far fa-circle nav-icon"></i>
														<p>Generate Dispatch Form</p>
													</a>
												</li>
												<li class="nav-item">
													<a href="<?php echo site_url('dispatchtable') ?>" class="nav-link<?php echo $dispatch_list ?>">
														<i class="far fa-circle nav-icon"></i>
														<p>Dispatch Form List</p>
													</a>
												</li>
											</ul>
										</li>

										<li class="nav-item has-treeview<?php echo $sales_menu_status; ?>">
											<a href="#" class="nav-link<?php echo $sales_dispatch ?>">
												<i class="nav-icon fas fa-road nav-icon"></i>
												<p>Sales Dispatch</p>
												<i class="fas fa-angle-left right"></i>
											</a>
											<ul class="nav nav-treeview">
												<li class="nav-item">
													<a href="<?php echo site_url('sales-dispatch') ?>" class="nav-link<?php echo $Generate_sales_dispatch ?>">
														<i class="far fa-circle nav-icon"></i>
														<p>Generate Sales Dispatch</p>
													</a>
												</li>
												<li class="nav-item">
													<a href="<?php echo site_url('salesdispatch-table') ?>" class="nav-link<?php echo $sales_dispatch_list ?>">
														<i class="far fa-circle nav-icon"></i>
														<p>Sales Dispatch List</p>
													</a>
												</li>
											</ul>
										</li>

										<li class="nav-item">
											<a href="<?php echo site_url('joborder') ?>" class="nav-link<?php echo $servicecall ?>">
												<i class="fas fa-list-ul nav-icon"></i>
												<p>Job Order</p>
											</a>
										</li>

									</ul>
								</li>
							</ul>
						</li>

						<!-- SALES GROUP -->
						<li class="nav-item has-treeview <?php echo $sales_tree_status ?>">

							<a href="javascript:void(0)" class="nav-link<?php echo $ul_sales_tree ?>">
								<i class="nav-icon fas fa-money-bill-wave"></i>
								<p>
									Sales
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item has-treeview">
									<a href="#" class="nav-link<?php echo $ul_reports ?>">
										<i class="nav-icon fas fa-chart-line"></i>
										<p>
											Reports
											<i class="fas fa-angle-left right"></i>
										</p>
									</a>
									<ul class="nav nav-treeview" style="display: none;">

										<li class="nav-item">
											<a href="#" class="nav-link<?php echo $daily_reports ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>Daily</p>
											</a>
										</li>

										<li class="nav-item">
											<a href="#" class="nav-link<?php echo $weekly_reports ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>Weekly</p>
											</a>
										</li>

										<li class="nav-item">
											<a href="#" class="nav-link<?php echo $monthly_reports ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>Monthly</p>
											</a>
										</li>

									</ul>
								</li>

								<li class="nav-item has-treeview<?php echo $sales_quotation_status ?>">
									<a href="javascript:void(0)" class="nav-link <?php echo $sales_quotation_href ?>">
										<i class="nav-icon fas fa-file-alt"></i>
										<p>
											Sales Quotation
											<i class="fas fa-angle-left right"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="<?php echo site_url('makequotation') ?>" class="nav-link <?php echo $make_quotation ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>Create Quotation</p>
											</a>
										</li>

										<li class="nav-item">
											<a href="<?php echo site_url('sales_quotation_list') ?>" class="nav-link <?php echo $sales_quotation_list ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>Quotation List</p>
											</a>
										</li>
									</ul>

								</li>

								<li class="nav-item has-treeview">
									<a href="#" class="nav-link<?php echo $ul_formslisting ?>">
										<i class="nav-icon fas fa-list-alt"></i>
										<p>
											Forms Listing
											<i class="fas fa-angle-left right"></i>
										</p>
									</a>
									<ul class="nav nav-treeview" style="display: none;">

										<li class="nav-item">
											<a href="#" class="nav-link<?php echo $list_quote ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>List of Quotations</p>
											</a>
										</li>

										<li class="nav-item">
											<a href="#" class="nav-link<?php echo $list_drform ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>List of DR Forms</p>
											</a>
										</li>

										<li class="nav-item">
											<a href="#" class="nav-link<?php echo $list_warrantyform ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>List of Warranty Forms</p>
											</a>
										</li>

									</ul>
								</li>

								<li class="nav-item has-treeview<?php echo $inquiry_status ?>">
									<a href="javascript:void(0)" class="nav-link <?php echo $inquiry_href ?>">
										<i class="nav-icon fas fa-info-circle"></i>
										<p>
											Sales Inquiry
											<i class="fas fa-angle-left right"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="<?php echo site_url('inquiry-tempo-clients') ?>/list" class="nav-link <?php echo $inquiry_new ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>New Client</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo site_url('inquiry-existing-clients') ?>/list" class="nav-link <?php echo $inquiry_existing ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>Existing Client</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo site_url('inquiry-archive-projects') ?>" class="nav-link <?php echo $inquiry_archive ?>">
												<i class="far fa-circle nav-icon"></i>
												<p>Archive Projects</p>
											</a>
										</li>


									</ul>

								</li>


							</ul>

						</li>


						<!-- HUMAN RESOURCE GROUP -->
						<li class="nav-item has-treeview">

							<a href="javascript:void(0)" class="nav-link<?php echo $ul_hr_tree ?>">
								<i class="nav-icon fas fa-users"></i>
								<p>
									Human Resource
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?php echo site_url('payroll') ?>" class="nav-link<?php echo $li_payroll ?>">
										<i class="nav-icon fas fa-credit-card"></i>
										<p>
											Payroll
										</p>
									</a>
								</li>
							</ul>
						</li>
					</ul>

				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>