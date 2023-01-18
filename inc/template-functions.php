<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package egenslab
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function egenslab_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'egenslab_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function egenslab_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'egenslab_pingback_header' );

// Fetch All Job Post Data from APi 

function get_all_job_post() {
	$curl = curl_init();
	global $wp;
	curl_setopt_array($curl, array(
	CURLOPT_URL => "https://api.recman.no/v2/get/?scope=jobPost&fields=projectId%2C%20name%2C%20title%2C%20ingress%2C%20body%2C%20numberOfPositions%2C%20startDate%2C%20endDate%2C%20logo%2C%20deadline%2C%20departmentId%2C%20facebook%2C%20linkedin%2C%20twitter%2C%20address1%2C%20address2%2C%20postalCode%2C%20city%2C%20country%2C%20web%2C%20salary%2C%20corporationId%2C%20created%2C%20updated%2C%20applyUrl%2C%20contacts%2C%20type%2C%20sector%2C%20accession%2C%20companyName%2C%20workplace%2C%20images%2C%20videoUrl%2C%20branchCategoryId%2C%20branchId%2C%20secondaryBranchCategoryId%2C%20secondaryBranchId%2C%20skills%2C%20countryId%2C%20regionId%2C%20cityId%2C%20position%2C%20positionType%2C%20socialMedia&key=230114013048k7558b612532a34cca8be4a12cbfe60d82021015876",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache",
		"postman-token: d845d6ce-7ccc-90f3-1033-bbf7ddc01941"
	),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	echo "cURL Error #:" . $err;
	}

	$response = json_decode( $response );
	return $response;
}
// Generate Excerpt 
function generateExcerpt($string,$length,$end='....')
{
    $string = strip_tags($string);

    if (strlen($string) > $length) {

        // truncate string
        $stringCut = substr($string, 0, $length);

        // make sure it ends in a word so assassinate doesn't become ass...
        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).$end;
    }
    return $string;
}
// Ajax Handler Helper

function jobs_ajax_handler_scripts() {
 
	global $wp_query; 
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'egenslab-custom', 'egens_frontend_ajax_handler_params', array(
		'ajaxurl' => home_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages,
	) );
}
 
add_action( 'wp_enqueue_scripts', 'jobs_ajax_handler_scripts' );


// Get Product Data by ID

function get_job_by_filter_title_list_ajax_handler(){
	global $wp;
	$response = get_all_job_post();
	$response = json_decode(json_encode($response),true);
	$titleList = $_POST['filterTitleList'];
	$titleListJob = array_filter(
		$response['data'],
		 function ($key) use ($titleList) {
            // N.b. in_array() is notorious for being slow 
            return in_array($key, $titleList);
        },
		ARRAY_FILTER_USE_KEY
	); 
	?>

	<?php foreach( $titleListJob as $jobs ) : ?>
			<div class="job-post">
				<div class="row">
					<div class="col-xl-2 my-auto">
						<div class="align-middle text-xl-center">
							<img src="<?php echo $jobs['logo'] ?? '' ?>" alt="<?php echo $jobs['logo'] ?? '' ?>" />
						</div>
					</div>
					<div class="col-xl-8">
						<div class="job-post__date">
							<?php echo date("Y-m-d", strtotime($jobs['created'])) ?>		
						</div>
						<a href="<?php echo home_url( $wp->request ). '?job_id='.$jobs['jobPostId'].'&slug='.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $jobs['name'])) ?>" class="job-post__link">
							<?php if( !empty( $jobs['name'] ) ) : ?>
								<h2><?php echo $jobs['name'] ?></h2>
							<?php endif ?>
						</a>

						<div class="job-post__specification">
							<a href="#"><?php echo $jobs['city'] ?? ''  ?></a>
							<span class="job-post__delimiter">|</span>						
							<a href="#"><?php echo $jobs['position'] ?? '' ?></a>
						</div> 
						<div class="job-post__description">
							<div class="d-none d-xl-block">
								<p>
									<?php echo generateExcerpt( $jobs['body'],'300' )  ?>
								</p>
							</div>
						</div>
					</div>
					<div class="col-xl-2 d-flex flex-column justify-content-center align-content-start">
						<a href="<?php echo home_url( $wp->request ). '?job_id='.$jobs['jobPostId'].'&slug='.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $jobs['name'])) ?>" class="btn btn__submit">Läs mer och ansök</a>
						<!-- <button class="js-save-job btn__save-job" data-save-job="Spara jobb" data-saved-job="Sparat jobb" data-id="53295"><i class="icon-mark-favourite"></i><span>Spara jobb</span></a> -->
					</div>
				</div>
			</div>
		<?php endforeach ?>
	<?php 

	die();

}

 
add_action('wp_ajax_get_job_by_filter_title_list', 'get_job_by_filter_title_list_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_get_job_by_filter_title_list', 'get_job_by_filter_title_list_ajax_handler'); // wp_ajax_nopriv_{action}