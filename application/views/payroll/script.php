<?php 
defined('BASEPATH') or die('Access Denied');
?>

    <!-- Computation Script -->
    <script>
        $(document).ready(function () {

            function payrollCompute() {
                var dailyRate = Number($('#daily_rate').val());
                var daysWorked = Number($('#days_worked').val());
                var otHours = Number($('#ot_hrs').val());
                var lateHours = Number($('#hours_late').val());
                var ndiffHours = Number($('#night_diff_hrs').val());
                var daysAbsent = Number($('#days_absent').val());
                var wdoDays = Number($('#wdo').val());
                var regHolidays = Number($('#reg_holiday').val());
                var spHolidays = Number($('#special_holiday').val());
                var vlcount = Number($('#vacation_leave').val());
                var slcount = Number($('#sick_leave').val());
                var rdDays = Number($('#rest_day').val());
                var awol = Number($('#awol').val());

                //earnings
                var basicIncome = dailyRate*daysWorked;
                var wdoPay = dailyRate*wdoDays*1.3;
                var otPay = (dailyRate/8)*otHours*1.25;
                var ndiffPay = (dailyRate/8)*ndiffHours*0.1;
                var spHolidayPay = dailyRate*spHolidays*0.3;
                var regHolidayPay = dailyRate*regHolidays;
                var incentives = Number($('#incentives').val());
                var commission = Number($('#commission').val());
                var addBack = Number($('#addback').val());
                var thirteenthMonthPay = Number($('#13th_month').val());

                //deductions
                var absents = daysAbsent * dailyRate;
                var tardiness = lateHours * (dailyRate/8);
                var sssRate = Number($('#sss_rate').val());
                var taxRate = Number($('#tax_rate').val());
                var pagIbigRate = Number($('#pagibig_rate').val());
                var philHealthRate = Number($('#philhealth_rate').val());
                var restDays = rdDays*dailyRate;
                var rent = Number($('#tax_rate').val());
                var awols = awol*dailyRate;
                var otherDeduct = Number($('#others').val());
                var cashAdv = Number($('#cash_adv').val());

                var grossPay = (basicIncome+wdoPay+ndiffPay+spHolidayPay+regHolidayPay+otPay) - (absents+tardiness+awols+restDays);
                var netPay = (grossPay+thirteenthMonthPay+commission+addBack+incentives) - (otherDeduct+cashAdv+sssRate+taxRate+pagIbigRate+philHealthRate);

                $('.basicIncome').html(basicIncome.toFixed(2));
                $('.wdo_pay').html(wdoPay.toFixed(2));
                $('.tardiness').html(tardiness.toFixed(2));
                $('.ndpay').html(ndiffPay.toFixed(2));
                $('.cash_adv').html(cashAdv.toFixed(2));
                $('.absents').html(absents.toFixed(2));

                $('.spholidaypay').html(spHolidayPay.toFixed(2));
                $('.other_deduct').html(otherDeduct.toFixed(2));
                $('.regHolidayPay').html(regHolidayPay.toFixed(2));
                $('.sss').html(sssRate.toFixed(2));
                $('.ot_pay').html(otPay.toFixed(2));

                $('.pagibig').html(pagIbigRate.toFixed(2));
                $('.incentives').html(incentives.toFixed(2));
                $('.philhealth').html(philHealthRate.toFixed(2));
                $('.commission').html(commission.toFixed(2));
                $('.tax').html(taxRate.toFixed(2));

                $('.13thmonth').html(thirteenthMonthPay.toFixed(2));
                $('.awol').html(awols.toFixed(2));
                $('.addback').html(addBack.toFixed(2));
                $('.rest_days').html(restDays.toFixed(2));

                $('.gross_pay').html(grossPay.toFixed(2));
                $('.net_pay').html(netPay.toFixed(2));
            }

            <?php if ($this->uri->segment(1)=='payslip-update') { ?>
                window.onload = function() {
                    payrollCompute();
                }
            <?php } ?>
            //KeyUp Function
            $('input').keyup(function(){

                payrollCompute();

            });

            $('.select-employee').on("change",function(){
                
                $('.loading-modal').modal();
                //ajax
                $.ajax({

                    url: '<?php echo site_url('PayrollController/getTechInfo').'/' ?>' + $(this).val(),
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {
                        $('.loading-modal').modal('hide');
                        $('#daily_rate').val(response.daily_rate);
                        $('#philhealth_rate').val(response.philhealth);
                        $('#sss_rate').val(response.sss);
                        $('#tax_rate').val(response.tax_rate);
                        $('#pagibig_rate').val(response.pagibig);
                        payrollCompute();
                    }
                });
            });

            //payroll add
	        $('#form-payroll').submit(function(e) {
                e.preventDefault();

                var me = $(this);

                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }

                $(':submit').attr('disabled','disabled');
                $('.loading-modal').modal();

                //ajax
                $.ajax({
                    url: me.attr('action'),
                    type: 'post',
                    data: me.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            $(':submit').removeAttr('disabled','disabled');
                            $('.loading-modal').modal('hide');

                            toastr.success("Success! Payroll Generated. View now at Payroll Table");
                            me[0].reset();
                        } else {
                            $(':submit').removeAttr('disabled','disabled');
                            $('.loading-modal').modal('hide');

                            toastr.error(response.errors);
                        }

                    }
                });
            });

            $('#form-payroll-update').submit(function(e) {
                e.preventDefault();

                var me = $(this);

                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }

                $(':submit').attr('disabled','disabled');
                $('.loading-modal').modal();

                //ajax
                $.ajax({
                    url: me.attr('action'),
                    type: 'post',
                    data: me.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            $(':submit').removeAttr('disabled','disabled');
                            $('.loading-modal').modal('hide');

                            toastr.success("Success! Payroll Updated. View now at Payroll Table");
                            me[0].reset();
                        } else {
                            $(':submit').removeAttr('disabled','disabled');
                            $('.loading-modal').modal('hide');

                            toastr.error(response.errors);
                        }

                    }
                });
            });

            //Datatable for Payroll Table
		    var payroll_table = $("#payroll_table").DataTable({
		    	responsive: true,
		    	"processing": true,
		    	"serverSide": true,
	            "order":[],
	            "ajax":{
	                url: "<?php echo site_url('PayrollController/getPayrollData') ?>",
	                type: "POST"
	            },
	            "columnDefs": [
	                {
	                   "targets": [8],
	                    "orderable": false, 
	                }
	            ]
		    });
            //end of datatable
            
        });
        

    </script>
</body>
</html>