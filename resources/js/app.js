import '../../node_modules/bootstrap/dist/js/bootstrap.bundle';

import Swal  from "sweetalert2"
window.Swal = Swal;
let showToast = function (title){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'success',
        title
      })
}
window.showToast = showToast;

let closeBtn = document.getElementById('closeBtn');
const adsImage = document.getElementById('adsImage');

closeBtn.addEventListener('click', function (){
    adsImage.classList.add('d-none');
})






