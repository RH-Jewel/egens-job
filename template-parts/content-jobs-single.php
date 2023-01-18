<?php 

$response = get_all_job_post();

$job_single = $response->data;
$job_single = json_decode(json_encode($job_single),true);

?>

<section class="single-job-view">

	<header class="single-job-view__header page-hero no-thumbnail">
		<div class="container">
			<article class="entry-content text-center text-lg-left no-bottom-border">
				<div class="single-job-view__date">
                    <?php echo date("Y-m-d", strtotime($job_single[$jobPostId]['created'])) ?>					
                </div>
				<h1><?php echo $job_single[$jobPostId]['name'] ?? '' ?></h1>

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
                            <?php echo $job_single[$jobPostId]['body'] ?? '' ?>
						</div>
					</div>
					<aside class="col-xl-4 single-job-view__sidebar">
						<div class="entry-content">
                            <div class="single-job-view__company-logo">
                                <img src="<?php echo $job_single[$jobPostId]['logo'] ?? '' ?>" alt="<?php echo $job_single[$jobPostId]['logo'] ?? '' ?>" />
                            </div>
							
							<div class="single-job-view__submit">
								<a href="<?php echo $job_single[$jobPostId]['applyUrl'] ?? '' ?>" class="btn btn__submit" target="_blank" rel="noopener noreferrer"> Ansök här </a>
							</div>

							<h3>Snabbfakta</h3>

							<div class="single-job-view__definitions">																			
                                <div class="single-job-view__definition">
                                        <span>Plats:</span>
                                            <a href=""><?php echo $job_single[$jobPostId]['city'] ?? ''  ?></a>
                                        </div>
                                    <div class="single-job-view__definition">
                                        <span>Omfattning:</span>
                                            <a href=""><?php echo $job_single[$jobPostId]['position'] ?? '' ?></a>
                                    </div>
                                    <div class="single-job-view__definition">
                                        <span>Uppdragstyp:</span>
                                            <a href="../indexbb09.html?tax_type_of_employment[]=tillsvidareanstallning"><?php echo $job_single[$jobPostId]['positionType'] ?? '' ?></a>
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
                            <?php if( !empty( $job_single[$jobPostId]['facebook'] ) || !empty( $job_single[$jobPostId]['twitter'] ) || !empty( $job_single[$jobPostId]['linkedin'] ) ) : ?>
                                <h3>Tipsa någon om jobbet</h3>
                                
                                <div class="single-job-view__definitions">
                                    <div class="share-bar">
                                        <?php if( !empty( $job_single[$jobPostId]['facebook'] ) ) : ?>
                                            <a href="<?php echo esc_url( $job_single[$jobPostId]['facebook'] ) ?? '' ?>"
                                                target="_blank" title="Dela på Facebook">
                                                <div class="icon-circle">
                                                    <i class="bi bi-facebook"></i>
                                                </div>
                                            </a>
                                        <?php endif ?>
                                        <?php if( !empty( $job_single[$jobPostId]['twitter'] ) ) : ?>
                                        <a href="<?php echo esc_url( $job_single[$jobPostId]['twitter'] ) ?? '' ?>"
                                            target="_blank" title="Twitter">
                                            <div class="icon-circle">
                                                <i class="bi bi-twitter"></i>
                                            </div>
                                        </a>
                                        <?php endif ?>
                                        <?php if( !empty( $job_single[$jobPostId]['linkedin'] ) ) : ?>
                                            <a href="<?php echo esc_url( $job_single[$jobPostId]['linkedin'] ) ?? '' ?>"
                                                target="_blank" title="Dela på LinkedIn">
                                                <div class="icon-circle">
                                                    <i class="bi bi-linkedin"></i>
                                                </div>
                                            </a>
                                        <?php endif ?>
                                    </div>
                                </div>
                            <?php endif ?>													
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