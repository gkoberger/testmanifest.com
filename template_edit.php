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

    <hr>
    <strong>Manifest Locking</strong>
    <div id="locking">
        <? include "lock.php"; ?>
    </div>
</div>

<form method="POST" class="is_<?= $locked && $locked != $user ? '' : 'un' ?>locked">
    <input type="text" id="thingy" value="http://<?= $subdomain ?>.testmanifest.com/manifest.webapp">
    <br>
    <br>

    <button type='submit'>Save</button>
    <p class="locked">This manifest can't be saved because it is locked by someone other than you.</p>
<br>
    <textarea name='manifest'><?= $json ?></textarea>
    <br>
    <button type='submit'>Save</button>
    <p class="locked">This manifest can't be saved because it is locked by someone other than you.</p>
</form>
