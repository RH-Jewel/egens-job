<?php 

$response = get_all_job_post();

$search = get_query_var('search');


// Get all unique Job Title and Job Post ID
$jobArray = $response->data;
$jobArray = json_decode(json_encode($jobArray),true);
$jobTitleArray = array_unique(array_column($jobArray, 'title','jobPostId'));

// Search 

if( !empty( $search ) ) {
	$searchKeyword = $search;
	$jobArray = $titleListJob = array_filter($jobArray, function ($item) use ($searchKeyword) {
		if ( stripos($item['title'], $searchKeyword) !== false || stripos( $item['city'], $searchKeyword) !== false || stripos( $item['title'], $searchKeyword ) ) {
			return true;
		}
		return false;
	});
}

// Job Post Pagination 
$pages_links_and_data = paginate_job_posts($jobArray,4);

// Get all Sweden City
$all_city = get_all_sweden_city();
$all_city_array = json_decode(json_encode($all_city),true);

// Get all Postion Type
$positionTypeArray = $response->data;
$positionTypeArray = json_decode(json_encode($positionTypeArray), true);
$positionTypeArray = unique_multidim_array($positionTypeArray,'positionType');

// Get all Postion
$positionArray = $response->data;
$positionArray = json_decode(json_encode($positionArray), true);
$positionArray = unique_multidim_array($positionArray,'position');

?>

<section class="job-archive" id="mainJobArchive">
	<section class="job-archive-filter">
		<div class="container">
			<form id="jobSearchForm">
				<div class="text-center">
					<h1><?php echo count( $jobArray ) ?> lediga jobb över hela Sverige</h1>
				</div>

				<div class="row small-gutters">
					<div class="col-lg-9 js-search-input-container search-input-container">
						<div class="transparent-orange-bg">
							<div class="js-search-query job-archive-filter__search-query">
								<div class="js-search-filter job-archive-filter__search-filter">
									<ul class="attribute-list">
										<li class="js-job-archive-search-input">
											<div class="job-archive-filter__search-input">
												<input type="search" class="job_search_value" value="" autocomplete="off" placeholder="Sök på jobbtitel, stad eller yrke...">
											</div>
										</li>
									</ul>
								</div>
								<button type="submit" class="btn btn__search"><i class="bi bi-search"></i></button>
							</div>
						</div>
					</div>
					<div class="col-lg-3 js-save-search-container save-search-container">
						<a href="#" class="btn btn--submit js-save-search">Spara din sökning<i class="bi bi-suit-heart"></i></a>
					</div>
					<div class="d-flex d-lg-none col-12 js-toggle-filters toggle-filters">
						<div class="d-flex justify-content-between">
							<button class="js-toggle-filters-btn" data-show-template="Visa filterval" data-hide-template="Dölj filterval"><span>Visa filterval</span><i class="bi bi-filter"></i></button>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 accordion">
						<div class="transparent-orange-bg accordion__inner">
							<h4 class="job-archive-filter__filter-type js-expand-filter jobTitle">Vad vill du jobba med?<i class="bi bi-chevron-down jobTitleIcon"></i></h4>
							<div class="accordion-expandable jobTitleAccordion">
								<ul class="" data-simplebar data-simplebar-auto-hide="true">
									<?php foreach( $jobTitleArray as $key => $title ) :  ?>
										<li>
											<input class="jobTitleInput" type="checkbox" id="tax_job_position<?php echo $key ?>" value="<?php echo $key ?>">
											<label class="jobTitleLabel" for="tax_job_position<?php echo $key ?>"><?php echo $title ?></label>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 accordion">
						<div class="transparent-orange-bg accordion__inner">
							<h4 class="job-archive-filter__filter-type js-expand-filter jobCity">Var vill du jobba?<i class="bi bi-chevron-down jobCityIcon"></i></h4>
								<div class="accordion-expandable jobCityAccordion">
									<ul class="" data-simplebar data-simplebar-auto-hide="true">
										<?php foreach( $all_city_array as $key => $city  ) : ?>
										<li>
											<input class="jobCityInput" type="checkbox" id="city<?php echo $key ?>" rel="<?php echo $city['name'] ?? '' ?>" value="<?php echo $city['cityId'] ?? '' ?>"
											>
											<label for="city<?php echo $key ?>"><?php echo $city['name'] ?? '' ?></label>
										</li>
										<?php endforeach ?>
									</ul>
								</div>
							</div>
					</div>
					<div class="col-md-6 col-lg-3 accordion">
						<div class="transparent-orange-bg accordion__inner">
							<h4 class="job-archive-filter__filter-type js-expand-filter jobPositionType">Typ av uppdrag?<i class="bi bi-chevron-down jobPositionTypeIcon"></i></h4>
							<div class="accordion-expandable jobPositionTypeAccordion">
								<ul class="" data-simplebar data-simplebar-auto-hide="true">
									<?php foreach($positionTypeArray as $key => $positionType) : ?>
										<li>
											<input class="jobPositionTypeInput" type="checkbox" id="positionType<?php echo $key ?>" rel="<?php echo $positionType ?>" value="<?php echo $positionType ?>">
											<label style="text-transform: capitalize;" for="positionType<?php echo $key ?>"><?php echo camelCaseToString($positionType) ?></label>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 accordion">
						<div class="transparent-orange-bg accordion__inner">
							<h4 class="job-archive-filter__filter-type js-expand-filter jobPosition">Typ av uppdrag?<i class="bi bi-chevron-down jobPositionIcon"></i></h4>
							<div class="accordion-expandable jobPositionAccordion">
								<ul class="" data-simplebar data-simplebar-auto-hide="true">
									<?php foreach($positionArray as $key => $position) : ?>
										<li>
											<input class="jobPositionInput" type="checkbox" id="position<?php echo $key ?>" rel="<?php echo $position ?>" value="<?php echo $position ?>">
											<label style="text-transform: capitalize;" for="position<?php echo $key ?>"><?php echo camelCaseToString($position) ?></label>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
	<div class="container js-jobs-container">
		<div id="jobArchiveList">
			<div class="row">
				<div class="col">
					<div class="d-flex justify-content-between flex-column flex-md-row search-result__wrapper">
						<span class="search-result__counter">
							Din sökning gav <?php echo count( $pages_links_and_data['data'] ) ?> träffar			</span>
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
							<a href="<?php echo home_url($wp->request) . '?job_id=' . $jobs['jobPostId'] . '&slug=' . strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $jobs['name'])) ?>" class="job-post__link">
								<?php if (!empty($jobs['name'])) : ?>
									<h2><?php echo $jobs['name'] ?? '' ?></h2>
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
										<?php echo generateExcerpt($jobs['body'], '300')  ?>
									</p>
								</div>
							</div>
						</div>
						<div class="col-xl-2 d-flex flex-column justify-content-center align-content-start">
							<a href="<?php echo home_url($wp->request) . '?job_id=' . $jobs['jobPostId'] . '&slug=' . strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $jobs['name'])) ?>" class="btn btn__submit">Läs mer och ansök</a>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<?php if( count( $pages_links_and_data['data'] ) > 3 ) : ?>
			<?php $prev = 0; ?>
			<div class="pagination pagination-footer text-center" id="jobPostPagination" data-pages="Array">
				<?php foreach ($pages_links_and_data['page_links'] as $p) { ?>
					<?php if (($p - $prev) > 1) { ?>
						<a href="#">...</a>
					<?php } ?>
					<?php $prev = $p; ?>

					<?php
					$style_active = '';
					if ($p == $page) {
						$style_active = 'style="font-weight:bold"';
					}
				?>

				<a class="job_paginate page-numbers" <?php echo $style_active; ?> href="#"><?php echo $p; ?></a>
				<?php } ?>		
			</div>
		<?php endif ?>
    </div>
</section>
