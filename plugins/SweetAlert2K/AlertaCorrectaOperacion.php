<script type="text/javascript" src="plugins/SweetAlert2K/sweetalert2.js"></script>
<style type="text/css">
  .AlertaSweet
  {
    width: 100%!important;
    top: 50px!important;
  }
  .AlertaSweetFondo
  {
    background: rgb(51,177,53)!important;
    background: linear-gradient(165deg, rgba(51,177,53,1) 0%, rgba(77,233,41,1) 35%, rgba(236,240,245,1) 100%)!important;
  }
  .AlertaSweetTexto
  {
    font-size: 25px!important;
    margin-top: -3px!important;
    margin: 0!important;
    color: aliceblue;
  }

  .AlertaSweetFondo > a{
    display:none;
  }
</style>

<script type="text/javascript">  const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 13000,
  timerProgressBar: true,
  customClass: {
    container:"AlertaSweet",
    popup:"AlertaSweetFondo",
    title:"AlertaSweetTexto"
  },
  didOpen: (toast) => {
    toast.addEventListener("mouseenter", Swal.stopTimer)
    toast.addEventListener("mouseleave", Swal.resumeTimer)
  }
})

Toast.fire({
  icon: "success",
  title: "<?php echo $_GET["msg"];?>"
})</script>