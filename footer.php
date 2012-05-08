
    <script>
    window.onload = function() {
        document.getElementById('install').onclick = function() {
            navigator.mozApps.install('http://<?= $subdomain ?>.testmanifest.com/manifest.webapp');
            return false;
        };
    };
    </script>
  </body>
</html>
