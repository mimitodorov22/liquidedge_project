<?php

$search_term = "";

if (isset($_POST['search'])) {
    $search_term = mysqli_real_escape_string($connection, $_POST['search_query']);
    $search_fields = array("user_firstname", "user_lastname"); // Search only in these fields
}

?>

<div class="input-group justify-content-end">
    <input type="text" name="search_query" class=" mr-2" placeholder="Search by name..." value="<?php echo $search_term; ?>">
    <span class="input-group-btn">
        <input type="submit" name="search" class="btn btn-primary" value="Search">
    </span>
</div>