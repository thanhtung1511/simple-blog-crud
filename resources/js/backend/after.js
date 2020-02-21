// Loaded after CoreUI app.js

let dateRangePickers = $('input.date-range-picker');

if (dateRangePickers.length) {
    dateRangePickers.daterangepicker({
        opens: 'left',
        // autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    }, function (start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    }).on('apply.daterangepicker', function (ev, picker) {
        let startDateInput = $(this).siblings('input[type=hidden].picker-start-date');
        let endDateInput = $(this).siblings('input[type=hidden].picker-end-date');
        console.log(startDateInput);
        console.log(endDateInput);
        startDateInput.val(picker.startDate.format('YYYY-MM-DD'))
        endDateInput.val(picker.endDate.format('YYYY-MM-DD'))
    });
}
