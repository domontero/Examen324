</div>

<script>
    function mostrarCuenta(cuenta) {
        var cuentas = document.getElementsByClassName("cuenta");
        for (var i = 0; i < cuentas.length; i++) {
            cuentas[i].style.display = "none";
        }

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(cuenta + "_content").innerHTML = this.responseText;
                document.getElementById(cuenta).style.display = "block";
            }
        };
        xhttp.open("GET", cuenta + ".php", true);
        xhttp.send();
    }
</script>
</body>
</html>
