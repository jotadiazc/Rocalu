<html>

<style type="text/css">
    @media print
    {
        #not-print {display:none;}
    }
</style>


<body>

<div id = 'print'>
  <?php
  include("imprimirOrden.php?id=3");
?>
</div>

<button onclick = "printdiv()">Print Div </button>

<script>
    function printdiv() {
        var mywindow = window.open("", '_blank');
        mywindow.document.write('<p>' + document.getElementById('print').innerHTML + '</p>');
        mywindow.print();
    }

</script>

</body>

<html/>
