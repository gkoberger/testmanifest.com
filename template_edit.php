<div id="sidebar">
    <button id="install">Install!</button>
    <hr>
    <p>If you update the manifest, it will also be available at any of the following subdomains:</p>
    <ul>
    <li>http://<?= $subdomain_base ?>-<span>test</span>.testmanifest.com</li>
    <li>http://<?= $subdomain_base ?>-<span>1</span>.testmanifest.com</li>
    <li>http://<?= $subdomain_base ?>-<span>2</span>.testmanifest.com</li>
    <li>http://<?= $subdomain_base ?>-<span>new</span>.testmanifest.com</li>
    <li>http://<?= $subdomain_base ?>-<span>&lt;anything&gt;</span>.testmanifest.com</li>
    </ul>
    <p>Subdomains are namespaced. Using a dash will allow you to serve manifests from different URLs while maintaining the manifest of the namespace.</p>
</div>

<form method="POST">
    <button type='submit'>Save</button>
<br>
    <textarea name='manifest'><?= $json ?></textarea>
    <br>
    <button type='submit'>Save</button>
</form>
