    <div id="footer" class="mt-3">
            <?php 
                echo "<br/><small>EG 2022</small>"
            ?>

        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
    <!-- jQuery version 3.6.0 -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <!-- jQuery DatePicker -->
    <script>
        $( function() {
            $( "#dob" ).datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "-120:-18",
                dateFormat: "yy-mm-dd"
            });
        } );
    </script>
    </body>
</html>