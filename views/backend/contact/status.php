<?php

use App\Models\Contact;

$id = $_REQUEST['id'];
$contact = Contact::find($id);
if ($contact == null)
{
    header("location:index.php?option=contact");
}
$contact->status = ($contact->status == 1) ? 2 : 1;
$contact->updated_at = date('Y-m-d H:i:s');
$contact->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$contact->save();
header("location:index.php?option=contact");