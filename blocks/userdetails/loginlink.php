<?php
//==Qlogin by stonebreath and laffin
    if ($CURUSER['class'] >= UC_STAFF && $id == $CURUSER['id']) {
    $hash1 = $mc1->get_value('hash1_'.$id);
    if ($hash1 === false) {
    $res = sql_query("SELECT hash1 FROM users WHERE id = ".sqlesc($CURUSER['id'])." AND class >= ".UC_STAFF) or sqlerr(__FILE__, __LINE__);
    $hash1 = mysqli_fetch_assoc($res);
    $mc1->cache_value('hash1_'.$id, $hash1, $INSTALLER09['expires']['user_hash']);
    }
    $arr = $hash1;
    if ($arr['hash1'] != '') { 
    $HTMLOUT.="<tr><td class='rowhead'>Login Link<br /><a href='createlink.php?action=reset&amp;id=".$CURUSER['id']."' target='_blank'>Reset Link</a></td><td align='left'>{$INSTALLER09['baseurl']}/pagelogin.php?qlogin=".$arr['hash1']."</td></tr>";
    } else { 
    $HTMLOUT.="<tr><td class='rowhead'>Login Link</td><td align='left'><a href='createlink.php?id=".$CURUSER['id']."' target='_blank'>Create link</a></td></tr>";
    } 
    }
//==End
// End Class

// End File