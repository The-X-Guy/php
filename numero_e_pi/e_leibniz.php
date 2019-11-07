
<?php
if ($_POST['e_leibniz']) {
        $n = 1;
        while ($n < 10000) {
            $e = (1 + 1/$n)**$n;
            $n++;
        }
        echo "<script>alert('El valor aproximado de e es $e')</script>";
    }
?>