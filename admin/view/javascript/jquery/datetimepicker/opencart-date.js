
// Date
    var oc_datetimepicker = function () {
        $(this).persianDatepicker({
            initialValue: false,
            observer: true,
            format: 'YYYY-MM-DD'
        }, function (start, end) {
            $(this.element).val(start.format('YYYY-MM-DD'));
        });
    }

    $(document).on('focus', '.date', oc_datetimepicker);

    // Time
    var oc_datetimepicker = function () {
        $(this).persianDatepicker({
            onlyTimePicker: true,
            timePicker: {
                meridian: {
                    enabled: true
                },
                second: {
                    enabled: false
                }
            },
            format: 'HH:mm'
        }, function (start, end) {
            $(this.element).val(start.format('HH:mm'));
        }).on('show.persianDatepicker', function (ev, picker) {
            picker.container.find('.calendar-table').hide();
        });
    }

    $(document).on('focus', '.time', oc_datetimepicker);

    // Date Time
    var oc_datetimepicker = function () {
        $('.datetime').persianDatepicker({
            initialValue: false,
            observer: true,
            format: 'YYYY-MM-DD HH:mm',
            timePicker: {
                enabled: true
            }
        }, function (start, end) {
            $(this.element).val(start.format('YYYY-MM-DD HH:mm'));
        });
    }

    $(document).on('focus', '.datetime', oc_datetimepicker);
