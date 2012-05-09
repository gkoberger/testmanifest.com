<div id="sidebar">
    <button id="install">Install!</button>
    <hr>
    <p>If you update the manifest, it will also be available at any of the following subdomains:</p>
    <ul>
    <li>http://<?= $subdomain_base ?>.testmanifest.com</li>
    <li>http://<?= $subdomain_base ?>-<span>test</span>.testmanifest.com</li>
    <li>http://<?= $subdomain_base ?>-<span>1</span>.testmanifest.com</li>
    <li>http://<?= $subdomain_base ?>-<span>2</span>.testmanifest.com</li>
    <li>http://<?= $subdomain_base ?>-<span>new</span>.testmanifest.com</li>
    <li>http://<?= $subdomain_base ?>-<span>&lt;anything&gt;</span>.testmanifest.com</li>
    </ul>
    <p>Subdomains are namespaced. Using a dash will allow you to serve manifests from different URLs while maintaining the manifest of the namespace.</p>

    <?php
    if($subdomain == "gkoberger") {
?>
<?= $user ?>!!!
<br>
    <div id="logged-in" class="<?= $user ? '' : 'hide' ?>">
        <input type="checkbox"> Lock this?
        <br>Locking means only you will be able to edit this.
    </div>
    <div id="logged-out" class="<?= !$user ? '' : 'hide' ?>">
        <a href="#" id="browserid" title="Sign-in with BrowserID">
          <img src="/images/sign_in_blue.png" alt="Sign in">
        </a>
    </div>
<?php
    }
?>
</div>

<form method="POST">
    <input type="text" id="thingy" value="http://<?= $subdomain ?>.testmanifest.com/manifest.webapp">
    <br>
    <br>

    <button type='submit'>Save</button>
<br>
    <textarea name='manifest'><?= $json ?></textarea>
    <br>
    <button type='submit'>Save</button>
</form>
