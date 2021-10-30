<?php
defined('BASEPATH') or die('Access Denied');
?>

<!-- Computation Script -->
<script>
    $(document).ready(function() {

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
            var sundaysCount = Number($('#sundays').val());

            //special compute
            var sundays = dailyRate * sundaysCount;

            //earnings
            var basicIncome = dailyRate * daysWorked - sundays;
            var wdoPay = dailyRate * wdoDays * 1.3;
            var otPay = (dailyRate / 8) * otHours * 1.25;
            var ndiffPay = (dailyRate / 8) * ndiffHours * 0.1;
            var spHolidayPay = dailyRate * spHolidays * 0.3;
            var regHolidayPay = dailyRate * regHolidays;
            var incentives = Number($('#incentives').val());
            var commission = Number($('#commission').val());
            var addBack = Number($('#addback').val());
            var thirteenthMonthPay = Number($('#13th_month').val());
            var vac_pay = Number($('#vacation_leave').val() * dailyRate);
            var sick_pay = Number($('#sick_leave').val() * dailyRate);

            //deductions
            var absents = daysAbsent * dailyRate;
            var tardiness = lateHours * (dailyRate / 8);
            var sssRate = Number($('#sss_rate').val());
            var taxRate = Number($('#tax_rate').val());
            var pagIbigRate = Number($('#pagibig_rate').val());
            var philHealthRate = Number($('#philhealth_rate').val());
            var restDays = rdDays * dailyRate;
            var rent = Number($('#tax_rate').val());
            var awols = awol * dailyRate;
            var otherDeduct = Number($('#others').val());
            var cashAdv = Number($('#cash_adv').val());


            var grossPay = (basicIncome + wdoPay + ndiffPay + spHolidayPay + regHolidayPay + otPay + vac_pay + sick_pay) - (absents + tardiness + awols + restDays);
            var netPay = (grossPay + thirteenthMonthPay + commission + addBack + incentives) - (otherDeduct + cashAdv + sssRate + taxRate + pagIbigRate + philHealthRate);

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
            $('.vac_pay').html(vac_pay.toFixed(2));
            $('.sick_pay').html(sick_pay.toFixed(2));

            $('.gross_pay').html(grossPay.toFixed(2));
            $('.net_pay').html(netPay.toFixed(2));

        }

        //Sunday Computation
        function getSundays(start_date, end_date) {
            var total_sundays = 0;

            for (var i = start_date; i <= end_date; i.setDate(i.getDate() + 1)) {
                if (i.getDay() == 0) total_sundays++;
            }
            return total_sundays;
        }

        <?php if ($this->uri->segment(1) == 'payslip-update') { ?>
            window.onload = function() {
                payrollCompute();
            }
        <?php } ?>

        //KeyUp Function
        $('input').keyup(function() {

            payrollCompute();

        });

        $('.select-employee').on("change", function() {

            if ($(this).val() != "") {

                $('.loading-modal').modal();
                //ajax

                $.ajax({

                    url: '<?php echo site_url('PayrollController/getTechInfo') . '/' ?>' + $(this).val(),
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {
                        $('.loading-modal').modal('hide');
                        $('#daily_rate').val(response.daily_rate);
                        $('#philhealth_rate').val(response.philhealth);
                        $('#sss_rate').val(response.sss);
                        $('#tax_rate').val(response.tax_rate);
                        $('#pagibig_rate').val(response.pagibig);
                        

                        var date1 = new Date($('#start_date').val());
                        var date2 = new Date($('#end_date').val());

                        //computing Filed Vacation Leave
                        var vl_start_date = new Date(response.vacation_leave_start_date);
                        var vl_end_date = new Date(response.vacation_leave_end_date);
                        var vl_total_sundays = 0;
                        var sl_total_sundays = 0;
                        var loa_total_sundays = 0;
                            

                        if(date1 <= vl_start_date && vl_start_date <= date2 && vl_end_date >= date2){
                            var vl_difference_time = date2.getTime() - vl_start_date.getTime(); 
                            
                            for (var i = vl_start_date; i <= date2; i.setDate(i.getDate() + 1)) {
                                if (i.getDay() == 0) vl_total_sundays++;
                            }
                        }

                        else if(vl_start_date <= date1 && vl_end_date >= date1 && vl_end_date <= date2){
                            var vl_difference_time = vl_end_date.getTime() - date1.getTime(); 

                            for (var i = date1; i <= vl_end_date; i.setDate(i.getDate() + 1)) {
                                if (i.getDay() == 0) vl_total_sundays++;
                            }
                        }

                        else if(vl_start_date >= date1 && vl_end_date <= date2){
                            var vl_difference_time = vl_end_date.getTime() - vl_start_date.getTime();

                            for (var i = vl_start_date; i <= vl_end_date; i.setDate(i.getDate() + 1)) {
                                if (i.getDay() == 0) vl_total_sundays++;
                            }
                        }

                        else if(vl_start_date < date1 && vl_end_date > date2){
                            var vl_difference_time = date2.getTime() - date1.getTime();

                            for (var i = date1; i <= date2; i.setDate(i.getDate() + 1)) {
                                if (i.getDay() == 0) vl_total_sundays++;
                            }
                        }
                        
                        else{
                            vl_difference_days = "";
                        }




                        //computing Filed Sick Leave
                        var sl_start_date = new Date(response.sick_leave_start_date);
                        var sl_end_date = new Date(response.sick_leave_end_date);
                        var date1 = new Date($('#start_date').val());
                        var date2 = new Date($('#end_date').val());

                        if(date1 <= sl_start_date && sl_start_date <= date2 && sl_end_date >= date2){
                            var sl_difference_time = date2.getTime() - sl_start_date.getTime();

                            for (var i = sl_start_date; i <= date2; i.setDate(i.getDate() + 1)) {
                                if (i.getDay() == 0) sl_total_sundays++;
                            }
                        }

                        else if(sl_start_date <= date1 && sl_end_date >= date1 && sl_end_date <= date2){
                            var sl_difference_time = sl_end_date.getTime() - date1.getTime();

                            for (var i = date1; i <= sl_end_date; i.setDate(i.getDate() + 1)) {
                                if (i.getDay() == 0) sl_total_sundays++;
                            }
                        }

                        else if(sl_start_date >= date1 && sl_end_date <= date2){
                            var sl_difference_time = sl_end_date.getTime() - sl_start_date.getTime();

                            for (var i = sl_start_date; i <= sl_end_date; i.setDate(i.getDate() + 1)) {
                                if (i.getDay() == 0) sl_total_sundays++;
                            }
                        }
                        
                        else if(sl_start_date < date1 && sl_end_date > date2){
                            var sl_difference_time = date2.getTime() - date1.getTime();

                            for (var i = date1; i <= date2; i.setDate(i.getDate() + 1)) {
                                if (i.getDay() == 0) sl_total_sundays++;
                            }
                        }
                        
                        else{
                            sl_difference_days = "";
                        }


                        //Computing Filed Leave of Absence

                        var loa_start_date = new Date(response.leave_of_absence_start_date);
                        var loa_end_date = new Date(response.leave_of_absence_end_date);
                        var date1 = new Date($('#start_date').val());
                        var date2 = new Date($('#end_date').val());

                        if(date1 <= loa_start_date && loa_start_date <= date2 && loa_end_date >= date2){
                            var loa_difference_time = date2.getTime() - loa_start_date.getTime(); 
                            
                            for (var i = loa_start_date; i <= date2; i.setDate(i.getDate() + 1)) {
                                if (i.getDay() == 0) loa_total_sundays++;
                            }
                        }

                        else if(loa_start_date <= date1 && loa_end_date >= date1 && loa_end_date <= date2){
                            var loa_difference_time = loa_end_date.getTime() - date1.getTime(); 

                            for (var i = date1; i <= loa_end_date; i.setDate(i.getDate() + 1)) {
                                if (i.getDay() == 0) loa_total_sundays++;
                            }
                        }

                        else if(loa_start_date >= date1 && loa_end_date <= date2){
                            var loa_difference_time = loa_end_date.getTime() - loa_start_date.getTime();

                            for (var i = loa_start_date; i <= loa_end_date; i.setDate(i.getDate() + 1)) {
                                if (i.getDay() == 0) loa_total_sundays++;
                            }
                        }

                        else if(loa_start_date < date1 && loa_end_date > date2){
                            var loa_difference_time = date2.getTime() - date1.getTime();

                            for (var i = date1; i <= date2; i.setDate(i.getDate() + 1)) {
                                if (i.getDay() == 0) loa_total_sundays++;
                            }
                        }
                        
                        else{
                            loa_difference_days = "";
                        }


                        

                        if(vl_difference_days !=""){
                            var vl_difference_days = vl_difference_time / (1000 * 3600 * 24);
                            vl_difference_days = vl_difference_days + 1;
                            vl_difference_days = vl_difference_days - vl_total_sundays;
                        }

                        if(sl_difference_days !=""){
                            var sl_difference_days = sl_difference_time / (1000 * 3600 * 24);
                            sl_difference_days = sl_difference_days + 1;  
                            sl_difference_days = sl_difference_days - sl_total_sundays;
                        }

                        if(loa_difference_days !=""){
                            var loa_difference_days = loa_difference_time / (1000 * 3600 * 24);
                            loa_difference_days = loa_difference_days + 1;
                            loa_difference_days = loa_difference_days - loa_total_sundays;
                        }
                        

                        $('#vacation_leave').val(vl_difference_days);
                        $('#sick_leave').val(sl_difference_days);
                        $('#rest_day').val(loa_difference_days);    
                        payrollCompute();
                    }
                });
            }

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

            $(':submit').attr('disabled', 'disabled');
            $('.loading-modal').modal();

            //ajax
            $.ajax({
                url: me.attr('action'),
                type: 'post',
                data: me.serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success == true) {
                        $(':submit').removeAttr('disabled', 'disabled');
                        $('.loading-modal').modal('hide');

                        toastr.success("Success! Payroll Generated. View now at Payroll Table");

                        var start_date = $('#start_date').val();
                        var end_date = $('#end_date').val();
                        var sundays = $('#sundays').val();
                        var days_worked = $('#days_worked').val();
                        me[0].reset();

                        $('#start_date').val(start_date);
                        $('#end_date').val(end_date);
                        $('#sundays').val(sundays);
                        $('#days_worked').val(days_worked);
                    } else {
                        $(':submit').removeAttr('disabled', 'disabled');
                        $('.loading-modal').modal('hide');

                        toastr.error(response.errors);

                    }
                }
            });
        });

        //cut-off selection
        $('#form-cutoffselect').submit(function(e) {
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

            $(':submit').attr('disabled', 'disabled');
            $('.loading-modal').modal();

            //ajax
            $.ajax({
                url: me.attr('action'),
                type: 'post',
                data: me.serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success == true) {

                        var date1 = new Date($('#cutoff_start_modal').val());
                        var date2 = new Date($('#cutoff_end_modal').val());

                        var difference_time = date2.getTime() - date1.getTime();
                        var difference_days = difference_time / (1000 * 3600 * 24);

                        $('#days_worked').val(difference_days + 1);
                        $('#start_date').val($('#cutoff_start_modal').val());
                        $('#end_date').val($('#cutoff_end_modal').val());

                        $(':submit').removeAttr('disabled', 'disabled');
                        $('.loading-modal').modal('hide');
                        $('#cutoffselect_modal').modal('hide');
                        toastr.success("Success! Proceed please proceed.");

                        sundayCnt = getSundays(date1, date2);
                        $('#sundays').val(sundayCnt);
                        me[0].reset();
                    } else {
                        $(':submit').removeAttr('disabled', 'disabled');
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
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            $(':submit').attr('disabled', 'disabled');
            $('.loading-modal').modal();

            //ajax
            $.ajax({
                url: me.attr('action'),
                type: 'post',
                data: me.serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success == true) {
                        $(':submit').removeAttr('disabled', 'disabled');
                        $('.loading-modal').modal('hide');

                        toastr.success("Success! Payroll Updated. View now at Payroll Table. You will be redirected to payroll table in 3 seconds.");

                        window.setTimeout(function() {
                            window.location = '<?php echo site_url('payroll-table') ?>';
                        }, 3000);
                        //me[0].reset();
                    } else {
                        $(':submit').removeAttr('disabled', 'disabled');
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
            "order": [],
            "ajax": {
                url: "<?php echo site_url('PayrollController/getPayrollData') ?>",
                type: "POST"
            },
            "columnDefs": [{
                "targets": [8],
                "orderable": false,
            }]
        });
        //end of datatable

        var payroll_filter = $('#payroll_filter').DataTable({
            responsive: true
        });

    });
</script>

<?php if ($this->uri->segment(1) == 'payroll') { ?>
    <script>
        $("#cutoffselect_modal").modal({
            backdrop: 'static',
            keyboard: false
        });
    </script>
<?php } ?>
</body>

</html>