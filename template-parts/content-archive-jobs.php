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
						<a href="#" class="btn btn--submit js-save-search">Spara din sökning<i class="icon-heart"></i></a>
					</div>
					<div class="d-flex d-lg-none col-12 js-toggle-filters toggle-filters">
						<div class="d-flex justify-content-between">
							<button class="js-toggle-filters-btn" data-show-template="Visa filterval" data-hide-template="Dölj filterval"><span>Visa filterval</span><i class="icon-filter"></i></button>
						</div>
					</div>
										<div class="col-md-6 col-lg-3 accordion">
							<div class="transparent-orange-bg accordion__inner">
																<h4 class="job-archive-filter__filter-type js-expand-filter">Vad vill du jobba med?<i class="bi bi-chevron-down"></i></h4>
									<div class="accordion-expandable">
										<ul class="" data-simplebar data-simplebar-auto-hide="true">
																						<li>
													<input type="checkbox" id="tax_job_position2" rel="Administratör" name="tax_job_position[]" value="administrator"
													>
													<label for="tax_job_position2">Administratör</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position5" rel="Assistent" name="tax_job_position[]" value="assistent"
													>
													<label for="tax_job_position5">Assistent</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position6" rel="Bioteknik" name="tax_job_position[]" value="bioteknik"
													>
													<label for="tax_job_position6">Bioteknik</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position7" rel="Bud/Kurir" name="tax_job_position[]" value="bud-kurir"
													>
													<label for="tax_job_position7">Bud/Kurir</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position11" rel="Bygg/Anläggning/Infrastruktur" name="tax_job_position[]" value="bygg-anlaggning-infrastruktur"
													>
													<label for="tax_job_position11">Bygg/Anläggning/Infrastruktur</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position14" rel="CAD/CAM" name="tax_job_position[]" value="cad-cam"
													>
													<label for="tax_job_position14">CAD/CAM</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position15" rel="Callcenter" name="tax_job_position[]" value="callcenter"
													>
													<label for="tax_job_position15">Callcenter</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position16" rel="Chaufför (buss/bil)" name="tax_job_position[]" value="chauffor-buss-bil"
													>
													<label for="tax_job_position16">Chaufför (buss/bil)</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position21" rel="Drift/Underhåll" name="tax_job_position[]" value="drift-underhall"
													>
													<label for="tax_job_position21">Drift/Underhåll</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position24" rel="El" name="tax_job_position[]" value="el"
													>
													<label for="tax_job_position24">El</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position25" rel="El/Elektronik" name="tax_job_position[]" value="el-elektronik"
													>
													<label for="tax_job_position25">El/Elektronik</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position31" rel="Fastighetskötsel/HVAC" name="tax_job_position[]" value="fastighetskotsel-hvac"
													>
													<label for="tax_job_position31">Fastighetskötsel/HVAC</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position33" rel="Fordon Reparation/Underhåll" name="tax_job_position[]" value="fordon-reparation-underhall"
													>
													<label for="tax_job_position33">Fordon Reparation/Underhåll</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position35" rel="Formgjutning" name="tax_job_position[]" value="formgjutning"
													>
													<label for="tax_job_position35">Formgjutning</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position37" rel="Försäljning/Affärsutveckling" name="tax_job_position[]" value="forsaljning-affarsutveckling"
													>
													<label for="tax_job_position37">Försäljning/Affärsutveckling</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position39" rel="Gruppchef/Teamleader" name="tax_job_position[]" value="gruppchef-teamleader"
													>
													<label for="tax_job_position39">Gruppchef/Teamleader</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position40" rel="Handläggare" name="tax_job_position[]" value="handlaggare"
													>
													<label for="tax_job_position40">Handläggare</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position44" rel="HR-assistent/handläggare" name="tax_job_position[]" value="hr-assistent-handlaggare"
													>
													<label for="tax_job_position44">HR-assistent/handläggare</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position46" rel="HR/Personal" name="tax_job_position[]" value="hr-personal"
													>
													<label for="tax_job_position46">HR/Personal</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position55" rel="Kock/Souschef" name="tax_job_position[]" value="kock-souschef"
													>
													<label for="tax_job_position55">Kock/Souschef</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position59" rel="Kundservice" name="tax_job_position[]" value="kundservice"
													>
													<label for="tax_job_position59">Kundservice</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position60" rel="Kundsupport/Service" name="tax_job_position[]" value="kundsupport-service"
													>
													<label for="tax_job_position60">Kundsupport/Service</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position63" rel="Kvalitetssäkring Produktion" name="tax_job_position[]" value="kvalitetssakring-produktion"
													>
													<label for="tax_job_position63">Kvalitetssäkring Produktion</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position67" rel="Lager Terminal/Truck" name="tax_job_position[]" value="lager-terminal-truck"
													>
													<label for="tax_job_position67">Lager Terminal/Truck</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position69" rel="Lastbilschaufför" name="tax_job_position[]" value="lastbilschauffor"
													>
													<label for="tax_job_position69">Lastbilschaufför</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position72" rel="Leverans/Distribution" name="tax_job_position[]" value="leverans-distribution"
													>
													<label for="tax_job_position72">Leverans/Distribution</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position74" rel="Logistik Material/Produktion" name="tax_job_position[]" value="logistik-material-produktion"
													>
													<label for="tax_job_position74">Logistik Material/Produktion</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position76" rel="Logistik/Transport" name="tax_job_position[]" value="logistik-transport"
													>
													<label for="tax_job_position76">Logistik/Transport</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position81" rel="Maskin Reparation/Underhåll" name="tax_job_position[]" value="maskin-reparation-underhall"
													>
													<label for="tax_job_position81">Maskin Reparation/Underhåll</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position82" rel="Maskinarbete" name="tax_job_position[]" value="maskinarbete"
													>
													<label for="tax_job_position82">Maskinarbete</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position84" rel="Mekanik" name="tax_job_position[]" value="mekanik"
													>
													<label for="tax_job_position84">Mekanik</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position85" rel="Metall/Svets" name="tax_job_position[]" value="metall-svets"
													>
													<label for="tax_job_position85">Metall/Svets</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position86" rel="Metallarbete/Svetsning" name="tax_job_position[]" value="metallarbete-svetsning"
													>
													<label for="tax_job_position86">Metallarbete/Svetsning</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position87" rel="Montering" name="tax_job_position[]" value="montering"
													>
													<label for="tax_job_position87">Montering</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position88" rel="Murning/Betong" name="tax_job_position[]" value="murning-betong"
													>
													<label for="tax_job_position88">Murning/Betong</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position89" rel="Måleri/Golvläggning" name="tax_job_position[]" value="maleri-golvlaggning"
													>
													<label for="tax_job_position89">Måleri/Golvläggning</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position95" rel="Produktionsledning" name="tax_job_position[]" value="produktionsledning"
													>
													<label for="tax_job_position95">Produktionsledning</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position100" rel="Reception/Växel" name="tax_job_position[]" value="reception-vaxel"
													>
													<label for="tax_job_position100">Reception/Växel</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position102" rel="Rekrytering/Research" name="tax_job_position[]" value="rekrytering-research"
													>
													<label for="tax_job_position102">Rekrytering/Research</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position111" rel="Städning/Hushållsskötsel" name="tax_job_position[]" value="stadning-hushallsskotsel"
													>
													<label for="tax_job_position111">Städning/Hushållsskötsel</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position112" rel="Svarvning/CNC" name="tax_job_position[]" value="svarvning-cnc"
													>
													<label for="tax_job_position112">Svarvning/CNC</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position115" rel="Säljsupport" name="tax_job_position[]" value="saljsupport"
													>
													<label for="tax_job_position115">Säljsupport</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position117" rel="Takläggning" name="tax_job_position[]" value="taklaggning"
													>
													<label for="tax_job_position117">Takläggning</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position118" rel="Teknik/Ingenjörstjänster" name="tax_job_position[]" value="teknik-ingenjorstjanster"
													>
													<label for="tax_job_position118">Teknik/Ingenjörstjänster</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position119" rel="Teknisk kundservice" name="tax_job_position[]" value="teknisk-kundservice"
													>
													<label for="tax_job_position119">Teknisk kundservice</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position122" rel="Teknisk support/försäljning" name="tax_job_position[]" value="teknisk-support-forsaljning"
													>
													<label for="tax_job_position122">Teknisk support/försäljning</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position123" rel="Telefonförsäljning" name="tax_job_position[]" value="telefonforsaljning"
													>
													<label for="tax_job_position123">Telefonförsäljning</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position125" rel="Tillverkning/Produktion" name="tax_job_position[]" value="tillverkning-produktion"
													>
													<label for="tax_job_position125">Tillverkning/Produktion</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position127" rel="Träarbete" name="tax_job_position[]" value="traarbete"
													>
													<label for="tax_job_position127">Träarbete</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position129" rel="Vaktmästeri" name="tax_job_position[]" value="vaktmasteri"
													>
													<label for="tax_job_position129">Vaktmästeri</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position130" rel="Vaktmästeri/Lokalvård" name="tax_job_position[]" value="vaktmasteri-lokalvard"
													>
													<label for="tax_job_position130">Vaktmästeri/Lokalvård</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position131" rel="VVS-montör" name="tax_job_position[]" value="vvs-montor"
													>
													<label for="tax_job_position131">VVS-montör</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position136" rel="Övrigt: Bygg/Anläggning/Infrastruktur" name="tax_job_position[]" value="ovrigt-bygg-anlaggning-infrastruktur"
													>
													<label for="tax_job_position136">Övrigt: Bygg/Anläggning/Infrastruktur</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position138" rel="Övrigt: Drift/Underhåll" name="tax_job_position[]" value="ovrigt-drift-underhall"
													>
													<label for="tax_job_position138">Övrigt: Drift/Underhåll</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position145" rel="Övrigt: Kundsupport/Service" name="tax_job_position[]" value="ovrigt-kundsupport-service"
													>
													<label for="tax_job_position145">Övrigt: Kundsupport/Service</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position150" rel="Övrigt: Teknik" name="tax_job_position[]" value="ovrigt-teknik"
													>
													<label for="tax_job_position150">Övrigt: Teknik</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_job_position151" rel="Övrigt: Tillverkning/Produktion" name="tax_job_position[]" value="ovrigt-tillverkning-produktion"
													>
													<label for="tax_job_position151">Övrigt: Tillverkning/Produktion</label>
												</li>

																					</ul>
									</div>
															</div>
						</div>
										<div class="col-md-6 col-lg-3 accordion">
							<div class="transparent-orange-bg accordion__inner">
																<h4 class="job-archive-filter__filter-type js-expand-filter">Var vill du jobba?<i class="bi bi-chevron-down"></i></h4>
									<div class="accordion-expandable">
										<ul class="" data-simplebar data-simplebar-auto-hide="true">
																						<li>
													<input type="checkbox" id="tax_municipality1" rel="Alingsås" name="tax_municipality[]" value="alingsas"
													>
													<label for="tax_municipality1">Alingsås</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality2" rel="Alvesta" name="tax_municipality[]" value="alvesta"
													>
													<label for="tax_municipality2">Alvesta</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality4" rel="Arvika" name="tax_municipality[]" value="arvika"
													>
													<label for="tax_municipality4">Arvika</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality5" rel="Askersund" name="tax_municipality[]" value="askersund"
													>
													<label for="tax_municipality5">Askersund</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality10" rel="Bollebygd" name="tax_municipality[]" value="bollebygd"
													>
													<label for="tax_municipality10">Bollebygd</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality11" rel="Borlänge" name="tax_municipality[]" value="borlange"
													>
													<label for="tax_municipality11">Borlänge</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality12" rel="Borås" name="tax_municipality[]" value="boras"
													>
													<label for="tax_municipality12">Borås</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality18" rel="Enköping" name="tax_municipality[]" value="enkoping"
													>
													<label for="tax_municipality18">Enköping</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality19" rel="Eskilstuna" name="tax_municipality[]" value="eskilstuna"
													>
													<label for="tax_municipality19">Eskilstuna</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality25" rel="Finspång" name="tax_municipality[]" value="finspang"
													>
													<label for="tax_municipality25">Finspång</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality26" rel="Flen" name="tax_municipality[]" value="flen"
													>
													<label for="tax_municipality26">Flen</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality33" rel="Gävle" name="tax_municipality[]" value="gavle"
													>
													<label for="tax_municipality33">Gävle</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality34" rel="Göteborg" name="tax_municipality[]" value="goteborg"
													>
													<label for="tax_municipality34">Göteborg</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality39" rel="Halmstad" name="tax_municipality[]" value="halmstad"
													>
													<label for="tax_municipality39">Halmstad</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality43" rel="Helsingborg" name="tax_municipality[]" value="helsingborg"
													>
													<label for="tax_municipality43">Helsingborg</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality50" rel="Härryda" name="tax_municipality[]" value="harryda"
													>
													<label for="tax_municipality50">Härryda</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality55" rel="Jönköping" name="tax_municipality[]" value="jonkoping"
													>
													<label for="tax_municipality55">Jönköping</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality57" rel="Kalmar" name="tax_municipality[]" value="kalmar"
													>
													<label for="tax_municipality57">Kalmar</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality58" rel="Karlsborg" name="tax_municipality[]" value="karlsborg"
													>
													<label for="tax_municipality58">Karlsborg</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality60" rel="Karlskoga" name="tax_municipality[]" value="karlskoga"
													>
													<label for="tax_municipality60">Karlskoga</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality61" rel="Karlskrona" name="tax_municipality[]" value="karlskrona"
													>
													<label for="tax_municipality61">Karlskrona</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality62" rel="Karlstad" name="tax_municipality[]" value="karlstad"
													>
													<label for="tax_municipality62">Karlstad</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality63" rel="Katrineholm" name="tax_municipality[]" value="katrineholm"
													>
													<label for="tax_municipality63">Katrineholm</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality64" rel="Kil" name="tax_municipality[]" value="kil"
													>
													<label for="tax_municipality64">Kil</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality65" rel="Kiruna" name="tax_municipality[]" value="kiruna"
													>
													<label for="tax_municipality65">Kiruna</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality67" rel="Kristianstad" name="tax_municipality[]" value="kristianstad"
													>
													<label for="tax_municipality67">Kristianstad</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality70" rel="Kungsbacka" name="tax_municipality[]" value="kungsbacka"
													>
													<label for="tax_municipality70">Kungsbacka</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality71" rel="Kungälv" name="tax_municipality[]" value="kungalv"
													>
													<label for="tax_municipality71">Kungälv</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality73" rel="Köping" name="tax_municipality[]" value="koping"
													>
													<label for="tax_municipality73">Köping</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality75" rel="Landskrona" name="tax_municipality[]" value="landskrona"
													>
													<label for="tax_municipality75">Landskrona</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality76" rel="Landvetter" name="tax_municipality[]" value="landvetter"
													>
													<label for="tax_municipality76">Landvetter</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality81" rel="Linköping" name="tax_municipality[]" value="linkoping"
													>
													<label for="tax_municipality81">Linköping</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality82" rel="Ljungby" name="tax_municipality[]" value="ljungby"
													>
													<label for="tax_municipality82">Ljungby</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality83" rel="Ludvika" name="tax_municipality[]" value="ludvika"
													>
													<label for="tax_municipality83">Ludvika</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality87" rel="Malmö" name="tax_municipality[]" value="malmo"
													>
													<label for="tax_municipality87">Malmö</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality92" rel="Mellerud" name="tax_municipality[]" value="mellerud"
													>
													<label for="tax_municipality92">Mellerud</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality96" rel="Mölndal" name="tax_municipality[]" value="molndal"
													>
													<label for="tax_municipality96">Mölndal</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality97" rel="Mölnlycke" name="tax_municipality[]" value="molnlycke"
													>
													<label for="tax_municipality97">Mölnlycke</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality99" rel="Norrköping" name="tax_municipality[]" value="norrkoping"
													>
													<label for="tax_municipality99">Norrköping</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality102" rel="Nyköping" name="tax_municipality[]" value="nykoping"
													>
													<label for="tax_municipality102">Nyköping</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality104" rel="Nässjö" name="tax_municipality[]" value="nassjo"
													>
													<label for="tax_municipality104">Nässjö</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality108" rel="Oxelösund" name="tax_municipality[]" value="oxelosund"
													>
													<label for="tax_municipality108">Oxelösund</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality109" rel="Partille" name="tax_municipality[]" value="partille"
													>
													<label for="tax_municipality109">Partille</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality116" rel="Skellefteå" name="tax_municipality[]" value="skelleftea"
													>
													<label for="tax_municipality116">Skellefteå</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality117" rel="Skövde" name="tax_municipality[]" value="skovde"
													>
													<label for="tax_municipality117">Skövde</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality118" rel="Sollefteå" name="tax_municipality[]" value="solleftea"
													>
													<label for="tax_municipality118">Sollefteå</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality122" rel="Stockholm" name="tax_municipality[]" value="stockholm"
													>
													<label for="tax_municipality122">Stockholm</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality123" rel="Strängnäs" name="tax_municipality[]" value="strangnas"
													>
													<label for="tax_municipality123">Strängnäs</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality125" rel="Sundsvall" name="tax_municipality[]" value="sundsvall"
													>
													<label for="tax_municipality125">Sundsvall</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality128" rel="Säffle" name="tax_municipality[]" value="saffle"
													>
													<label for="tax_municipality128">Säffle</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality131" rel="Söderköping" name="tax_municipality[]" value="soderkoping"
													>
													<label for="tax_municipality131">Söderköping</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality132" rel="Södertälje" name="tax_municipality[]" value="sodertalje"
													>
													<label for="tax_municipality132">Södertälje</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality138" rel="Torsby" name="tax_municipality[]" value="torsby"
													>
													<label for="tax_municipality138">Torsby</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality140" rel="Tranås" name="tax_municipality[]" value="tranas"
													>
													<label for="tax_municipality140">Tranås</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality142" rel="Trollhättan" name="tax_municipality[]" value="trollhattan"
													>
													<label for="tax_municipality142">Trollhättan</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality145" rel="Uddevalla" name="tax_municipality[]" value="uddevalla"
													>
													<label for="tax_municipality145">Uddevalla</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality146" rel="Ulricehamn" name="tax_municipality[]" value="ulricehamn"
													>
													<label for="tax_municipality146">Ulricehamn</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality147" rel="Umeå" name="tax_municipality[]" value="umea"
													>
													<label for="tax_municipality147">Umeå</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality148" rel="Uppsala" name="tax_municipality[]" value="uppsala"
													>
													<label for="tax_municipality148">Uppsala</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality149" rel="Uppvidinge" name="tax_municipality[]" value="uppvidinge"
													>
													<label for="tax_municipality149">Uppvidinge</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality151" rel="Vara" name="tax_municipality[]" value="vara"
													>
													<label for="tax_municipality151">Vara</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality152" rel="Varberg" name="tax_municipality[]" value="varberg"
													>
													<label for="tax_municipality152">Varberg</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality153" rel="Vetlanda" name="tax_municipality[]" value="vetlanda"
													>
													<label for="tax_municipality153">Vetlanda</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality159" rel="Värnamo" name="tax_municipality[]" value="varnamo"
													>
													<label for="tax_municipality159">Värnamo</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality161" rel="Västerås" name="tax_municipality[]" value="vasteras"
													>
													<label for="tax_municipality161">Västerås</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality162" rel="Växjö" name="tax_municipality[]" value="vaxjo"
													>
													<label for="tax_municipality162">Växjö</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality164" rel="Åmål" name="tax_municipality[]" value="amal"
													>
													<label for="tax_municipality164">Åmål</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality169" rel="Älmhult" name="tax_municipality[]" value="almhult"
													>
													<label for="tax_municipality169">Älmhult</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality170" rel="Ängelholm" name="tax_municipality[]" value="angelholm"
													>
													<label for="tax_municipality170">Ängelholm</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality171" rel="Örebro" name="tax_municipality[]" value="orebro"
													>
													<label for="tax_municipality171">Örebro</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_municipality173" rel="Örnsköldsvik" name="tax_municipality[]" value="ornskoldsvik"
													>
													<label for="tax_municipality173">Örnsköldsvik</label>
												</li>

																					</ul>
									</div>
															</div>
						</div>
										<div class="col-md-6 col-lg-3 accordion">
							<div class="transparent-orange-bg accordion__inner">
																<h4 class="job-archive-filter__filter-type js-expand-filter">Typ av uppdrag?<i class="bi bi-chevron-down"></i></h4>
									<div class="accordion-expandable">
										<ul class="" data-simplebar data-simplebar-auto-hide="true">
																						<li>
													<input type="checkbox" id="tax_type_of_employment1" rel="Tillsvidareanställning" name="tax_type_of_employment[]" value="tillsvidareanstallning"
													>
													<label for="tax_type_of_employment1">Tillsvidareanställning</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_type_of_employment4" rel="Visstidsanställning" name="tax_type_of_employment[]" value="visstidsanstallning"
													>
													<label for="tax_type_of_employment4">Visstidsanställning</label>
												</li>

																					</ul>
									</div>
															</div>
						</div>
										<div class="col-md-6 col-lg-3 accordion">
							<div class="transparent-orange-bg accordion__inner">
																<h4 class="job-archive-filter__filter-type js-expand-filter">Heltid eller deltid?<i class="bi bi-chevron-down"></i></h4>
									<div class="accordion-expandable">
										<ul class="" data-simplebar data-simplebar-auto-hide="true">
																						<li>
													<input type="checkbox" id="tax_timetype0" rel="Deltid" name="tax_timetype[]" value="deltid"
													>
													<label for="tax_timetype0">Deltid</label>
												</li>

																							<li>
													<input type="checkbox" id="tax_timetype1" rel="Heltid" name="tax_timetype[]" value="heltid"
													>
													<label for="tax_timetype1">Heltid</label>
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
