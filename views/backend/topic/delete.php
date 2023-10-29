<?php

use App\Models\Topic;

$id = $_REQUEST['id'];
$topuc = Topic::find($id);
if ($topuc == null)
{
    header("location:index.php?option=topic");
}
$topuc->status = 0;
$topuc->updated_at = date('Y-m-d H:i:s');
$topuc->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$topuc->save();
header("location:index.php?option=topic");