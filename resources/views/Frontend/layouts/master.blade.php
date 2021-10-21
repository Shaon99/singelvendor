@include('Frontend.layouts.header')

@yield('content')

@include('Frontend.layouts.footer')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js'></script>
<style>
     .toast-message {
   font-size:16px;
   color:rgb(248, 248, 248);
   font-weight: 400px;
     }
</style>

<script type="text/javascript">
    $(".alert:not(.not_hide)").delay(5000).slideUp(500, function () {
        $(this).alert('close');
    });
</script>

<script>
  (function (window, document) {
      var loader = function () {
          var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
          script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
          tag.parentNode.insertBefore(script, tag);
      };

      window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
  })(window, document);
</script>