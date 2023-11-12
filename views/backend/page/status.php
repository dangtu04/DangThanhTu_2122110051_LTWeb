<?php

use App\Models\Post;

$id = $_REQUEST['id'];
$page = Post::find($id);
if ($page == null) {
    header("location:index.php?option=page");
}
$page->status = ($page->status == 1) ? 2 : 1;
$page->updated_at = date('Y-m-d H:i:s');
$page->updated_by = (isset($_SESSION['topic_id'])) ? $_SESSION['topic_id'] : 1;
$page->save();
header("location:index.php?option=page");
