<?php 

$slug = get_query_var('slug');
$jobPostId = get_query_var('job_id');

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

$job_single = $response->data;
$job_single = (array) $job_single;

?>

<section class="single-job-view">

	<header class="single-job-view__header page-hero no-thumbnail">
		<div class="container">
			<article class="entry-content text-center text-lg-left no-bottom-border">
				<div class="single-job-view__date">
                    <?php echo date("Y-m-d", strtotime($job_single[$jobPostId]->created)) ?>					
                </div>
				<h1><?php echo $job_single[$jobPostId]->title ?? '' ?></h1>

				<div class="single-job-view__button-bar d-flex d-md-block">
					<!-- <button class="js-save-job btn__save-job" data-id="52932">
						<i class="icon-mark-favourite"></i>Spara jobb					</button> -->
					<a class="btn__print-job" href="javascript:window.print();">
						<i class="icon-print"></i>Skriv ut sida					</a>
				</div>
			</article>
		</div>
	</header>

	<div class="container">

		<div class="row">
			<div class="col-12">
				<div class="row">
					<div class="col-xl-8 single-job-view__content">
						<div class="entry-content mx-auto">
                            <?php echo $job_single[$jobPostId]->body ?? '' ?>
						</div>
					</div>
					<aside class="col-xl-4 single-job-view__sidebar">
						<div class="entry-content">
                            <div class="single-job-view__company-logo">
                                <img src="<?php echo $job_single[$jobPostId]->logo ?? '' ?>" alt="<?php echo $job_single[$jobPostId]->logo ?? '' ?>" />
                            </div>
							
							<div class="single-job-view__submit">
								<a href="<?php echo $job_single[$jobPostId]->applyUrl ?? '' ?>" class="btn btn__submit" target="_blank" rel="noopener noreferrer"> Ansök här </a>
							</div>

							<h3>Snabbfakta</h3>

							<div class="single-job-view__definitions">																			
                                <div class="single-job-view__definition">
                                        <span>Plats:</span>
                                            <a href=""><?php echo $job_single[$jobPostId]->city ?? ''  ?></a>
                                        </div>
                                    <div class="single-job-view__definition">
                                        <span>Omfattning:</span>
                                            <a href=""><?php echo $job_single[$jobPostId]->position ?? '' ?></a>
                                    </div>
                                    <div class="single-job-view__definition">
                                        <span>Uppdragstyp:</span>
                                            <a href="../indexbb09.html?tax_type_of_employment[]=tillsvidareanstallning"><?php echo $job_single[$jobPostId]->positionType ?? '' ?></a>
                                    </div>
                                    <!-- <div class="single-job-view__definition">
                                        <span>Befattning:</span>
                                        <a href="../indexcf0e.html?tax_job_position[]=administrator">Administratör</a>
                                    </div>
                                    <div class="single-job-view__definition">
                                        <span>Sista ansökningsdag:</span>
                                        <strong>2023-01-17</strong>
                                    </div>
                                    <div class="single-job-view__definition">
                                        <span>Referensnummer:</span>
                                        <strong>60636</strong>
                                    </div> -->
                                </div>
							<h3>Tipsa någon om jobbet</h3>

							<div class="single-job-view__definitions">
								<div class="share-bar">
                                    <?php if( isset( $job_single[$jobPostId]->facebook ) ) : ?>
                                        <a href="<?php echo esc_url( $job_single[$jobPostId]->facebook ) ?? '' ?>"
                                            target="_blank" title="Dela på Facebook">
                                            <div class="icon-circle">
                                                <i class="icon icon-facebook"></i>
                                            </div>
                                        </a>
                                    <?php endif ?>
                                    <?php if( isset( $job_single[$jobPostId]->twitter ) ) : ?>
									<a href="<?php echo esc_url( $job_single[$jobPostId]->twitter ) ?? '' ?>"
										target="_blank" title="Twitter">
										<div class="icon-circle">
											<i class="icon icon-twitter"></i>
										</div>
									</a>
                                    <?php endif ?>
                                    <?php if( isset( $job_single[$jobPostId]->linkedin ) ) : ?>
                                        <a href="<?php echo esc_url( $job_single[$jobPostId]->linkedin ) ?? '' ?>"
                                            target="_blank" title="Dela på LinkedIn">
                                            <div class="icon-circle">
                                                <i class="icon icon-linkedin"></i>
                                            </div>
                                        </a>
                                    <?php endif ?>
								</div>
							</div>													
								<h3>Hur får man jobb?</h3>
							<div class="youtube-container">
								<a href="https://www.youtube.com/embed/Prj7xZ4M9gw" data-featherlight="iframe" data-featherlight-iframe-width="960" data-featherlight-iframe-height="540">
									<img src="../../../wwwuniflexse.cdn.triggerfish.cloud/uploads/2018/07/uniflex-bemanning-39-300x200.jpg">
									<div>
										<i class="icon-triangle-right"></i>
									</div>
								</a>
							</div>
						</div>

					</aside>
				</div>
			</div>
		</div>
	</div>
</section>