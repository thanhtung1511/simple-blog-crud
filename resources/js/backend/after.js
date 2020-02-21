// Loaded after CoreUI app.js
import moment from 'moment'

let dateRangePickers = $('input#post_date_filter');

if (dateRangePickers.length) {
    dateRangePickers.daterangepicker({
        opens: 'left',
        locale: {
            cancelLabel: 'Clear'
        }
    }, function (start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    }).on('apply.daterangepicker', function (ev, picker) {
        let startDateInput = $(this).siblings('input[type=hidden].picker-start-date');
        let endDateInput = $(this).siblings('input[type=hidden].picker-end-date');
        startDateInput.val(picker.startDate.format('YYYY-MM-DD'))
        endDateInput.val(picker.endDate.format('YYYY-MM-DD'))
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    }).on('cancel.daterangepicker', function (ev, picker) {
        $(this).val('');
    });
    if (start_date !== undefined && start_date !== '') {
        $('input#post_date_filter').data('daterangepicker').setStartDate(moment(start_date, 'YYYY-MM-DD'));
    }
    if (end_date !== undefined && end_date !== '') {
        $('input#post_date_filter').data('daterangepicker').setEndDate(moment(end_date, 'YYYY-MM-DD'));
    }
}
