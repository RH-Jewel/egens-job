<?php 
/* 
Template Name: Jobs
*/
get_header();

$slug = get_query_var('slug');
$job_id = get_query_var('job_id');

?>
<?php
    if( empty( $slug ) && empty( $job_id ) ) {
        get_template_part('template-parts/content','archive-jobs');
    }else{
        get_template_part( 'template-parts/content','jobs-single' );
    }

?>

<?php get_footer() ?>
