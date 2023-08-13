<?php
get_header();
$slug = get_query_var('slug');
?>
    <h1>Slug is  <?php echo $slug?></h1>
<?php
get_footer();
