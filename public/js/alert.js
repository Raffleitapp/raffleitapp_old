function showSuccessMsg(msg){
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

function showErrorMsg(msg){
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
