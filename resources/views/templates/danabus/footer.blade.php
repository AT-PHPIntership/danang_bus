<footer>
      <div class="footer">
        <p>{!! trans('footer.bus') !!}</p>
    </footer>
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
    <script src="{{ asset('templates/danabus/js/jquery.js')}}"></script>
    <!-- <script type="text/javascript" src="js/jquery.mixitup.js"></script> -->
    <script type="text/javascript" src="{{ asset('templates/danabus/js/bootstrap.js')}}"></script>
    
    <!-- Load google maps api and call initializeMap function defined in app.js -->
    <script async="" defer="" type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initializeMap"></script>
   
    <script type="text/javascript" src="{{ asset('templates/danabus/js/app.js')}}"></script>
  </body>
</html>