<html
<head>
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>-->
<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/>-->
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>-->
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  
</head>
<body>
   <!--<button type="button" id="successtoast" class="btn btn-primary btn-icon-text"> <i class="fa fa-check btn-icon-prepend"></i>Top Right Toast </button>-->
      <?php
   echo "<script>swal({
  title: 'Success!',
  text: 'Redirecting in 2 seconds.',
  type: 'success',
  timer: 2000,
  showConfirmButton: false
}, function(){
      window.location.href = 'google.com';
}) </script>";
      ?>
<script>
 
//     $(document).ready(function() {
   
// //success toast
//     // $('#successtoast').click(function() {
        
//     toastr.options = {
//   "closeButton": true,
//   "debug": true,
//   "newestOnTop": false,
//   "progressBar": true,
//   "positionClass": "toast-top-right",
//   "preventDuplicates": false,
//   "showDuration": "300",
//   "hideDuration": "1000000",
//   "timeOut": "5000",
//   "extendedTimeOut": "1000",
//   "showEasing": "swing",
//   "hideEasing": "linear",
//   "showMethod": "fadeIn",
//   "hideMethod": "fadeOut"
// }
//       toastr["success"]("Thanks for your support", "Hello BBBootstrap");
//     });
    
//   });
</script>
</body>
</html>