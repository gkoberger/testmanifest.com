<?php if($locked && $locked != $user): ?>
    <p class='locked'>This manifest has been locked. This means only the person who locked it may edit it.</p>
    <? if(!$user): ?>
        <a href="#" id="browserid" title="Sign-in with BrowserID">
          <img src="http://testmanifest.com/imgs/sign_in_blue.png" alt="Sign in">
        </a>
    <? endif ?>
<? elseif(!$user): ?>
    <a href="#" id="browserid" title="Sign-in with BrowserID">
      <img src="http://testmanifest.com/imgs/sign_in_blue.png" alt="Sign in">
    </a>
    <p>Logged in users can lock a manifest so that it can't be edited by other people.</p>
<? else: ?>
    <input class="lock-input" type="checkbox" <?= $locked ? "checked='checked'" : "" ?> id="lock"> <label for="lock">Lock this manifest?</label>
    <p>Locking means only you will be able to edit this manifest.</p>
    <span id="lock_current" class="<?= $locked ? '' : 'un' ?>locked">This manifest is currently <?= $locked ? '' : 'un' ?>locked.</span>
<? endif ?>
