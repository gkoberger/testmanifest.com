<?php if($locked && $locked != $user): ?>
    <p class='locked'>This manifest has been locked. This means only the person who locked it may edit it.</p>
    <? if(!$user): ?>
        <a href="#" id="browserid" title="Sign-in with BrowserID">
          <img src="http://testmanifest.com/imgs/sign_in_blue.png" alt="Sign in">
        </a>
    <? endif ?>
<? elseif(!$user): ?>
    <p>Logged in users can lock a manifest so that it can't be edited by other people.</p>
    <a href="#" id="browserid" title="Sign-in with BrowserID">
      <img src="http://testmanifest.com/imgs/sign_in_blue.png" alt="Sign in">
    </a>
<? else: ?>
    <? $action = ($locked ? '' : 'un') . 'lock' ?>
    <? $opposite = (!$locked ? '' : 'un') . 'lock' ?>
    <span id="lock_current" class="<?= $action ?>ed">
        This manifest is <?= $action ?>ed.
        (<a href="#" data-action='<?=$opposite?>' class="lock-input"><?= $opposite ?></a>)
    </span>
    <p>Locking means only you will be able to edit this manifest.</p>
<? endif ?>
