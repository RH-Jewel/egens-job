<?php 
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

$jobArray = $response->data;
$jobArray = json_decode(json_encode($jobArray),true);
// echo "<pre>";
$jobTitleArray = array_unique(array_column($jobArray, 'title','jobPostId'));
// exit();
?>
<section class="job-archive" data-page="1">
	<section class="job-archive-filter">
		<div class="container">
			<form action="#">
				<div class="text-center">
					<h1><?php echo count( json_decode(json_encode($response->data),true) ) ?> lediga jobb över hela Sverige</h1>
				</div>

				<div class="row small-gutters">
					<div class="col-lg-9 js-search-input-container search-input-container">
						<div class="transparent-orange-bg">
							<div class="js-search-query job-archive-filter__search-query">
								<div class="js-search-filter job-archive-filter__search-filter">
									<ul class="attribute-list">
										<li class="js-job-archive-search-input">
											<div class="job-archive-filter__search-input">
												<input type="search" name="q" value="" autocomplete="off" placeholder="Sök på ort, stad eller yrke...">
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
											<li>
												<input type="checkbox" id="tax_municipality1" rel="Alingsås" name="tax_municipality[]" value="alingsas"
												>
												<label for="tax_municipality1">Alingsås</label>
											</li>
										</ul>
									</div>
								</div>
						</div>
						<div class="col-md-6 col-lg-3 accordion">
							<div class="transparent-orange-bg accordion__inner">
								<h4 class="job-archive-filter__filter-type js-expand-filter jobPositionType">Typ av uppdrag?<i class="bi bi-chevron-down jobPositionTypeIcon"></i></h4>
								<div class="accordion-expandable jobPositionTypeAccordion">
									<ul class="" data-simplebar data-simplebar-auto-hide="true">
										<li>
											<input type="checkbox" id="tax_type_of_employment1" rel="Tillsvidareanställning" name="tax_type_of_employment[]" value="tillsvidareanstallning"
											>
											<label for="tax_type_of_employment1">Tillsvidareanställning</label>
										</li>
									</ul>
								</div>
							</div>
						</div>
				</div>
			</form>
		</div>
	</section>
	<div class="container js-jobs-container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-between flex-column flex-md-row search-result__wrapper">
                    <span class="search-result__counter">
                        Din sökning gav <?php echo count( json_decode(json_encode($response->data),true) ) ?> träffar			</span>
                    <ul class="job-archive__orderby d-flex">
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
                    </ul>
                </div>
            </div>
        </div>
		<div id="jobArchiveList">
			<?php foreach( $response->data as $jobs ) : ?>
				<div class="job-post">
					<div class="row">
						<div class="col-xl-2 my-auto">
							<div class="align-middle text-xl-center">
								<img src="<?php echo $jobs->logo ?? '' ?>" alt="<?php echo $jobs->logo ?? '' ?>" />
							</div>
						</div>
						<div class="col-xl-8">
							<div class="job-post__date">
								<?php echo date("Y-m-d", strtotime($jobs->created)) ?>		
							</div>
							<a href="<?php echo home_url( $wp->request ). '?job_id='.$jobs->jobPostId.'&slug='.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $jobs->name)) ?>" class="job-post__link">
								<?php if( !empty( $jobs->name ) ) : ?>
									<h2><?php echo $jobs->name ?></h2>
								<?php endif ?>
							</a>

							<div class="job-post__specification">
								<a href="#"><?php echo $jobs->city ?? ''  ?></a>
								<span class="job-post__delimiter">|</span>						
								<a href="#"><?php echo $jobs->position ?? '' ?></a>
							</div> 
							<div class="job-post__description">
								<div class="d-none d-xl-block">
									<p>
										<?php echo generateExcerpt( $jobs->body,'300' )  ?>
									</p>
								</div>
							</div>
						</div>
						<div class="col-xl-2 d-flex flex-column justify-content-center align-content-start">
							<a href="<?php echo home_url( $wp->request ). '?job_id='.$jobs->jobPostId.'&slug='.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $jobs->name)) ?>" class="btn btn__submit">Läs mer och ansök</a>
							<!-- <button class="js-save-job btn__save-job" data-save-job="Spara jobb" data-saved-job="Sparat jobb" data-id="53295"><i class="icon-mark-favourite"></i><span>Spara jobb</span></a> -->
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>

		<?php
			// $job_data_array = $response->data;
			// $job_data_array = json_decode(json_encode($job_data_array),true);
			// $jsonarray = $response;
			// $page = !isset($_GET['page']) ? 1 : $_GET['page'];
			// $limit = 5; 
			// $offset = ($page - 1) * $limit;
			// $total_items = count($job_data_array); 
			// $total_pages = ceil($total_items / $limit);
			// $array = array_splice($job_data_array, $offset, $limit);
			
			// for($j=1;$j<=$total_pages;$j++) {
			// 	echo "<span><a href='".home_url( $wp->request )."?page=$j'>$j</a></span>";
			// }
		?>
        <!-- <div class="pagination pagination-footer text-center" data-pages="Array">
            <span aria-current="page" class="page-numbers current">1</span>
            <a class="page-numbers" href="page/2/index.html">2</a>
            <a class="page-numbers" href="page/3/index.html">3</a>
            <span class="page-numbers dots">&hellip;</span>
            <a class="page-numbers" href="page/19/index.html">19</a>
            <a class="next page-numbers" href="page/2/index.html">Nästa sida</a>
        </div> -->
    </div>
</section>
