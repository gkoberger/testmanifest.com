
    <script>
    window.onload = function() {
        document.getElementById('install').onclick = function() {
            navigator.mozApps.install('<?= $manifest ?>');
            return false;
        };
    };
    </script>
  </body>
</html>
