<footer>
    <div class="row">
        <div class="wrap m-auto">
            <p class="t-center">Copyright © <?php echo date("Y"); ?></p>
        </div>
    </div>
   
</footer>
<script src="./js/jquery-3.6.0.min.js"></script>
<script src="./js/custom.js"></script>
<script src="./js/ajax.js"></script>

<?php 
    require_once('./config/connection.php');
    $conn->close(); 
?>
</body>
</html>
