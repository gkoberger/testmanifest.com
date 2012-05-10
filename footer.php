    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
    <script>
    $(function() {
        $('#install').click(function(e) {
            e.preventDefault();
            navigator.mozApps.install('http://<?= $subdomain ?>.testmanifest.com/manifest.webapp');
        });
        $('#thingy')[0].focus();
        $('#thingy')[0].select();

        $('#browserid').click(function(e) {
            e.preventDefault();
            navigator.id.get(gotAssertion);
            return false;
        });
    });

    function loggedIn(res) {
        $('#locking').hide();
        $('#locking').html(res);
        $('#locking').fadeIn();
        updateLoggedin();
    }

    function loggedOut(res) {
        alert('logged out!');
    }

    $('#locking').delegate('.lock-input', 'click', function(e) {
        e.preventDefault();

        var $this = $(this),
            action = $this.attr('data-action');

        $.post('/lock', {'action': action}, function(d) {
            $('#locking').html(d);
            updateLoggedin();
        });
    });

    function updateLoggedin() {
        if($('#locking').find('.lock-input').length) {
            $('.is_locked').removeClass('is_locked').addClass('is_unlocked');
        }
    }

    function gotAssertion(assertion) {
      // got an assertion, now send it up to the server for verification
      if (assertion !== null) {
        $.ajax({
          type: 'POST',
          url: '/login',
          data: { assertion: assertion },
          success: function(res, status, xhr) {
            if (res === null) {}//loggedOut();
              else loggedIn(res);
            },
          error: function(res, status, xhr) {
            alert("login failure" + res);
          }
        });
      } else {
        loggedOut();
      }
    }
    </script>

    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-31551001-1']);
      _gaq.push(['_setDomainName', 'testmanifest.com']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
  </body>
</html>
