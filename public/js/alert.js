function showSuccessMsg(msg) {
    Swal.fire({
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        },
        icon: 'success',
        text: msg,
        showConfirmButton: false,
        timer: 1500
    });
}

function showErrorMsg(msg) {
    Swal.fire({
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        },
        icon: 'error',
        text: msg,
        showConfirmButton: false,
        timer: 1500
    });
}


function showSuccess(msg) {
    toastr.options = {
        progressBar: true,
        // hideDuration: 2000,
        timeOut: 2000,
        preventDuplicates: true,
    }

    toastr.success(msg);
}


function showError(msg) {
    toastr.options = {
        progressBar: true,
        timeOut: 2000,
        preventDuplicates: true,
    }

    toastr.error(msg);
}
