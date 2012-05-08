<button id="install">Install!</button>

<form method=\"POST\">
    <input type='submit' value='Save'><br>
    <textarea name='manifest' style='height: 400px; width: 600px; border: 1px solid #ccc;'>
    <?= $json ?>
    </textarea>
    <br>
    <input type='submit' value='Save'>
</form>
