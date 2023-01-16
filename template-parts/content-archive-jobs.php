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


?>

<section class="job-archive" data-page="1">
	<div class="container js-jobs-container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-between flex-column flex-md-row search-result__wrapper">
                    <span class="search-result__counter">
                        Din sökning gav 272 träffar			</span>
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
                        <a href="<?php echo home_url( $wp->request ). '?job_id='.$jobs->jobPostId.'&slug='.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $jobs->title)) ?>" class="job-post__link">
                            <?php if( !empty( $jobs->title ) ) : ?>
                                <h2><?php echo $jobs->title ?></h2>
                            <?php endif ?>
                        </a>

                        <!-- <div class="job-post__specification">
                            <a href="index9456.html?tax_municipality[]=stockholm">Stockholm</a>
                            <span class="job-post__delimiter">|</span>						
                            <a href="index2316.html?tax_timetype[]=deltid">Deltid</a>
                        </div> -->
                        <div class="job-post__description">
                            <div class="d-none d-xl-block">
                                <p>
                                    <?php echo generateExcerpt( $jobs->body,'300' )  ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 d-flex flex-column justify-content-center align-content-start">
                        <a href="<?php echo home_url( $wp->request ). '?job_id='.$jobs->jobPostId.'&slug='.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $jobs->title)) ?>" class="btn btn__submit">Läs mer och ansök</a>
                        <!-- <button class="js-save-job btn__save-job" data-save-job="Spara jobb" data-saved-job="Sparat jobb" data-id="53295"><i class="icon-mark-favourite"></i><span>Spara jobb</span></a> -->
                    </div>
                </div>
            </div>
        <?php endforeach ?>
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