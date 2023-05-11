$(function () {

    function sweetalert(message, icon, position = 'top-end') {
        //icon == warning, error, success, info, and question
        //position = 'top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', or 'bottom-end'.
        const Toast = Swal.mixin({
            toast: true,
            position: position,
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: icon,
            title: message
        })
    }

    //integer value validate 
    function inputNumberControl(inputId, lenNumber, InputIdShowNumber, message, position) {
        let phoneNumber = $(inputId);
        let intNumber = parseInt(phoneNumber.val());
        //show counter of LenNumber
        let ans = lenNumber - phoneNumber.val().length;
        if (ans >= 0) {
            $(InputIdShowNumber).text(ans);
        }

        //  phoneNumber.removeClass('animate__animated ' + nameAnimationInput);

        //if input is character = null =>empty
        if (Number.isNaN(intNumber)) {
            phoneNumber.val("");
            sweetalert(message, 'error', position);

            //if number is interger = interger
        } else if (Number.isInteger(intNumber)) {
            phoneNumber.val(intNumber);
        }
        //not alow input > phoneNumber
        if (phoneNumber.val().length > lenNumber) {
            let lenPhone = phoneNumber.val().substr(0, lenNumber);
            phoneNumber.val(lenPhone);

        }
    }
    function isTrueNumberPhone(inputId, numberControler, message, position) {
        inputId = $(inputId);

        let ans = inputId.val().substr(0, numberControler.length);
        if (ans != numberControler) {
            sweetalert(message, 'warning', position);
            inputId.val(numberControler);
        }
    }

    //validate input number 
    function isTrueNumberPhone(inputId, numberControler, message, position) {
        inputId = $(inputId);

        let ans = inputId.val().substr(0, numberControler.length);
        if (ans != numberControler) {
            sweetalert(message, 'warning', position);
            inputId.val(numberControler);
        }
    }

    $('#phoneNumber').keyup(function (e) {
        e.preventDefault();
        inputNumberControl('#phoneNumber', 10, '#dfdf', 'Error in data entry');
        isTrueNumberPhone('#phoneNumber', '9', 'Error in data entry ');

        return false;
    });



    // submit the form
    $('form#ff').submit(function (e) { //cra
        e.preventDefault();
        let name = $('#name').val();
        let family = $('#family').val();
        let phoneNumber = $('#phoneNumber').val();
        if (name.length < 2 || family.length < 2 || phoneNumber.length != 10) {
            sweetalert('Error in data entry', 'error');
            return false;
        }
        $.ajax({
            type: "post",
            url: "/bb/controller/InsertUser.php",
            data: {
                'name': name,
                'family': family,
                'phoneNumber': phoneNumber
            },
            dataType: "json",
            success: function (response) {
                if (response == '1') {
                    sweetalert('successfull', 'success');
                    $('form#ff')[0].reset();
                }
            }
        });
        return false;
    });
    $('#refresh').click(function (e) {
        // e.preventDefault();
        $.ajax({
            type: "post",
            url: "/bb/controller/getDataUsers.php",
        });
        $('#dg').datagrid('reload', {
            url: 'datagrid_data.json',
            columns: [[
                { field: 'Name', title: 'Name' },
                { field: 'Family', title: 'Family' },
                { field: 'PhoneNumber', title: 'PhoneNumber' }
            ]]
        });

    });
    $('#dg').datagrid('load', {
        url: 'datagrid_data.json',
        columns: [[
            { field: 'Name', title: 'Name' },
            { field: 'Family', title: 'Family' },
            { field: 'PhoneNumber', title: 'PhoneNumber' }
        ]]
    });
})
