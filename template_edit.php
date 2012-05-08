<div id="sidebar">
    <button id="install">Install!</button>
    <hr>
    If you update the manifest, it will be available at any of the following subdomains:
    <ul>
    <li>http://<?= $subdomain ?>-<span>test</span>.testmanifest.com</li>
    <li>http://<?= $subdomain ?>-<span>1</span>.testmanifest.com</li>
    <li>http://<?= $subdomain ?>-<span>2</span>.testmanifest.com</li>
    <li>http://<?= $subdomain ?>-<span>new</span>.testmanifest.com</li>
    <li>http://<?= $subdomain ?>-<span>&lt;anything&gt;</span>.testmanifest.com</li>
    </ul>
</div>

<form method="POST">
    <button type='submit'>Save</button>
<br>
    <textarea name='manifest' style='height: 400px; width: 600px; border: 1px solid #ccc;'><?= $json ?></textarea>
    <br>
    <button type='submit'>Save</button>
</form>
