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
function egenslab_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'egenslab_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function egenslab_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'egenslab_pingback_header');

// Fetch All Sweden City from API

function get_all_sweden_city_array() {
	$all_swiden_city = get_all_sweden_city();
	$return_val = [];
	foreach ( $all_swiden_city as $value ) {
		$return_val[$value['cityId']] = $value['name'];
	}
	return $return_val;
}

function get_all_sweden_city()
{
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://api.recman.no/v2/get/?key=230114013048k7558b612532a34cca8be4a12cbfe60d82021015876&scope=location',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
	));

	$response = curl_exec($curl);

	curl_close($curl);

	$response = json_decode($response);
	$response = json_decode(json_encode($response), true);
	$sweden_city = array_filter($response['city'], function ($var) {
		return ($var['countryId'] == 1);
	});

	return $sweden_city;
}

// Make array unique by value
function unique_multidim_array($array, $key) { 
	$temp_array = array(); 
	$i = 0; 
	$key_array = array(); 

	foreach($array as $val) { 
		if (!in_array($val[$key], $key_array)) { 
			$key_array[$i] = $val[$key]; 
			$temp_array[$i] = $val; 
		} 
		$i++; 
	} 
	return $key_array; 
}

// Camel case to string 
function camelCaseToString($str)
{
    $formattedStr = '';
    $re = '/
          (?<=[a-z])
          (?=[A-Z])
        | (?<=[A-Z])
          (?=[A-Z][a-z])
        /x';
    $a = preg_split($re, $str);
    $formattedStr = implode(' ', $a);
    return $formattedStr;
}

// Fetch All Job Post Data from API

function get_all_job_post()
{
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

	$response = json_decode($response);
	return $response;
}
// Generate Excerpt 
function generateExcerpt($string, $length, $end = '....')
{
	$string = strip_tags($string);

	if (strlen($string) > $length) {

		// truncate string
		$stringCut = substr($string, 0, $length);

		// make sure it ends in a word so assassinate doesn't become ass...
		$string = substr($stringCut, 0, strrpos($stringCut, ' ')) . $end;
	}
	return $string;
}
// Ajax Handler Helper

function jobs_ajax_handler_scripts()
{

	global $wp_query;
	global $wp;
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script('egenslab-custom', 'egens_frontend_ajax_handler_params', array(
		'ajaxurl' 		=> home_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' 		=> json_encode($wp_query->query_vars), // everything about your loop is here
		'current_page' 	=> get_query_var('paged') ? get_query_var('paged') : 1,
		'max_page' 		=> $wp_query->max_num_pages,
		'page_url'	 	=> home_url($wp->request),
	));
}

add_action('wp_enqueue_scripts', 'jobs_ajax_handler_scripts');


// Get Product Data by ID

function get_job_by_filter_title_list_ajax_handler()
{
	global $wp;
	$response = get_all_job_post();
	$response = json_decode(json_encode($response), true);

	// Filter by Title 
	if ( isset($_POST['jobInfo']['filterTitleList']) ) {
		$titleList = $_POST['jobInfo']['filterTitleList'];
		$titleListJob = array_filter(
			$response['data'],
			function ($key) use ($titleList) {
				return in_array($key, $titleList);
			},
			ARRAY_FILTER_USE_KEY
		);
	} else {
		$titleListJob = $response['data'];
	}

	// Job Search by Keyword 

	if( !empty( $_POST['jobInfo']['jobSearchKeyword'] ) ) {
		$searchKeyword = $_POST['jobInfo']['jobSearchKeyword'];
		$titleListJob = $titleListJob = array_filter($response['data'], function ($item) use ($searchKeyword) {
			if ( stripos($item['title'], $searchKeyword) !== false || stripos( $item['city'], $searchKeyword) !== false || stripos( $item['title'], $searchKeyword ) ) {
				return true;
			}
			return false;
		});
	}

	// Filter by City 
	if ( isset($_POST['jobInfo']['filterCityList']) ) {
		$jobCityId = $_POST['jobInfo']['filterCityList'];
		$titleListJob = array_filter($titleListJob, function ($var) use ($jobCityId) {
			return in_array($var['cityId'], $jobCityId);
		});
	} else {
		$titleListJob = $titleListJob;
	}

	// Filter by Position Type 
	if ( isset($_POST['jobInfo']['filterPositionTypeList']) ) {
		$positionTypeList = $_POST['jobInfo']['filterPositionTypeList'];
		$titleListJob = array_filter($titleListJob, function ($var) use ($positionTypeList) {
			return in_array($var['positionType'], $positionTypeList);
		});
	} else {
		$titleListJob = $titleListJob;
	}
	
	// Filter by Position 
	if ( isset($_POST['jobInfo']['filterPositionList']) ) {
		$positionList = $_POST['jobInfo']['filterPositionList'];
		$titleListJob = array_filter($titleListJob, function ($var) use ($positionList) {
			return in_array($var['position'], $positionList);
		});
	} else {
		$titleListJob = $titleListJob;
	}
?>
		<div class="row">
			<div class="col">
				<div class="d-flex justify-content-between flex-column flex-md-row search-result__wrapper">
					<span class="search-result__counter">
						Din sökning gav <?php echo count( $titleListJob ) ?> träffar			</span>
					<!-- <ul class="job-archive__orderby d-flex">
						<li>
							<input type="radio" name="orderby" value="post_date" id="orderbydate"  checked='checked'>
							<label for="orderbydate">
								Datum					</label>
						</li>
						<li>
							<input type="radio" name="orderby" value="tax_municipality" id="orderbymunicipality" >
							<label for="orderbymunicipality">
								Stad</a>
							</label>
					</ul> -->
				</div>
			</div>
		</div>
	<?php foreach ($titleListJob as $jobs) : ?>
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
					<a href="<?php echo $_POST['pageURL'] . '?job_id=' . $jobs['jobPostId'] . '&slug=' . strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $jobs['name'])) ?>" class="job-post__link">
						<?php if (!empty($jobs['name'])) : ?>
							<h2><?php echo $jobs['name'] ?? '' ?></h2>
						<?php endif ?>
					</a>

					<div class="job-post__specification">
						<a href="#"><?php echo $jobs['city'] ?? ''  ?></a>
						<span class="job-post__delimiter">|</span>
						<a href="#"><?php echo ($jobs['position']=='fullTime') ? 'heltid': $jobs['position'] ?? '' ?></a>
					</div>
					<div class="job-post__description">
						<div class="d-none d-xl-block">
							<p>
								<?php echo generateExcerpt($jobs['body'], '300')  ?>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-2 d-flex flex-column justify-content-center align-content-start">
					<a href="<?php echo $_POST['pageURL'] . '?job_id=' . $jobs['jobPostId'] . '&slug=' . strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $jobs['name'])) ?>" class="btn btn__submit">Läs mer och ansök</a>
				</div>
			</div>
		</div>
	<?php endforeach ?>
<?php

	die();
}


add_action('wp_ajax_get_job_by_filter_title_list', 'get_job_by_filter_title_list_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_get_job_by_filter_title_list', 'get_job_by_filter_title_list_ajax_handler'); // wp_ajax_nopriv_{action}

// Job Pagination 

function get_job_by_pagination_ajax_handler() {
	global $wp;
	$response = get_all_job_post();
	$jobArray = $response->data;
	$jobArray = json_decode( json_encode($jobArray),true );
	
	// Job Post Pagination 
	$pages_links_and_data = paginate_job_posts( $jobArray,4, $_POST['page_number'] );
	
	?>
	<?php foreach( $pages_links_and_data['data'] as $jobs ) : ?>
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
					<a href="<?php echo $_POST['pageURL'] . '?job_id=' . $jobs['jobPostId'] . '&slug=' . strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $jobs['name'])) ?>" class="job-post__link">
						<?php if (!empty($jobs['name'])) : ?>
							<h2><?php echo $jobs['name'] ?? '' ?></h2>
						<?php endif ?>
					</a>

					<div class="job-post__specification">
						<a href="#"><?php echo $jobs['city'] ?? ''  ?></a>
						<span class="job-post__delimiter">|</span>
						<a href="#"><?php echo ($jobs['position']=='fullTime') ? 'heltid': $jobs['position'] ?? '' ?></a>
					</div>
					<div class="job-post__description">
						<div class="d-none d-xl-block">
							<p>
								<?php echo generateExcerpt($jobs['body'], '300')  ?>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-2 d-flex flex-column justify-content-center align-content-start">
					<a href="<?php echo $_POST['pageURL'] . '?job_id=' . $jobs['jobPostId'] . '&slug=' . strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $jobs['name'])) ?>" class="btn btn__submit">Läs mer och ansök</a>
					<button class="save__jobs btn__save-job" data-save-job-id="<?php echo $jobs['jobPostId'] ?? '' ?>" data-save-job="<?php echo $jobs['name'] ?? '' ?>"><i class="bi bi-bookmark-fill"></i><span>Spara jobb</span></button>
				</div>
			</div>
		</div>
	<?php endforeach ?>
<?php die(); }

add_action('wp_ajax_get_job_by_pagination', 'get_job_by_pagination_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_get_job_by_pagination', 'get_job_by_pagination_ajax_handler'); // wp_ajax_nopriv_{action}

// Job Post Pagination

function paginate_job_posts($data , $page_size = 4, $page = 1 ) {
	// The page to display (Usually is received in a url parameter)

	$page = $page;

	// The number of records to display per page
	$page_size = $page_size;

	// Calculate total number of records, and total number of pages
	$total_records = count($data);
	$total_pages   = ceil($total_records / $page_size);

	// Validation: Page to display can not be greater than the total number of pages
	if ($page > $total_pages) {
		$page = $total_pages;
	}

	// Validation: Page to display can not be less than 1
	if ($page < 1) {
		$page = 1;
	}

	// Calculate the position of the first record of the page to display
	$offset = ($page - 1) * $page_size;

	// Get the subset of records to be displayed from the array
	$data = array_slice($data, $offset, $page_size);
	// page links
	$N = min($total_pages, 9);
	$pages_links = array();

	$tmp = $N;
	if ($tmp < $page || $page > $N) {
		$tmp = 2;
	}
	for ($i = 1; $i <= $tmp; $i++) {
		$pages_links[$i] = $i;
	}

	if ($page > $N && $page <= ($total_pages - $N + 2)) {
		for ($i = $page - 3; $i <= $page + 3; $i++) {
			if ($i > 0 && $i < $total_pages) {
				$pages_links[$i] = $i;
			}
		}
	}

	$tmp = $total_pages - $N + 1;
	if ($tmp > $page - 2) {
		$tmp = $total_pages - 1;
	}
	for ($i = $tmp; $i <= $total_pages; $i++) {
		if ($i > 0) {
			$pages_links[$i] = $i;
		}
	}
	$page_link_and_data = [
		'data'		=> $data,
		'page_links'	=> $pages_links,
	];
	return $page_link_and_data;
}

// Save Jobs
function save_jobs_ajax_handler() {
	$all_jobs = get_all_job_post();
	$all_jobs = json_decode(json_encode($all_jobs), true);
	$jobIdArray = $_POST['job_id_array'];

	if ( isset($jobIdArray) ) {
		$jobCityId = $jobIdArray;
		$all_jobs = array_filter($all_jobs['data'], function ($var) use ($jobCityId) {
			return in_array($var['jobPostId'], $jobCityId);
		});
	} else {
		$all_jobs = $all_jobs;
	}
	$new_array = array_column($all_jobs, 'name','jobPostId');

	$save_jobs_html = '';

	foreach ($new_array as $key => $value) {
		$save_jobs_html .= '
		<div class="likebar__job">
			<a href="https://www.uniflex.se/jobb/truckforare-kyllager-frukt-gront-61897/">
				<h3>'.$value.'</h3>
			</a>
			<button class="js-remove-job" data-save-job-id="'.$key.'"><i class="bi bi-x-lg"></i></button>
		</div>
		';
	}
	print_r( $save_jobs_html );
}

add_action('wp_ajax_save_jobs', 'save_jobs_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_save_jobs', 'save_jobs_ajax_handler'); // wp_ajax_nopriv_{action}
