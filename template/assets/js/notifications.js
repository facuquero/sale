//------------------------------------------
//   General Notifications
//--------------------------------------------
function success(x, toastValue = true) {
  if(x){
    Swal.fire({
      position: 'top',
      icon: 'success',
      title: x,
      showConfirmButton: false,
      toast: toastValue,
      timer: 4500
    })
  }else{
    Swal.fire({
      position: toastValue ? 'top-end' : 'center',
      icon: 'success',
      title: ':)',
      showConfirmButton: false,
      toast: toastValue,
      timer: 4500
    })
  }
}

function error(errortype) {
  Swal.fire({
    icon: "error",
    title: ":/",
    text: errortype,
    timer: 4500
  });
}

function warning(warningMessage) {
  Swal.fire({
    icon: "warning",
    title: "",
    text: warningMessage,
    timer: 4500
  });
}